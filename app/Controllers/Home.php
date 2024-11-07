<?php

namespace App\Controllers;

use Google\Cloud\Translate\V2\TranslateClient;

class Home extends BaseController
{
    public function index(): string
    {
        $translate = new TranslateClient([
            'key' => getenv('GOOGLE_TRANSLATE_API_KEY')
        ]);

        // ini target languages harus diganti berdasarkan pilihan input
        $languages = $translate->localizedLanguages([
            'target' => 'en'
        ]);
        
        // Translate text from english to french.
        $result = $translate->translate('Hello world!', [
            'target' => 'fr'
        ]);

        // isi dropdown menu pakai array berisi daftar bahasa yg bisa dipakai
        return view('home', ['languages' => $languages]);
    }
}
