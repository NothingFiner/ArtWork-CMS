<?php 
$pageTitle = "R C Slauson - Home";
$section = "index";
include('include/header.php');
$result = file_get_contents("db.js");
$db = json_decode($result, true);
end($db);
$last_id=key($db);
?>
    <div class="col-md-3 pull-left">  
      <div class="list-group" id="work">
      <?php
      	
      	$j = 1;
	$output = "";
	$length = count( $db );

	while ( $length-- && $j++ ) {
  	 $s = $db[ $length ];
  	 $note = $s['note'];
  	$output .= "<a class='list-group-item' href='#' id='{$length}' data='{$note}'>{$s['title']}</a>";
	};
	echo $output;
      ?>
      </div>
    </div>
    <div class="col-md-9 pull-right">
    	 <img id="display" src= "img/<?php echo ( $db[$last_id]['url']); ?>">
    	 <p class="note"> <?php echo ($db[$last_id]['note']); ?> </p>
    	
    </div> 
<?php 
$value = hash(sha256, date('jn') - 69);
if ($_COOKIE['admin']==$value)
   include('include/new_post.php'); 
include('include/footer.php'); ?>