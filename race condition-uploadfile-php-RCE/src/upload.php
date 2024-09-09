<?php

function check($file_path)
{
    $content = file_get_contents($file_path);
    
    if (strpos($content, '<?php') !== false) {
        return true; 
    }
    
    return false;
}

function check2($path, $ext)
{
    $allowed_extensions = ['png', 'jpg', 'jpeg', 'gif'];
    
    if (!in_array(strtolower($ext), $allowed_extensions)) {
        return false;
    }
    
    $image_info = getimagesize($path);
    if ($image_info === false) {
        return false;
    }
    
    return true;
}

if (isset($_FILES) && !empty($_FILES)) {

    $uploadpath = "tmp/";
    
    $ext = pathinfo($_FILES["files"]["name"], PATHINFO_EXTENSION);
    $filename = basename($_FILES["files"]["name"], "." . $ext);

    $timestamp = time();
    echo $timestamp.'<br>';
    $new_name = $filename . '_' . $timestamp . '.' . $ext;
    $upload_dir = $uploadpath . $new_name;

    if ($_FILES['files']['size'] <= 1048576) {
        move_uploaded_file($_FILES["files"]["tmp_name"], $upload_dir);
    } else {
        echo $error2 = "File size exceeds 1MB";
    }

    if (check2($upload_dir, $ext) && !check($upload_dir)){
        echo "Upload success ";
    } else {
        echo "Upload failure";
        die();
    }
    
    echo $upload_dir;
    unlink($upload_dir);
}

?>
