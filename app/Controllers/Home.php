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
        
        // isi dropdown menu pakai array berisi daftar bahasa yg bisa dipakai
        return view('home', ['languages' => $languages]);
    }
    
     public function translate(): string
    {
        $translate = new TranslateClient([
            'key' => getenv('GOOGLE_TRANSLATE_API_KEY')
        ]);

        // ambil datanya
        $textToTranslate = $this->request->getPost('textToTranslate');
        $sourceLanguageName = $this->request->getPost('sourceLanguage');
        $targetLanguageName = $this->request->getPost('targetLanguage');

        // ini recall untuk match kode dgn namanya, tapi masih ngaco karena dia matchnya masih salah
        $languages = $translate->localizedLanguages(['target' => `sourceLanguageName`]);

        $result = $translate->translate($textToTranslate, [
            'source' => $sourceLanguageName,
            'target' => $targetLanguageName
        ]);
        // recall untuk fill daftar bahasanya
        $languages = $translate->localizedLanguages(['target' => 'en']);

        return view('home', [
            'languages' => $languages,
            'translationResult' => $result['text']
        ]);
    }

}
