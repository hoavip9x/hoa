<?php
include'config.php';
puaru(''.$domain.'/ok.php');
puaru(''.$domain.'/autolikerbrasil.php');
puaru(''.$domain.'/hublaalike.php');
puaru(''.$domain.'/ok5.php');
puaru(''.$domain.'/hoa1-1.php');
puaru(''.$domain.'/ok7.php');
puaru(''.$domain.'/solike.php');
puaru(''.$domain.'/tooliker.php');
puaru(''.$domain.'/hublaa.php');
puaru(''.$domain.'/dpautoliker.php');
function puaru($url){
   $curl = curl_init();
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($curl, CURLOPT_URL, $url);
   $ch = curl_exec($curl);
   curl_close($curl);
   return $ch;
   }
?>