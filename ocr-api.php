<?php
/*
* OCR V3 By BMV
* FB 	  : https://www.facebook.com/100009836588298
* TWITTER : https://twitter.com/dandung_whoami
* EMAIL	  : minhvubui2001@gmail.com
* Donasi Pulsa  : 089 617 181 293 (Three)
* FITUR
* Lebih Joss
* Meremove Karakter Aneh Contoh : *&^%^%$#$$@%^*(\n)
* Akurat
* ImageMagick And TextCleaner 
*/ 
error_reporting(0);
		function varokah($url) //Fungsi Bypass Captcha 
	{
			$ch = curl_init($url);
			curl_setopt($ch,CURLOPT_REFERER,$url);							
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);	
			curl_setopt ($ch, CURLOPT_HTTPHEADER, array("Range: bytes=0-50000"));
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
			$linda = "temp.txt";
			$rosdiana = fopen($linda,"w");
			fwrite($rosdiana,$tmpFile);
			fclose($rosdiana);
            $anu = file_get_contents($linda);
			shell_exec("convert \( ".$anu."   -colorspace gray -type grayscale -contrast-stretch 0 \) \
\( -clone 0 -colorspace gray -negate -contrast-stretch 0 \) \
-compose copy_opacity -composite -fill White -opaque none +matte \
-deskew 40% -sharpen 0x1 \ ".$anu);
 			shell_exec("convert ".$anu." -colorspace Gray -depth 8 -resample 48x36 -verbose -antialias ".$anu);
			$cmd = "/usr/local/bin/tesseract $anu $anu";
			exec($cmd);
			$res = file_get_contents("$anu.txt");
			$capcay = trim(str_replace("\n\n","",$res,count($res)));
			$data = preg_replace('/[^A-Za-z0-9]/', "", $capcay);

			echo $data;
unlink($anu);
unlink(" ".$anu);
unlink($anu.".txt");
	}
$url = $_GET['img'];
if($_GET['img']){
varokah($url);
}
else
{
echo
"No Captcha Can Reorganized ";
}