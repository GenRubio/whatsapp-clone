<?php

namespace App\Helpers;

use Exception;

class PGPHelper
{
    public static function getRegisterTestMessage($publicKey)
    {
        session(['registerEncriptMessage' => 'Hello friend:' . uniqid() . uniqid()]);
        return encriptMessage($publicKey, session('registerEncriptMessage'));
    }

    public static function encriptMessage($publicKey, $message)
    {
        try {
            putenv("GNUPGHOME=/tmp");
            $pubkey = $publicKey;
            $enc = (null);
            $res = gnupg_init();
            $rtv = gnupg_import($res, $pubkey);
            $rtv = gnupg_addencryptkey($res, $rtv["fingerprint"]);
            $enc = gnupg_encrypt($res, $message);
            return $enc;
        } catch (Exception $e) {
            return null;
        }
    }

    public static function decryptMessage($message)
    {
        try {
            putenv("GNUPGHOME=/tmp");
            return session('privateKey');
            $res = gnupg_init();
            gnupg_adddecryptkey($res, session('privateKey'), session('privateKeyPassword'));
            return gnupg_decrypt($res, $message);
        } catch (Exception $e) {
            return null;
        }
    }
}
