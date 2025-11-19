<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BuilderController extends Controller
{
    public function show(Request $request)
    {
        $allowedSlugs = [
            '3-piece',
            'allergy-cure',
            'blue-cut',
            'combo-pack',
            'headphones',
            'jacket',
            'juta',
            'khejur-gur',
            'ladies-hand-bag',
            'modhu',
            'perfume-bd',
            'pitha',
            'polo-t-shirt',
            'safety-cover',
            'wallet',
        ];

        $slug = $request->query('slug');
        $uid  = $request->query('uid');

        // if slug or uid missing → go back to templates
        if (!$slug || !$uid) {
            return redirect()->route('templates');
        }

        // invalid slug
        if (!in_array($slug, $allowedSlugs, true)) {
            return redirect()->route('templates');
        }

        $htmlBody = '';

        // Only load from file if UID is new / changed
        if (!Session::has('UID') || Session::get('UID') !== $uid) {
            // move your HTML templates to: resources/templates/{slug}.html
            $htmlFile = resource_path("templates/{$slug}.html");

            if (file_exists($htmlFile)) {
                $htmlBody = file_get_contents($htmlFile);
            }

            Session::put('UID', $uid);
        }

        return view('builder', [
            'slug'     => $slug,
            'uid'      => $uid,
            'htmlBody' => $htmlBody,
        ]);
    }
}
