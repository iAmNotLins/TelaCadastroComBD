<?php 

class SessionManager {
    public static function startSession() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function setSessionValue($key, $value) {
        self::startSession();
        $_SESSION[$key] = $value;
    }

    public static function getSessionValue($key) {
        self::startSession();
        return $_SESSION[$key] ?? null;
    }

    public static function deleteSessionValue($key) {
        self::startSession();
        unset($_SESSION[$key]);
    }

    public static function destroySession() {
        self::startSession();
        session_destroy();
    }
}

?>