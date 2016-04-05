<?php
include'config.php';
//puaru(''.$domain.'/hoa11.php');
//puaru(''.$domain.'/hoa12.php');
puaru(''.$domain.'/hoa13.php');
puaru(''.$domain.'/hoa14.php');
puaru(''.$domain.'/hoa15.php');
puaru(''.$domain.'/hoa16.php');
puaru(''.$domain.'/hoa17.php');
//puaru(''.$domain.'/hoa18.php');
puaru(''.$domain.'/hoa19.php');
puaru(''.$domain.'/hoa20.php');
function puaru($url){
   $curl = curl_init();
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($curl, CURLOPT_URL, $url);
   $ch = curl_exec($curl);
   curl_close($curl);
   return $ch;
   }
?>