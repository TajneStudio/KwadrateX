<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('test_method'))
{
    function is_logged_in($user_type){
		if($user_type != null){
			return true;
		} else {
			return false;
		}
    } 

    function is_not_logged_in($user_type){
		if($user_type == null){
			return true;
		} else {
			return false;
		}
    }   	
	
    function is_admin($user_type){
		if($user_type == 3){
			return true;
		} else {
			return false;
		}
    }
	
    function is_user($user_type){
		if($user_type == 1){
			return true;
		} else {
			return false;
		}
    }   
}