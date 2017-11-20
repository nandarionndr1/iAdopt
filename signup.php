<?php
    include "curl_funcs.php";
    if(isset($_POST['submit'])){
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["artPhoto"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

        include 'upload.php';

        $artifactImagePath = "uploads/" . $_FILES["artPhoto"]["name"];

        $a = array(
            'email'=> $_POST['em'],
            'password'=> $_POST['pss'],
            'name' => $_POST['nm'],
            'photo_url' => "uploads/".$_FILES["artPhoto"]["name"],
            'usertype'=>'1'
        );
        curl_post('/db/accounts/',$a);
        header("Location: http://localhost/iAdopt/home");
    }
?>
<!DOCTYPE html>
<html>
<head>
    
    <title>iAdopt | Sign Up</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-beta.1.css" type="text/css"> </head>

<body>
  <!-------------------------------------------------------------- NAVIGATION BAR --------------------------------------------------------------->
  <nav class="navbar navbar-expand-md bg-primary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="homepageViewer.scss">iAdopt</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav"></ul>
        <a class="btn navbar-btn btn-primary ml-2 text-white" href="signup.php"><i class="f a d-inline fa-lg fa-user-circle-o"></i>&nbsp; Sign Up</a>
      </div>
    </div>
  </nav>

  <!-------------------------------------------------------------- START OF BODY --------------------------------------------------------------->
    <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3"> </div>
        <div class="col-md-6">
          <div class="card text-white p-5 bg-primary">
            <div class="card-body">
              <h1 class="mb-4">Sign-up form</h1>
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group"> <label>Email address</label>
                  <input type="email" name="em" class="form-control" placeholder="Enter Email" required> </div>
                <div class="form-group"> <label>Full Name</label>
                  <input type="text" name="nm" class="form-control" placeholder="FullName" required> </div>
                <div class="form-group"> <label>Password</label>
                  <input type="password" name="pss" class="form-control" placeholder="Password" required> </div>
                <div class="form-group"> <label>Confirm Password</label>
                  <input type="password" class="form-control" placeholder="Password" required> </div>

                  <input type='file' name='artPhoto' id="fileSelect2" onchange="showArtImage(this);" />
                  <img id="artImage" src="" alt="" style="max-width: 30vw; max-height: 30vh" min-width="0px" min-height="0px" />
                  <hr>
                  <center><button type="submit" name="submit" class="btn btn-secondary btn-lg">Sign Up</button></center>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
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
<script>
    function showArtImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#artImage')
                    .attr('src', e.target.result).style="display: inline;"
                ;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>