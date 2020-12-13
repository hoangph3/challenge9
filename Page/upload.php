<!DOCTYPE html>
<html>
<head>
    <title>Test upload file</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="fileUpload" value="">
    <input type="submit" name="up" value="Upload">
</form>
<?php
if (isset($_POST['up']) && !empty($_FILES['fileUpload'])) {
    if ($_FILES['fileUpload']['error'] > 0)
        echo "Upload failed!";
    else {
        move_uploaded_file($_FILES['fileUpload']['tmp_name'], './Page/' . $_FILES['fileUpload']['name']);
        echo "Upload successfully!";
    }
}
?>
</body>
</html>