<?php


namespace App\Classes;

use Illuminate\Support\Facades\Cache;

class Helper{

    const CACHE_POSTFIX_NAME = "cache_css_js_postfix_name";

    public static function generateRandomString(int $length = 8, bool $startWithLetter = true): string {
        $characterLetters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characters = '0123456789'.$characterLetters;
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        if ($startWithLetter){
            $firstChar = strpos($characterLetters, $randomString[0]);
            if ($firstChar === false){
                $randomString[0] = $characterLetters[rand(0, strlen($characterLetters) - 1)];
            }
        }
        return $randomString;
    }

    public static function setCachePostfix(){
        if (Cache::has(self::CACHE_POSTFIX_NAME)) {
            Cache::forget(self::CACHE_POSTFIX_NAME);
        }
        Cache::forever(self::CACHE_POSTFIX_NAME, self::generateRandomString());
    }

    public static function getCachePostfix(): string{
        $cachePrefixValue = "";
        if (!Cache::has(self::CACHE_POSTFIX_NAME)) {
            $cachePrefixValue = self::generateRandomString();
            Cache::forever(self::CACHE_POSTFIX_NAME, $cachePrefixValue);
        }
        else{
            $cachePrefixValue = Cache::get(self::CACHE_POSTFIX_NAME);
        }
        return $cachePrefixValue;
    }
}
