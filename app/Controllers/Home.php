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
    public function translate(): string
    {
        $translate = new TranslateClient([
            'key' => getenv('GOOGLE_TRANSLATE_API_KEY')
        ]);

        // ini buat ambil data post request
        $textToTranslate = $this->request->getPost('textToTranslate');
        $sourceLanguage = $this->request->getPost('sourceLanguage');
        $targetLanguage = $this->request->getPost('targetLanguage');

        $result = $translate->translate($textToTranslate, [
            'source' => $sourceLanguage,
            'target' => $targetLanguage
        ]);

        $languages = $translate->localizedLanguages(['target' => 'en']);
        return view('home', [
            'languages' => $languages,
            'translationResult' => $result['text']
        ]);
    }
}
