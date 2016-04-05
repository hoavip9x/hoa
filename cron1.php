<?php
include'config.php';
//puaru(''.$domain.'/hoa1.php');
puaru(''.$domain.'/hoa2.php');
puaru(''.$domain.'/hoa3.php');
puaru(''.$domain.'/hoa4.php');
//puaru(''.$domain.'/hoa5.php');
puaru(''.$domain.'/hoa6.php');
puaru(''.$domain.'/hoa7.php');
//puaru(''.$domain.'/hoa8.php');
puaru(''.$domain.'/hoa9.php');
//puaru(''.$domain.'/hoa10.php');
function puaru($url){
   $curl = curl_init();
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($curl, CURLOPT_URL, $url);
   $ch = curl_exec($curl);
   curl_close($curl);
   return $ch;
   }
?>