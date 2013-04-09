<?php

class Helpers {

    public static function fbLogin(){
        $facebook = IoC::resolve('facebook-sdk');
        $params = array(
        'redirect_uri' = 'http://laravel.dev/login/oauth',
	    'display' = 'popup',
	    'scope' = 'email'
	);
		
	return $facebook->getLoginUrl($params);
   }
}