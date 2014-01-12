<?php 
$pageTitle = "New Post";
$section = "post";
include('include/header.php');
$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
$uploadHandler = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'upload.processor.php'; 
$max_file_size = 1048576;
?>
   <form id="Upload" action="<?php echo $uploadHandler ?>" enctype="multipart/form-data" method="post"> 
     
        <h4> 
            Image Upload
        </h4> 
         
        <p> 
            <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size ?>"> 
        </p> 
         
        <p> 
            <label for="file">File to upload:</label> 
            <input id="file" type="file" name="file">
            
        </p> 
        <p> 
            <label for="title">Work Title:</label> 
            <input id="title" type="text" name="title"> 
        </p> 
        <p> 
            <label for="notes">Work Notes:</label> 
            <input id="notes" type="text" name="notes"> 
        </p> 
            
            
                 
        <p> 
            <label for="submit">Press to...</label> 
            <input id="submit" type="submit" name="submit" value="Upload me!"> 
        </p> 
     
    </form> 

<?php include('include/footer.php'); ?>