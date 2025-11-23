<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        // 🔥 ALWAYS load the file for this slug
        $htmlBody = '';
        $htmlFile = resource_path("templates/{$slug}.php");

        if (file_exists($htmlFile)) {
            ob_start();
            include $htmlFile; // PHP runs, asset() resolved
            $htmlBody = ob_get_clean();
        }

        // you *can* keep UID if you want for autosave logic, but don't gate loading on it
        // Session::put('UID', $uid);

        return view('builder', [
            'slug'     => $slug,
            'uid'      => $uid,
            'htmlBody' => $htmlBody,
        ]);
    }
}

