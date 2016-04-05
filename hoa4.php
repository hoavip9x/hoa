<?php
include 'hoadz1.php';
include 'config.php';
$token = file_get_contents("".$linktoken."");  
$feed=json_decode(file_get_contents('https://graph.fb.me/'.$id_hoadz.'/feed?access_token='.$token.'&limit=1'),true); //Limit Id 1 Status
for($i=0;$i<count($feed[data]);$i++){ // Parse ID
$id = $feed[data][$i][id];  
$sllike = $feed[data][$i][likes][count]; 
} 
$hoadz = explode("_", $id);
$iduser= $hoadz[0];
$idstt= $hoadz[1];
login("http://brazucaliker.com/liker/login.php","token=".$token."");
echo post_data("http://brazucaliker.com/liker/index.php","rangeInput=120&id=".$idstt."&pancal=Ganhar+Curtidas%21");
?>