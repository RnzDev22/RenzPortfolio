<?php 
class kamoteCls {
    
    function kamote_magic($action, $string) {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'MyLifeMyLoveMySoul093029';
        $secret_iv = 'ZgvyZwynG3r@nc3J3ru';
        
        $key = hash('sha256', $secret_key);

        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        if( $action == 'blabla' ) {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }
    
}