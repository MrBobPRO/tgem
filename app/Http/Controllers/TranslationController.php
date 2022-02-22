<?php

namespace App\Http\Controllers;

use App\Models\Locale;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
    public function dashboard_index(Request $request)
    {
        $locales = Locale::where('primary', false)->get();

        return view('dashboard.translations.index', compact('locales'));
    }

    public function dashboard_single($locale_value)
    {
        $content = file_get_contents(base_path('resources/lang/' . $locale_value . '.json'));

        return view('dashboard.translations.single', compact('content', 'locale_value'));
    }

    public function update(Request $request)
    {
        $file = base_path('resources/lang/' . $request->locale_value . '.json');
        file_put_contents($file, $request->content);

        return redirect()->back();
    }
}
