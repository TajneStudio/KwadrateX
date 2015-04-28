<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('test_method'))
{
    function sprawdz_czy_segment_aktywny($segment_strony,$segment_bazowy){
		if($segment_strony == $segment_bazowy){
			return "active";
		} else {
			return null;
		}
    }   
}