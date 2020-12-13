<!DOCTYPE html>
<html>
<head>
    <title>Test upload file</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="fileUpload" value="" accept="image/*">
    <input type="submit" name="up" value="Upload">
</form>
<?php
$pattern = '/^[a-zA-Z0-9]{1,25}\.[a-zA-Z]{1,4}$/';
$allow_ext = array('jpeg', 'jpg', 'png');
$allow_mime = array('image/jpeg', 'image/jpg', 'image/png');

if((!empty($_FILES["fileUpload"])) && ($_FILES['fileUpload']['error'] == 0)) {
    if (preg_match($pattern, $_FILES['fileUpload']['name'])) {
        $filename = strtolower(basename($_FILES['fileUpload']['name']));
        $ext = pathinfo($filename)['extension'];
        $mime = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES['fileUpload']['tmp_name']);
        if ((in_array($ext, $allow_ext)) && (in_array($mime, $allow_mime)) && ($_FILES["fileUpload"]["size"] < 350000)) {
            $newname = dirname(__FILE__) . '/Page/' . $filename;
            if (!file_exists($newname)) {
                if ((move_uploaded_file($_FILES['fileUpload']['tmp_name'], $newname))) echo "Upload successfully!";
                else echo "Error: A problem occurred during file upload!";
            }
            else echo "Error: File already exists";
        } 
        else echo "Error: Only .jpeg, .jpg, .png images under 350Kb are accepted for upload";
    }
    else echo "Error: Filename with extension not allowed";
}
else echo "Error: No file uploaded";
?>
</body>
</html>