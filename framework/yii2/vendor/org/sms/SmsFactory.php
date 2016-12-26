<?php
/*
 *
 * SMS 工厂类
 * */
class SmsFactory
{
    static public  $sms_obj;

    public  function __construct()
    {

    }

    public  static  function getInstance()
    {

        return '323';
        if (empty(self::$sms_obj)) {
            require(__DIR__.'/SmsMandao.php');
            self::$sms_obj = new SmsMandao();
            return self::$sms_obj;

        } else {
            return self::$sms_obj;
        }
    }

}