<?php

namespace App\Helpers;

use Exception;

class PHPHelper
{
    public static function getRegisterTestMessage($publicKey)
    {
        try {
            putenv("GNUPGHOME=/tmp");
            $pubkey = $publicKey;
            $enc = (null);
            $res = gnupg_init();
            $rtv = gnupg_import($res, $pubkey);
            $rtv = gnupg_addencryptkey($res, $rtv["fingerprint"]);
            $enc = gnupg_encrypt($res, "just a test to see if anything works");
            return $enc;
        } catch (Exception $e) {
            return null;
        }
    }
}
