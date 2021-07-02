<?php
$file = $_FILES['file'];
$filename = time() . $file['name'];
$tmp = $file['tmp_name'];
$file_moved = move_uploaded_file($tmp, "uploads/$filename");
if ($file_moved) {
   echo 'File uploaded successfully.';
} else {
   echo 'File did not upload successfully.';
}
