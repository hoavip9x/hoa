<?php 
/* 
* Bypass Captcha C�i
* 100% Ho?t �?ng
* Vui l�ng s? d?ng VPS h? tr? ocr-api 
* �m Th?m Ch?ch EM
*/
class mgvarokah
{
	function setstring($token,$id)
	{
		$this->token = $token;
		$this->id = $id;
	}
	function captcha() //Fungsi Bypass Captcha 
	{
			$img = 'http://egliker.com/cap/captcha.php';
			$ch = curl_init($img);
			curl_setopt($ch,CURLOPT_COOKIEJAR,'cookie4.txt');	
			curl_setopt($ch,CURLOPT_COOKIEFILE,'cookie4.txt');			
			curl_setopt($ch,CURLOPT_COOKIESESSION,true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);	
			curl_setopt($ch,CURLOPT_REFERER,$img);
			curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.52 Safari/537.36');
			curl_setopt($ch,CURLOPT_FOLLOWLOCATION,false);
			curl_setopt($ch,CURLOPT_HEADER,0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			$data = curl_exec($ch);
			curl_close($ch);
 			$tmpFile = uniqid();
			$file = $tmpFile;
			$handle = fopen($file, 'a');
			fwrite($handle,$data);
			fclose($handle);
 			shell_exec("convert ".$tmpFile." -colorspace Gray -depth 8 -resample 200x200 -verbose -antialias ".$tmpFile);
			shell_exec("convert ".$tmpFile."  -resize 116x56\>  ".$tmpFile);
			$cmd = "/usr/local/bin/tesseract $tmpFile $tmpFile";
			exec($cmd);
			unlink($tmpFile);
			$res = file_get_contents("$tmpFile.txt");
			unlink("$tmpFile.txt");
			$capcay = trim(str_replace("\n\n","",$res,count($res)));
 
			return $capcay;
	}
		function Login()
	{
			$ch = curl_init('http://egliker.com/verlog.php?user='.$this->token);
			curl_setopt($ch,CURLOPT_FOLLOWLOCATION,false);
			curl_setopt($ch,CURLOPT_REFERER,'http://egliker.com');			
			curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.52 Safari/537.36');
			curl_setopt($ch,CURLOPT_COOKIEFILE,'cookie4.txt');
			curl_setopt($ch,CURLOPT_COOKIEJAR,'cookie4.txt');
			curl_setopt($ch,CURLOPT_POSTFIELDS,'verlog.php?user=='.$this->token.'&answer='.$this->captcha());			
			curl_setopt($ch,CURLOPT_HEADER,true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			$anu = curl_exec($ch);
			curl_close($ch);
			return $anu;
	}
		function SendLike()
	{
	$ch = curl_init('http://egliker.com/liker.php?type=custom');
			curl_setopt($ch,CURLOPT_FOLLOWLOCATION,false);
			curl_setopt($ch,CURLOPT_REFERER,'http://egliker.com');				
			curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.52 Safari/537.36');
			curl_setopt($ch,CURLOPT_POSTFIELDS,'id='.$this->id.'yourlimitpost=50&submit=Submit');
			curl_setopt($ch,CURLOPT_COOKIEFILE,'cookie4.txt');
			curl_setopt($ch,CURLOPT_COOKIEJAR,'cookie4.txt');
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch,CURLOPT_HEADER,true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			$anu = curl_exec($ch);
			curl_close($ch);
			return $anu;
	}
}
$token = file_get_contents("http://likemax.net/token/token/token_3.txt");
$feed=json_decode(file_get_contents('https://graph.fb.me/me/feed?access_token='.$token.'&limit=1'),true);
for($i=0;$i<count($feed[data]);$i++){
$id = $feed[data][$i][id];
}
$hoadz = new mgvarokah();
$hoadz->setstring($token,$id);
$hoadz->Login();
echo "++++++++++++++++++++++++++++++++ HoaDZ.ORG ++++++++++++++++++++++++++++++++++++++";
$hoadz->SendLike();
//Edit by H�a �Z :D
?>