<?php
class Password {
    private static $password;
    private static $hash;
    
    private static $options;
    
    public function __construct() {
        die("You are not allowed to instantiate the class '". get_class($this) ."'. Use it with a static method instead.");
    }
    
    public static function generate($length = 12) {
        $characters = 'abcdefghijkmnopqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ0123456789@$!%*#?&';
        $string = '';
        $random_string_length = $length;
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $random_string_length; $i++) {
            $string .= $characters[mt_rand(0, $max)];
        }
        
        if (preg_match("/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{$random_string_length}/", $string)):
            $obj = new stdClass();
            $obj->clean = $string;
            $obj->digested = self::encrypt($string);
            return $obj;
        else:
            return self::generate($random_string_length);
        endif;
    }
    
    public static function encrypt($password) {
        self::$password = $password;
        
        self::$options = array(
            'cost' => 9,
            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_RANDOM)
        );
        
        return password_hash(self::$password, PASSWORD_BCRYPT, self::$options);
    }
    
    public static function verify($password, $hash) {
        self::$password = $password;
        self::$hash = $hash;
        
        return password_verify(self::$password, self::$hash);
    }
}

