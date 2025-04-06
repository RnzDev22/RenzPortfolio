<?php 
date_default_timezone_set('Asia/Kuala_Lumpur');
session_start();
ob_start();

include_once('./classes/kamoteCls.php');
$kamote = new kamoteCls();

$host     = "jlsprofile.mypressonline.com";
$username = "4615508_jls";
$password = "annsalvador08";
$db = "portfolio_jls";

//echo $host;
//echo $username;
//echo $password;

$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => $host,
        'username' => $username,
        'password' => $password,
        'db' =>$db
    ),
    'remember' => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => 604800
    ),
    'session' => array(
        'session_name' => 'user',
        'token_name' => 'token'
    )
);

spl_autoload_register(function($class){
    if (file_exists('./classes/'.$class.'.php')){
        require_once './classes/'.$class.'.php';
    } else {
        return false;
    }
});

/*Inbuild PHP function library - parsing funtion on class access == SPL = Standard PHP Language*/

require_once './functions/sanitize.php';

if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))) {
    $hash = Cookie::get(Config::get('remember/cookie_name'));
    $hashCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));
    
    if($hashCheck->count()) {
        $user = new User($hashCheck->first()->user_id);
        $user->login();
    }
}
?>