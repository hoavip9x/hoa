<?php
include 'hoadz.php';
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
login("http://singhliker.in/home.php?token=".$token."","null");
echo post_data("http://singhliker.in/m-likes.php","postid=".$idstt."&num=250&token=".$token."","null");
?>