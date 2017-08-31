<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('out')) {
    function out($var, $dump = false) {
        echo '<pre>';
        if ($dump)
            var_dump($var);
        else
            print_r($var);
        echo '</pre>';
    }
}

if (!function_exists('secondsToTime')) {
    function secondsToTime($seconds) {
        $dtF = new DateTime("@0");
        $dtT = new DateTime("@$seconds");
        $diff = $dtF->diff($dtT)->format('%h, %i, %s');
        $diff = explode(', ',$diff);
        $tmp = array(':',':','');
        $res = "";
        foreach($diff as $key=>$df){
 
               $res .= " ".$df." ".$tmp[$key]; 

        }
        echo $res;
    }
}

if (!function_exists('lq')) {
    function lq() {
        echo $this->db->last_query();

    }
}

function userInfo() 
{
    if($_SERVER['HTTP_HOST'] !== 'localhost'){
        $json       = file_get_contents("http://ipinfo.io/{$_SERVER['REMOTE_ADDR']}");
        $details    = json_decode($json);
        if($details->ip !== '::1'){
            return  array('country'=>$details->country,'city'=> $details->city);
        }else{
            return false;
        }
    }
}