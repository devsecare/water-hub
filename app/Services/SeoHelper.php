<?php

namespace App\Services;

use App\Models\SeoMeta;
use Illuminate\Support\Facades\Route;

class SeoHelper
{
    /**
     * Get SEO data for the current route
     *
     * @param string|null $routeName
     * @return SeoMeta|null
     */
    public static function getSeoMeta(?string $routeName = null): ?SeoMeta
    {
        $routeName = $routeName ?? Route::currentRouteName();

        if (!$routeName) {
            return null;
        }

        return SeoMeta::where('page_route', $routeName)
            ->where('is_active', true)
            ->first();
    }

    /**
     * Get SEO data by URL pattern (for dynamic pages)
     *
     * @param string $url
     * @return SeoMeta|null
     */
    public static function getSeoMetaByUrl(string $url): ?SeoMeta
    {
        return SeoMeta::where('page_url', $url)
            ->where('is_active', true)
            ->first();
    }

    /**
     * Get default SEO values if no custom SEO is set
     *
     * @param string|null $routeName
     * @return array
     */
    public static function getDefaultSeo(?string $routeName = null): array
    {
        $routeName = $routeName ?? Route::currentRouteName();
        $appName = config('app.name', 'PPP Water Hub');

        return [
            'meta_title' => $appName,
            'meta_description' => 'PPP Water Hub - Your resource for water public-private partnerships',
            'meta_keywords' => 'water, PPP, public private partnership, water resources',
            'og_title' => $appName,
            'og_description' => 'PPP Water Hub - Your resource for water public-private partnerships',
            'og_image' => null, // Set a default OG image URL if needed
            'twitter_card' => 'summary_large_image',
            'canonical_url' => url()->current(),
            'robots' => 'index, follow',
        ];
    }

    /**
     * Get complete SEO data (custom or default)
     *
     * @param string|null $routeName
     * @return array
     */
    public static function getSeoData(?string $routeName = null): array
    {
        $seoMeta = self::getSeoMeta($routeName);
        $defaults = self::getDefaultSeo($routeName);

        if (!$seoMeta) {
            return $defaults;
        }

        return [
            'meta_title' => $seoMeta->meta_title ?? $defaults['meta_title'],
            'meta_description' => $seoMeta->meta_description ?? $defaults['meta_description'],
            'meta_keywords' => $seoMeta->meta_keywords ?? $defaults['meta_keywords'],
            'og_title' => $seoMeta->og_title ?? $seoMeta->meta_title ?? $defaults['og_title'],
            'og_description' => $seoMeta->og_description ?? $seoMeta->meta_description ?? $defaults['og_description'],
            'og_image' => $seoMeta->og_image ?? $defaults['og_image'],
            'twitter_card' => $seoMeta->twitter_card ?? $defaults['twitter_card'],
            'canonical_url' => $seoMeta->canonical_url ?? url()->current(),
            'robots' => $seoMeta->robots ?? $defaults['robots'],
        ];
    }

    /**
     * Get all available route names for the frontend
     *
     * @return array
     */
    public static function getAvailableRoutes(): array
    {
        return [
            // Main Pages
            'home' => 'Home',
            'about' => 'About Us',
            'resources' => 'Resources',
            'resources.show' => 'Resource Detail (Dynamic)',
            'contactus' => 'Contact Us',
            'understandingWater' => 'Understanding Water PPPs',
            'waterpppresources' => 'Water PPP Resources',
            'singleproductpage' => 'Single Product Page',
            'casestudy' => 'Case Study',
            'faq' => 'FAQ',

            // Legal Pages
            'privacypolicy' => 'Privacy Policy',
            'termsofservice' => 'Terms of Service',

            // User Account Pages
            'myaccount' => 'My Account',
            'accountdetails' => 'Account Details',
            'map.index' => 'Map View',

            // Authentication Pages
            'login' => 'Login',
            'register' => 'Register',
            'password.request' => 'Forgot Password',
            'password.reset' => 'Reset Password',
            'verification.notice' => 'Email Verification Notice',
            'verification.verify' => 'Email Verification',
        ];
    }
}
