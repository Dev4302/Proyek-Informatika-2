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

        // Translate text from english to french.
        $result = $translate->translate('Hello world!', [
            'target' => 'fr'
        ]);

        echo $result['text'] . "\n";

        // Detect the language of a string.
        $result = $translate->detectLanguage('Greetings from Michigan!');

        echo $result['languageCode'] . "\n";
        
        // Get all languages supported for translation.
        $languages = $translate->languages();

        foreach ($languages as $language) {
            echo $language . "\n";
        }
    }
}
