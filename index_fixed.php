<html>
<head>
    <title>Challenge 9</title>
</head>
<body>
<form action="upload_fixed.php" method="post" enctype="multipart/form-data">
    <input type="file" name="fileUpload" value="">
    <input type="submit" name="up" value="Upload">
</form>
<?php
if (isset($_POST['up']) && isset($_FILES['fileUpload'])) {
    if ($_FILES['fileUpload']['error'] > 0)
        echo "Upload failed!";
    else {
        move_uploaded_file($_FILES['fileUpload']['tmp_name'], $_FILES['fileUpload']['name']);
        echo "Upload successfully!";
    }
}
?>
<a href="./Page/about.php">About me</a><br/>
</body>
</html>
<?php
if (isset($_GET['page'])) {
    $file = './Page/' . $_GET['page'] . '.php';
    $arr = array('./Page/upload.php');
    if (in_array($file, $arr)) {
        include($file);
    }
}
?>