<?php
include 'data.php';
$domain= 'http://likemax.net/hoa'; // không có / ở cuối
$result = mysql_query("SELECT * FROM token ORDER BY RAND() LIMIT 0,1");
if($result){
while($row = mysql_fetch_array($result))
  {
$token = $row[access_token];
}
}
$id_puaru='hoadz.org'; // ID User VIP
$limitlike='10000000'; // Số Lượng Like
?>