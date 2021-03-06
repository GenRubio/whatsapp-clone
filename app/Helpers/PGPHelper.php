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
        if (config('app.pgp_encryption')){
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
        else{
            return $message;
        }
    }

    public static function decryptMessage($message)
    {
        if (config('app.pgp_encryption')){
            try {
                putenv("GNUPGHOME=/tmp");
                $res = gnupg_init();
                $rtv = gnupg_import($res, session('privateKey'));
                gnupg_adddecryptkey($res, $rtv["fingerprint"], session('privateKeyPassword'));
                $enc = gnupg_decrypt($res, str_replace("\n","\r\n", $message));
                return $enc;
            } catch (Exception $e) {
                return null;
            }
        }
        else{
            return $message;
        }
    }
}
