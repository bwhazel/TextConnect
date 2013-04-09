<?php 

/* 
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
Title : basemodel.php
Author : Bobby Hazel
Description : Base model for global model functions
 - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
*/

class Basemodel extends Eloquent {

	public static function validate($data) {
		return Validator::make($data, static::$rules);
	}
}