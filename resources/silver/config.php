<?php
/**
 * Created by PhpStorm.
 * User: silve
 * Date: 2017-12-09
 * Time: 오전 3:23
 */

namespace silver;


class config
{
    const SERVER = "DEV";
    //static $sapUrl = "";

    public static function sapUrl() {
        if(self::SERVER =='DEV') {
            return "http://10.40.17.43:9088/erpsac/JsonServlet";
        }
        else {
             return "http://localhost:8080/common_infra_01/JsonServlet";
        }
    }



}