<?php
class CookieManager {
    public static function setCookie($name, $value, $expire = 0, $path = '/', $domain = null, $secure = false, $httponly = false) {
        setcookie($name, $value, $expire, $path, $domain, $secure, $httponly);
    }

    public static function getCookie($name) {
        return $_COOKIE[$name] ?? null;
    }

    public static function deleteCookie($name) {
        if (isset($_COOKIE[$name])) {
            unset($_COOKIE[$name]);
            setcookie($name, '', time() - 3600, '/');
        }
    }
}

?>