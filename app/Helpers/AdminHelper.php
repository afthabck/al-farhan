<?php


 namespace App\Helpers;

 use Illuminate\Support\Facades\Storage;
 use App\Models\AdminConfig;

 class AdminHelper
 {
     /**
      * get key by value
      * @author krishnapriya
      */
      public static function getKeyByValue($key)
      {
        $config = AdminConfig::where('key', $key)->first();
        return $config ? $config->value : null;
      }

      /**
       * get key by logo
       *
       */
      public static function getKeyByLogo($key)
      {
        $config = AdminConfig::where('key', 'website_logo')->first();

        if(Storage::disk('public')->exists($config->value)) {
            return Storage::url($config->value);
        }
        else if(file_exists(public_path($config->value))){
            return asset($config->value);
        }
        else {
            return asset('frontend/images/email_logo.jpg');
        }
      }
 }


