<?php
session_start();

Config::write('production', '0'); //live / test database settings + hides
Config::write('show_debug', '1'); //hides config messages etc

// MYSQL DATABASE
Config::write('mysql.db.host', '127.0.0.1');
Config::write('mysql.db.basename', 'carpool');
Config::write('mysql.db.user', 'root');
Config::write('mysql.db.password', '');


Config::write('office.location', '');
Config::write('api.key', 'AIzaSyCOjLre2v1V9ve1tnAw2VOqIBpChsvAonY');

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