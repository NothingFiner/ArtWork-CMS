<?php
$value = hash(sha256, date('jn') - 69);
setcookie('admin', $value, time()+3600);
include('include/header.php');
echo '<p>Welcome Great Archon. What is thy will?</p>';
include('include/footer.php'); 
?>