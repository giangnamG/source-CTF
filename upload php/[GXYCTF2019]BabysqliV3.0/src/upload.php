<?php
    if (! isset($_SESSION['user']))
        die("<script type=\"text/javascript\">alert(\"you no permission!\"); window.location='/';</script>");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 

<form action="" method="post" enctype="multipart/form-data">
	Kho lưu trữ của tôi
	<input type="file" name="file" />
	<input type="submit" name="submit" value="tải lên" />
</form>

<?php
error_reporting(0);
class Uploader{
	public $Filename;
	public $command;
	public $session_id;
	

	function __construct(){
		$sandbox = getcwd()."/uploads/".md5($_SESSION['user'])."/";
		$ext = ".txt";
		@mkdir($sandbox, 0777, true);
		if(isset($_GET['name']) and !preg_match("/data:\/\/|filter:\/\/|php:\/\/|\./i", $_GET['name'])){
			$this->Filename = $_GET['name'];
		}
		else{
			$this->Filename = $sandbox.$_SESSION['user'].$ext;
		}

		$this->command = "echo '<br><br>Master, I want to study rizhan!<br><br>';";
		$this->session_id = $_SESSION['user'];
	}
	
	function upload($file){
		global $sandbox;
		global $ext;

		if(preg_match("[^a-z0-9]", $this->Filename)){
			$this->command = "die('illegal filename!');";
		}
		else{
			if($file['size'] > 1024){
				$this->command = "die('you are too big (â²â½`ã)');";
			}
			else{
				$this->command = "move_uploaded_file('".$file['tmp_name']."', '" . $this->Filename . "');";
			}
		}
	}

	function __toString(){
		return $this->Filename;
	}

	function __destruct(){
		if($this->session_id != $_SESSION['user']){
			$this->command = "die('check session_id falied!');";
		}
		eval($this->command);
	}
}

if(isset($_FILES['file'])) {
	$uploader = new Uploader();
	$uploader->upload($_FILES["file"]);
	if(@file_get_contents($uploader)){
		echo "Tệp được lưu tại:<br>".$uploader."<br>";
		echo file_get_contents($uploader);
	}
}

?>