<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TGMToken
 *
 * @author hieu
 */
class TGMToken {

    //put your code here

    static private $key = "tgm-mgod";
    static private $secret = "cjpmrJG7nRqD9NDRFRKJSwNZKZybKe69Vt8Qd8cxmCEMGxSzPvGd4u4ftUDvZSWqV9hPmcWDytmb3UxshTKgGMUB72jaed7BBPRr";

    public static function check($param) {
        echo "<pre>";
        
        var_dump($param);
        
        echo $sign = $param["sign"];
        echo $app_key = $param["key"];
        echo $timestamp = $param["timestamp"];

        return;
        if ($app_key == TGMToken::$key) {
            /* @var $secret type */
            $check = md5(TGMToken::$key . $timestamp) . md5($timestamp) . md5(TGMToken::$secret . $timestamp);
            $check_md5 = md5($check);
            if ($check_md5 == $sign)
                return true;
            else
                return false;
        }
    }

    public static function getparams() {
        $headers = $_REQUEST;

        if ($headers['sign'] != null && $headers['key'] != null && $headers['timestamp'] != null) {
            $params = array("key" => $headers["key"], "sign" => $headers["sign"], "timestamp" => $headers["timestamp"]);
            return $params;
        }
        return false;
    }

}

?>
