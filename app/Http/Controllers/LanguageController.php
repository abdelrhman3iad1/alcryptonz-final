<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function Language($language){


        if(!in_array($language, ['en','ar'])){
            return abort(300);
        }

        session()->put('locale',$language);


        $localization = session()->get('locale',config('app.locale'));
        App::setLocale($localization);
        return redirect()->back();
    }
}
