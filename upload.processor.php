<?php 

$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']); 

$uploadsDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . 'img/'; 
$uploadForm = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'post.form.php'; 
$uploadSuccess = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'upload.success.php';  
$fieldname = 'file';

$errors = array(1 => 'php.ini max file size exceeded', 
                2 => 'html form max file size exceeded', 
                3 => 'file upload was only partial', 
                4 => 'no file was attached'); 

// check the upload form was actually submitted else print the form 
isset($_POST['submit']) 
    or error('the upload form is neaded', $uploadForm); 

// check for PHP's built-in uploading errors 
($_FILES[$fieldname]['error'] == 0) 
    or error($errors[$_FILES[$fieldname]['error']], $uploadForm); 
     
// check that the file we are working on really was the subject of an HTTP upload 
@is_uploaded_file($_FILES[$fieldname]['tmp_name']) 
    or error('not an HTTP upload', $uploadForm); 
     
// validation... since this is an image upload script we should run a check   
// to make sure the uploaded file is in fact an image. Here is a simple check: 
// getimagesize() returns false if the file tested is not an image. 
@getimagesize($_FILES[$fieldname]['tmp_name']) 
    or error('only image uploads are allowed', $uploadForm); 
     
// make a unique filename for the uploaded file and check it is not already 
// taken... if it is already taken keep trying until we find a vacant one 
// sample filename: 1140732936-filename.jpg 
$filename=$_FILES[$fieldname]['name'];
$extension=pathinfo($filename);
$index = 0; 
while(file_exists($uploadFilename = $uploadsDirectory.'slauson_r_img'.$index.'.'.$extension['extension'])) 
{ 
    $index++; 
} 

// now let's move the file to its final location and allocate the new filename to it 
@move_uploaded_file($_FILES[$fieldname]['tmp_name'], $uploadFilename) 
    or error('receiving directory insuffiecient permission', $extension, $uploadForm); 

$file = file_get_contents('db.js', true);
    $data = json_decode($file, true);
    unset($file);
    //you need to add new data as next index of data.
    $data[] = array('title' => $_POST['title'], 'url' => 'slauson_r_img'.$index.'.'.$extension['extension'], 'note' => $_POST['notes']);
    $result=json_encode($data);
    file_put_contents('db.js', $result);
    unset($result);
     
// If you got this far, everything has worked and the file has been successfully saved. 
// We are now going to redirect the client to a success page. 
header('Location: ' . $uploadSuccess); 

// The following function is an error handler which is used 
// to output an HTML error page if the file upload fails 
function error($error, $extension, $location, $seconds = 5) 
{ 
    header("Refresh: $seconds; URL='$location'"); 
    echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"'."n". 
    '"http://www.w3.org/TR/html4/strict.dtd">'."nn". 
    '<html lang="en">'."n". 
    '    <head>'."n". 
    '        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">'."nn". 
    '        <link rel="stylesheet" type="text/css" href="stylesheet.css">'."nn". 
    '    <title>Upload error</title>'."nn". 
    '    </head>'."nn". 
    '    <body>'."nn". 
    '    <div id="Upload">'."nn". 
    '        <h1>Upload failure</h1>'."nn". 
    '        <p>An error has occurred: '."nn". 
    '        <span class="red">' . $error .  '...</span>'."nn". 
    '         The upload form is reloading</p>'."nn". 
    '     </div>'."nn".
    '</html>'; 
    exit; 
} // end error handler 

?> 