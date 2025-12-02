<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\FileDownloadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageGeneratorController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\MediaDownloadController;
use App\Http\Controllers\MyAccountController;
use App\Http\Controllers\ResourcesController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/who-we-are', function () {
    return view('about');
})->name('about');

Route::get('/resources', [ResourcesController::class, 'index'])->name('resources');
Route::get('/resources/{slug}', [ResourcesController::class, 'show'])->name('resources.show')->middleware('auth');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/about-water-ppps', function () {
    $faqs = \App\Models\Faq::where('is_active', true)
        ->orderBy('sort')
        ->get();

    return view('understanding_water_ppp', [
        'faqs' => $faqs,
    ]);
})->name('understandingWater');

Route::get('/water-ppp-resources', function () {
    return view('water_ppp_resources');
})->name('waterpppresources');

Route::get('/single-product-page', function () {
    return view('single_product_page');
})->name('singleproductpage');

Route::get('/contact-us', function () {
    return view('contact_us');
})->name('contactus');

Route::get('/case-study', [ResourcesController::class, 'caseStudy'])->name('casestudy')->middleware('auth');

Route::get('/account-details', function () {
    return view('account_details');
})->name('accountdetails');

Route::get('/my-account', [MyAccountController::class, 'index'])->name('myaccount')->middleware('auth');

// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');


    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::post('/login', function (\Illuminate\Http\Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (\Illuminate\Support\Facades\Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            $request->session()->regenerate();
            // Check if request is AJAX
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['success' => true, 'redirect' => route('resources')]);
            }
            return redirect()->intended('/resources');
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => false,
                'errors' => ['email' => 'The provided credentials do not match our records.']
            ], 422);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    });

    Route::post('/register', function (\Illuminate\Http\Request $request) {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'organisation' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = \App\Models\User::create([
            'name' => $request->first_name, // Keep name for compatibility
            'first_name' => $request->first_name,
            'organisation' => $request->organisation,
            'email' => $request->email,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
        ]);

        \Illuminate\Support\Facades\Auth::login($user);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['success' => true, 'redirect' => route('resources')]);
        }

        return redirect()->route('resources');
    });
});

Route::post('/logout', function (\Illuminate\Http\Request $request) {
    \Illuminate\Support\Facades\Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// Email verification
Route::middleware('auth')->group(function () {
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (\Illuminate\Foundation\Auth\EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/map');
    })->middleware('signed')->name('verification.verify');

    Route::post('/email/verification-notification', function (\Illuminate\Http\Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    })->middleware('throttle:6,1')->name('verification.send');
});

// Password reset routes
Route::middleware('guest')->group(function () {
    Route::get('/forgot-password', function () {
        return view('auth.forgot-password');
    })->name('password.request');

    Route::post('/forgot-password', function (\Illuminate\Http\Request $request) {
        $request->validate(['email' => 'required|email']);
        $status = \Illuminate\Support\Facades\Password::sendResetLink($request->only('email'));
        return $status === \Illuminate\Support\Facades\Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    })->name('password.email');

    Route::get('/reset-password/{token}', function (string $token) {
        return view('auth.reset-password', ['token' => $token]);
    })->name('password.reset');

    Route::post('/reset-password', function (\Illuminate\Http\Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = \Illuminate\Support\Facades\Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => \Illuminate\Support\Facades\Hash::make($password)
                ])->save();
            }
        );

        return $status === \Illuminate\Support\Facades\Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    })->name('password.update');
});


// Authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Map view
    Route::get('/map', [MapController::class, 'index'])->name('map.index');
    Route::get('/api/map/items', [MapController::class, 'api'])->name('map.api');

    // File downloads
    Route::get('/files/{file}/download', [FileDownloadController::class, 'download'])
        ->name('files.download')
        ->middleware('throttle:10,1');
    Route::get('/files/{file}/signed-url', [FileDownloadController::class, 'getSignedUrl'])
        ->name('files.signed-url')
        ->middleware('throttle:20,1');

    // Media downloads (for featured images)
    Route::get('/media/{media}/download', [MediaDownloadController::class, 'download'])
        ->name('media.download')
        ->middleware('throttle:10,1');

    // Bookmarks
    Route::post('/bookmark/toggle', [BookmarkController::class, 'toggle'])->name('bookmark.toggle');
});

// Public image generation (for featured images)
Route::get('/images/generate', [ImageGeneratorController::class, 'generate'])->name('image.generate');
Route::get('/images/generate/{item}', [ImageGeneratorController::class, 'generate'])->name('image.generate.item');
