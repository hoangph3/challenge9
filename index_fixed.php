<?php include('upload_fixed.php');
if (isset($_GET['page'])) {
    $file = './Page/' . $_GET['page'] . '.php';
    $arr = array('./Page/upload.php');
    if (in_array($file, $arr)) {
        include($file);
    }
}
?>
<br/>
<a href="./Page/about.php">About me</a><br/>
