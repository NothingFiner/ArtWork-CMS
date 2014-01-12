<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="./dist/css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/sha256.js"></script>
  </head>
  <body>
    <div>
      <nav class="navbar navbar-default">
        <div class="navbar-header">
          <button data-toggle="collapse" data-target=".menu-navbar-collapse" class="navbar-toggle"><span class="sr-only">Toggle Navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="index.php" class="navbar-brand">Ryann Slauson</a>
        </div>
        <div class="menu-navbar-collapse collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="#">Bio</a></li>
            <li><a href="#">CV</a></li>
            <li><a href="mailto:the.sea.never.rests@gmail.com" target="_blank">Contact</a></li>
          </ul>
        </div>
      </nav>
    </div>
    <div class="container">
      <?php
      $value = hash(sha256, date('jn') - 69);
      if ($_COOKIE['admin']==$value)
        echo '<p>Welcome, Mistress Slauson</p>'; 
      ?>
