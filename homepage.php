<?php
session_start();
include 'curl_funcs.php';

?>
<?php
if (isset($_POST['login'])){
    $email = $_POST['email'];

    $user = curl_getByEmail('/db/accounts/', $email);

    $password = $user['password'];
    $email = $user['email'];
    if ($_POST['password'] == $password){

        $_SESSION['name'] = $user['name'];
        $_SESSION['usertype'] = $user['usertype'];
        $_SESSION['oid'] = $user['_id']['$oid'];
        $_SESSION['photo_url'] = $user['photo_url'];
        $_SESSION['email'] = $user['email'];

    }
    else
        echo '<script>alert("invalid password");</script>';



}
?>

<!DOCTYPE html>
<html>

<head>
    <title>iAdopt | Homepage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">



<body>
  <!-------------------------------------------------------------- NAVIGATION BAR --------------------------------------------------------------->
<?php if(!isset($_SESSION['name'])){?>
    <style>
        <?
        include_once 'homepageViewer.css';
        ?>
    </style>
  <nav class="navbar navbar-expand-md bg-primary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="">iAdopt</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
      </div>
    </div>
  </nav>

      <!-------------------------------------------------------------- START OF BODY ------------------------------------------------------------->

  <div class="py-5 text-center opaque-overlay" style="background-image: url('uploads/DogAndCatOnBed850.jpg');">
      <div class="container py-5">
          <div class="row">
              <div class="col-md-6">
                  <h1 class="display-1 text-left" style="color:white;"><br>iAdopt</h1>
                  <p class="lead text-left" style="color:white;">We provide people an avenue for pets needing some luv and care. We have guarantees that all these pets are loving nd will be good pets for you. Pick the <b>right pet for you</b>.</p>
              </div>

              <div class="col-md-6 text-black text-left p-5" style="background-color:#fff">
                  <h1 class="text-left">Login</h1>
                  <br>
                  <form action="" method="post">
                      <div class="form-group text-left"> <label class="text-left">Email address</label>
                          <input type="email" name="email" class="form-control" placeholder="Enter email"> </div>
                      <div class="form-group text-left"> <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password"> </div>
                      <button type="submit" name="login" class="btn btn-primary">Login</button>
                      <hr>
                      <small>dont have an account? <a href="http://localhost/iAdopt/sign-up"><b>SIGN-UP HERE</b></a></small>
                      <center>or</center>

                  </form>
              </div>
          </div>
      </div>
  </div>
<?php }
else {
    include_once 'navbar.php';
    ?>
    <style>
        <?
        include_once 'homepageViewer.css';
        ?>
    </style>
    <div class="py-5 text-center opaque-overlay" style="background-image: url('uploads/dog-kitten.jpg');">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="display-1 text-left" style="color:white;"><br>iAdopt</h1>
                    <p class="lead text-left" style="color:white;">We provide people an avenue for pets needing some luv and care. We have guarantees that all these pets are loving nd will be good pets for you. Pick the <b>right pet for you</b>.</p>
                </div>
                <div class="col-md-6 text-black text-left p-5" style="background-color:#fff">
                    <h1 class="text-left">Welcome, <?php echo $_SESSION['name'];?></h1>
                    <p class="lead text-left" style="color:black;">Adopt one now! Who knows? Maybe you are their next home.</p>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
  <!------------------------------------------------------------- START OF FOOTER HERE --------------------------------------------------------->
  <div class="bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="p-4 col-md-6">
          <h2 class="mb-4 text-secondary">iAdopt</h2>
          <p class="text-white">A company for adopting the dogs you've been wanting ever since.</p>
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
</body>
</html>
