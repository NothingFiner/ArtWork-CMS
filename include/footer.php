</div>
    <footer class="bs-footer">
    	<div class="container pull-right">
    		<p> &#169; 2013 Ryann Slauson </p>
    	</div>
    </footer>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="./dist/js/bootstrap.js"></script>
    <?php 
    if ($section == "login")
      echo '
        <script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/pbkdf2.js"></script>
        <script>$("#admin_login").submit(function(e) {
        var blah = CryptoJS.SHA256($("#password").val());
        $.ajax({
          url: "hpw.js",
          type: "GET",
          dataType: "json",
          success: function(data) {
            if(data["hpw"] == blah){
              window.location.replace("success.php");
            }
            else {
              alert("failure");
            }
          },
          error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log("error :"+XMLHttpRequest.responseText);
          }
        });
        e.preventDefault();
      });
     </script>';
    ?>
    <?php
    if ($section == "index")
        echo "
          <script>
        	$(document).ready(function(){
        	  $(\".list-group-item\").click(function(){
        	  	var index_number = this.id - \" \";
        	  	var note = $(this).attr(\"data\");
        	  	$('#display').attr('src', 'img/slauson_r_img' + index_number + '.jpg');
        	  	$('.note').text(note);
        	  });
        	  	});
        	  
          </script>";
    ?>
  </body>
</html>