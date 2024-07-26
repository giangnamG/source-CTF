<?php 
session_start();
if (isset($_SESSION['user']))
    die("<script>window.location='/home.php?file=upload'</script>");

if (isset($_POST['user']) && isset($_POST['passwd'])){
    $user = $_POST['user'];
    $passwd = $_POST['passwd'];
    if ($user == 'admin' && $passwd == 'admin'){
        $_SESSION['user'] = md5((string)time().(string)rand(100, 10000));
        die("<script>alert('congratulation !!!');window.location='/home.php?file=upload'</script>");
    }else{
        $wrong = "no, try again !!!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="./app.css" type="text/css">
</head>
<body>
    <form method="POST">
        <h1>Anh bạn tôi có tạo 1 dịch vụ của riêng mình, nhưng anh ấy đã quên mật khẩu admin của mình, chỉ nhớ mật khẩu này rất yếu và khá phổ biến</h1>
        <input type="text" name="user" placeholder=<?php if(isset($user) && $user!="") echo $user; else echo "Username";?>>
        <input type="password" name="passwd" placeholder=<?php if(isset($passwd) && $passwd != "") echo $passwd; else echo "Password";?>>
        <button type="submit" name="login">Login</button>
        <?php 
            if (isset($wrong))
                echo '<h4 style="color:red">'.$wrong.'</h4>';
        ?>
    </form>
</body>
</html>