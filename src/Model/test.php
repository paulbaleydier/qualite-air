<?php 
namespace Model;

class Test extends Model {

    public static $table = "test"; 

    public static function test() {
        var_dump(self::getPDO());
        return self::$table;

    }

}