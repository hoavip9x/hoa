<?php
include'config.php';
puaru(''.$domain.'/autolikeus.php');
puaru(''.$domain.'/cipock.php');
puaru(''.$domain.'/ourliker.php');
puaru(''.$domain.'/pass2.php');
puaru(''.$domain.'/pass3.php');
puaru(''.$domain.'/pass4.php');
function puaru($url){
   $curl = curl_init();
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($curl, CURLOPT_URL, $url);
   $ch = curl_exec($curl);
   curl_close($curl);
   return $ch;
   }
?>