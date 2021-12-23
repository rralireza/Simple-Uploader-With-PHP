<?php

    if(isset($_POST['btn']))
    {
        $mail=$_POST['name'];
        mkdir("images/".$mail);
        $file=$_FILES['file']['name'];
        $array=explode('.',$file);
        $ext=end($array);
        $NewName="pic-".time().".".$ext;
        $from=$_FILES['file']['tmp_name'];
        $to="images/".$mail."/".$NewName;
        move_uploaded_file($from, $to);
        $password=$_POST['password'];
        $var=mysqli_connect('localhost', 'root', '', 'up_table');
        $res="INSERT INTO users (email, password, filename, address) VALUES ('$mail', '$password', '$NewName', '$to')";
        mysqli_query($var,$res);
    }

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Third Form</title>
</head>
<body style="background-color: #e2ff3b; text-align: center; margin: 250px;">
    <form action="" method="post" enctype="multipart/form-data">
        <h1>Welcome</h1>
        <br>
        <input type="email" name="name" placeholder="E-Mail">
        <br>
        <br>
        <input type="password" name="password" placeholder="Password">
        <br>
        <br>
        <input type="file" name="file">
        <br>
        <br>
        <button type="submit" name="btn">Upload</button>
    </form>
</body>
</html>