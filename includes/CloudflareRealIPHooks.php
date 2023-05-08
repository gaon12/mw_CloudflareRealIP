<?php

class CloudflareRealIPHooks {
    public static function onUserGetIP(&$ip) {
        if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
            $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
        }
        return true;
    }
}
