<?php 
$files = scandir('img', 1);
$pageTitle="Upload Successful!";
include('include/header.php');

?>

<html lang="en"> 
    <head> 
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1"> 
         
        <link rel="stylesheet" type="text/css" href="stylesheet.css"> 
         
        <title>Successful upload</title> 
     
    </head> 
     
    <body> 
     <div class="row">
        <div id="Upload"> 
            <h1>File upload</h1> 
            <p>Good News, Mistress! Your file upload was successful! We rejoice!</p> 
            <img src="img/<?php echo $files[0];?>">
        </div>
        
     </div>
    </body> 

</html> 

<?php include('include/footer.php'); ?>