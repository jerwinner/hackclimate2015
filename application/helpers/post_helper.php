<?php

    function get_post($arr, $key){
        if (array_key_exists($key, $arr)) {
            return $arr[$key];
        }
        return "";
    }


?>