<?php
/**
 * Created by PhpStorm.
 * User: silve
 * Date: 2017-12-09
 * Time: 오전 2:48
 */

namespace silverUtil;


class numberUtil
{
    /*
     * sap 포맷에 맞춰 100을 곱해서 가져옴
     * */
    public  static function getAmtSap($amt) {
        return number_format($amt * 100);
    }
}