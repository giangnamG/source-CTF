<?php

session_start();
ini_set('memory_limit', '5M');
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" /> <title>Home</title>";
error_reporting(0);
if(isset($_SESSION['user'])){
	if(isset($_GET['file'])){
		if(preg_match("/.?f.?l.?a.?g.?/i", $_GET['file'])){
			die("hacker!");
		}
		else{
			if(preg_match("/home$/i", $_GET['file']) or preg_match("/upload$/i", $_GET['file'])){
				$file = $_GET['file'].".php";
			}
			else{
				$file = $_GET['file'].".no no!";
			}
			echo $file;
			require $file;
            die();
		}
	}
	
}else{
    die("<script type=\"text/javascript\">alert(\"you no permission!\"); window.location='/';</script>");
}
?>