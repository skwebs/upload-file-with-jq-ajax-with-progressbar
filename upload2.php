<?php

$error_types = array(
   1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini.',
   2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.',
   3 => 'The uploaded file was only partially uploaded.',
   4 => 'No file was uploaded.',
   6 => 'Missing a temporary folder.',
   7 => 'Failed to write file to disk.',
   8 => 'A PHP extension stopped the file upload.'
);

$file = $_FILES['file'];

if (count($file) > 0) :

   // if ($file_moved) {
   //    echo 'File uploaded successfully.';
   // } else {
   //    echo 'File did not upload.';
   // }

   // Outside a loop...
   if ($file['error'] == 0) {
      // process
      $filename = time() . '-' . $file['name'];
      $tmp = $file['tmp_name'];
      $file_moved = move_uploaded_file($tmp, "uploads/$filename");
      if ($file_moved) {
         echo 'File uploaded successfully.';
      } else {
         echo 'File did not upload.';
      }
   } else {
      // $error_message =
      echo $error_types[$file['error']];
      // do whatever with the error message
   }

endif;
// In a loop...
// for ($x = 0, $y = count($file['error']); $x < $y; ++$x) {
//    if ($file['error'][$x] == 0) {
//       // process
//    } else {
//       $error_message = $error_types[$file['error'][$x]];
//       // Do whatever with the error message
//    }
// }

// When you're done... if you aren't doing all of this in a function that's about to end / complete all the processing and want to reclaim the memory
unset($error_types);
