<?php

namespace App\Http\Controllers;

use App\Models\SliderCard;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Get all active slider cards ordered by sort_order
        $sliderCards = SliderCard::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('home', [
            'sliderCards' => $sliderCards,
        ]);
    }
}
