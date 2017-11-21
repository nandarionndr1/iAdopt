<?
session_start();
if(isset($_GET['logout'])){ 
     
    //Simple exit message
    $fp = fopen("chatlog.html", 'a');
    fwrite($fp, "<div class='msgln'><i>User ". $_SESSION['name'] ." has left the chat session.</i><br></div>");
    fclose($fp);

    header("Location: /iAdopt/home"); //Redirect the user
}
function loginForm(){
    echo'
    <div id="loginform">
    <form action="" method="post">
        <p>Please enter your name to continue:</p>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" />
        <input type="submit" name="enter" id="enter" value="Enter" />
    </form>
    </div>
    ';
}
 
if(isset($_POST['enter'])){
    if($_POST['name'] != ""){
        $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
    }
    else{
        echo '<span class="error">Please type in a name</span>';
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Chat - Customer Module</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <style>
    <?php include 'chatstyle.css';
        include 'homepageViewer.css';
    ?>
    </style>

</head>
<body>
    
<?php
if(!isset($_SESSION['name'])){
    loginForm();
}
else{
?>
<!---------------------------------------------- navbar ------------------------------------------------>
    
    <?php
    require "navbar.php";

    ?>

<!---------------------------------------------- main body ------------------------------------------------>
<br><br><div id="wrapper">
    <div id="menu">
        <p class="welcome">Welcome, <b><?php echo $_SESSION['name']; ?></b></p>
        <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
        <div style="clear:both"></div>
    </div>    
    <div id="chatbox"></div>
     
    <form name="message" action="" align="center">
        <input name="usermsg" type="text" id="usermsg" size="70" />
        <input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
    </form>
</div><br><br>

<!---------------------------------------------- footer po ------------------------------------------------>
    <div class="bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="p-4 col-md-6">
          <h2 class="mb-4 text-secondary">iAdopt</h2>
          <p class="text-white">A company for adopting the pets you've been wanting ever since. </p>
        </div>
        <div class="p-4 col-md-6">
          <h2 class="mb-4">Contact</h2>
          <p>
            <a href="tel:+246 - 542 550 5462" class="text-white"><i class="fa d-inline mr-3 text-secondary fa-phone"></i>+246 - 542 550 5462</a>
          </p>
          <p>
            <a href="mailto:info@pingendo.com" class="text-white"><i class="fa d-inline mr-3 text-secondary fa-envelope-o"></i>info@pingendo.com</a>
          </p>
          <p>
            <a href="https://goo.gl/maps/AUq7b9W7yYJ2" class="text-white" target="_blank"><i class="fa d-inline mr-3 fa-map-marker text-secondary"></i>365 Park Street, NY</a>
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-3">
          <p class="text-center text-white">© Copyright 2017 iAdopt - All rights reserved. </p>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript">
// jQuery Document
$(document).ready(function(){
    //If user wants to end session
	$("#exit").click(function(){
		var exit = confirm("Are you sure you want to end the session?");
		if(exit==true){window.location = 'chat.php?logout=true';}		
	});
    
    //If user submits the form
	$("#submitmsg").click(function(){	
		var clientmsg = $("#usermsg").val();
		$.post("chatpost.php", {text: clientmsg});				
		$("#usermsg").attr("value", "");
		return false;
	});
    
    function loadLog(){		
		var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request
		$.ajax({
			url: "chatlog.html",
			cache: false,
			success: function(html){		
				$("#chatbox").html(html); //Insert chat log into the #chatbox div	
				
				//Auto-scroll			
				var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height after the request
				if(newscrollHeight > oldscrollHeight){
					$("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
				}				
		  	},
		});
	}
    
    setInterval (loadLog, 2500);
});
</script>
<?php
}
?>
    
</body>
</html>