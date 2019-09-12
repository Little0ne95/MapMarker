<?php
session_start();

Config::write('office.location', '');
Config::write('api.key', 'API_KEY');

class Config
{
    static $confArray;

    public static function read($name)
    {
        return self::$confArray[$name];
    }

    public static function write($name, $value)
    {
        self::$confArray[$name] = $value;
    }


    public static function raiseError($type, $message)
    {

        $message = (is_array($message)) ? implode(' ', $message) : $message;
        echo $type.' '.$message.'<br><br>';
        exit();
    }

    public function display_error($before = '<p>', $after = '<p>', $errors)
    {

        echo $before;
        echo $errors;
        echo $after;
    }


}

?>