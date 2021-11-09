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

            session(['publicUserKey' => 'Hello friend:' . uniqid() . uniqid()]);

            $enc = gnupg_encrypt($res, session('publicUserKey'));
            return $enc;
        } catch (Exception $e) {
            return null;
        }
    }
}
