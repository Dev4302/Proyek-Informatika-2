<?php

namespace Config;

require 'vendor/autoload.php';
use Google\Cloud\Translate\V2\TranslateClient;

Class translate extends BaseConfig
{
        public function getApiKey()
    {
        return ''; 
    }
    
}
