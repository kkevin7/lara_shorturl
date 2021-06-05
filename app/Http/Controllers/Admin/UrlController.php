<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function show(Request $request, $code = "")
    {
        $url = Url::where('code', $code)->firstOrFail();
        if ($url) {
            return redirect()->away($url->url);
        } else {
            abort(404);
        }
    }

    public function store(Request $request, Url $url)
    {
        $code = $url->short_url($request->long_url);
        return response()->json([
            'short_url' => url('/') . '/' . $code,
        ]);
    }
}
