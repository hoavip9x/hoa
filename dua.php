<?php 
/*
* Bypass Captcha  C�i
* 100% Work
* Please Use Hosting Support OCR To Work 
* Selamat Hari Raya Idul Fitri Gan , Mohon Maaf Lahir Dan Batin
*/
class mgvarokah
{
	function setstring($token,$id)
	{
		$this->token = $token;
		$this->id	 = $id;
	}
	function captchamodar() //Fungsi Bypass Captcha 
	{
			$img = 'http://mg-likers.com/includes/image.php';
			$ch = curl_init($img);
			curl_setopt($ch,CURLOPT_COOKIEJAR,'cookie.txt');	
			curl_setopt($ch,CURLOPT_COOKIEFILE,'cookie.txt');			
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
			$ch = curl_init('http://mg-likers.com/login.php?access_token='.$this->token);
			curl_setopt($ch,CURLOPT_FOLLOWLOCATION,false);
			curl_setopt($ch,CURLOPT_REFERER,'http:/mg-likers.com');			
			curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.52 Safari/537.36');
			curl_setopt($ch,CURLOPT_COOKIEFILE,'cookie.txt');
			curl_setopt($ch,CURLOPT_COOKIEJAR,'cookie.txt');
			curl_setopt($ch,CURLOPT_POSTFIELDS,'captcha_verify='.$this->captchamodar().'&access_token='.$this->token.'&submit=SUBMIT&IL_IN_TAG=2');			
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
	$ch = curl_init('http://mg-likers.com/like.php?type=status');
			curl_setopt($ch,CURLOPT_FOLLOWLOCATION,false);
			curl_setopt($ch,CURLOPT_REFERER,'http://mg-likers.com/');				
			curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.52 Safari/537.36');
			curl_setopt($ch,CURLOPT_POSTFIELDS,'id='.$this->id.'&privacy=yes&submit=submit&limit=200&IL_IN_TAG=2');
			curl_setopt($ch,CURLOPT_COOKIEFILE,'cookie.txt');
			curl_setopt($ch,CURLOPT_COOKIEJAR,'cookie.txt');
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
$joywhan = new mgvarokah();
$joywhan->setstring($token,$id);
$joywhan->Login();
echo "++++++++++++++++++++++++++++++++ VAROKAH ++++++++++++++++++++++++++++++++++++++";
$joywhan->SendLike();
/*
*** FAQ ***
* Sorry Gan Jika Codenya Ga Rapi Atau Ga Professional
* Ane Bukan Anak RPL 
* Ane Anak IPS :v Njir 
*/
?>