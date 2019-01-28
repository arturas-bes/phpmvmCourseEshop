<?php

namespace App\Classes;


class CSRFToken
{
    /**
     * add session token
     * @return mixed
     * @throws \Exception
     */
    public static function _token()
    {
        if (!Session::has('token')) {
            $randomToken = base64_encode(openssl_random_pseudo_bytes(32));
            Session::add('token', $randomToken);
        }
        return Session::get('token');
    }

    /**
     * Verify session token
     * @param $request
     * @return bool
     * @throws \Exception
     */
    public static function verifyCSRFToken($request)
    {
        if (Session::has('token') && Session::get('token') === $requestToken) {
            Session::remove('token');
            return true;
        }
        return false;
    }
}