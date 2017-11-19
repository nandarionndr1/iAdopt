<?php
    include 'curl_funcs.php';

    if(isset($_POST['submit'])){
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["artPhoto"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

        include 'upload.php';
        $artifactImagePath = "uploads/" . $_FILES["artPhoto"]["name"];


        $a = array(
            'name'=>$_POST['name'],
            'age'=>$_POST['age'],
            'type'=>$_POST['type'],
            'breed'=>$_POST['breed'],
            'gender'=>$_POST['gender'],
            'reason'=>$_POST['reason'],
            'xtra'=>$_POST['xtra'],
            'photo_url'=>"uploads/".$_FILES["artPhoto"]["name"]
        );
        curl_post('/db/doggos/', $a);
    }
?>
<!DOCTYPE html>
<html>

<head>
    
    <title>iAdopt | Add Pet Adoption</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <link rel="stylesheet" href="homepageViewer.css" type="text/css"> 
  <link rel="import" href="bower_components/polymer/polymer-element.html">
  <link rel="import" href="bower_components/paper-input/paper-input.html">
  <link rel="import" href="bower_components/paper-dropdown-menu/paper-dropdown-menu.html">
  <link rel="import" href="bower_components/paper-checkbox/paper-checkbox.html">

  <link rel="import" href="bower_components/paper-listbox/paper-listbox.html">
  <link rel="import" href="bower_components/iron-icons/iron-icons.html">

    <link rel="import" href="bower_components/bwt-uploader/bwt-uploader.html">

    
  <link rel="import" href="bower_components/exm-token-input/exm-token-input.html">
  <link rel="import" href="bower_components/exm-token-input/exm-token-input-dropdown.html">
  <link rel="import" href="bower_components/exm-token-input/exm-expand-animation.html">

  <script src="bower_components/webcomponentsjs/webcomponents-lite.js"></script>
    <style>
  #uploader {
    --preview-border: 1px dashed green;
    --preview-width: 300px;
    --preview-height: 300px;
    --progress-bar-color: red;
    --primary-text-color:green;
    --secondary-text-color:brown;
    --preview-border: 1px dashed green;
    --preview-width: 150px;
    --preview-height: 150px;

  }
  .host {
    --paper-input-container-input: {
      font-size: 50px;
    };
  }
  body{
    overflow: auto;
  }

</style>
</head>

<body>
  <nav class="navbar navbar-expand-md bg-primary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="homepageUser.php">iAdopt</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="AddPetAdoption.php"><i class="fa d-inline fa-lg fa-github"></i>&nbsp; Add Pet for Adoption</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="findPet.html"><i class="fa d-inline fa-lg fa-search"></i>&nbsp; &nbsp;Find a Pet</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="animalCatalog.html"><i class="fa d-inline fa-lg fa-eye"></i>&nbsp; &nbsp;Animal Catalog</a>
          </li>
        </ul>
        <a class="btn navbar-btn btn-primary ml-2 text-white" href="homepageView.html"><i class="fa d-inline fa-lg fa-user-circle-o"></i>&nbsp; Sign Out</a>
      </div>
    </div>
  </nav>
    
    
  <div class="py-5  opaque-overlay" style="background-image: url(&quot;https://pingendo.github.io/templates/sections/assets/cover_restaurant.jpg&quot;);">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body p-5">
              <h3 class="pb-3" style="color:black">Add Pet for Adoption</h3>
              <form action="" method="post"  enctype="multipart/form-data">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label col-form-label-lg">Name</label>
                  <div class="col-sm-9">
                    <input class="form-control" name="name">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label col-form-label-lg">Age</label>
                  <div class="col-sm-9">
                    <input class="form-control" name="age">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label col-form-label-lg">Type</label>
                  <div class="col-sm-9">
                    <select class="form-control" name="type">
                      <option value="Dog">Dog</option>
                      <option value="Cat">Cat</option>
                      <option value="Bird">Bird</option>
                      <option value="Fish">Fish</option>
                      <option value="Glider">Sugar Glider</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label col-form-label-lg">Breed</label>
                  <div class="col-sm-9">
                    <input class="form-control" name="breed">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label col-form-label-lg">Gender</label>
                  <div class="col-sm-9">
                    <select class="form-control" name="gender">
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                    </select>
                  </div>
                </div>
                <!--<exm-token-input label="BREED" value="Ronna,Beatris" data='["Rubin","Gennie","Ronna","Jacquie","Norene","Beatris","Ginny","Tiesha","Leonore","Evonne"]'></exm-token-input>-->
                <hr>
                  <center>
                  <div class="form-group">
                  <label for="comment">Reason For Adoption:</label>
                    <textarea class="form-control" rows="5" id="comment" name="reason"></textarea>
                  </div>
                  <div class="form-group">
                  <label for="comment">Extra Details:</label>
                    <textarea class="form-control" rows="5" id="comment" name="xtra"></textarea>
                  </div>    
                  </center>
                <center><button class="btn btn-success btn-lg" name="submit" type="submit">Submit!</button></center>

            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card" style="width:80%">
            <div class="card-body p-3">
                <center>
              <h3 class="pb-3" style="color:black;">Upload Pet Image</h3>
                    <!--
                    <bwt-uploader name="upload" id="imgUploader" theme="square" target="https://httpbin.org/post" body="[[body]]" header="[[header]]" method="POST">
                    </bwt-uploader>
                    -->
                    <label for="sel1">Upload Artifact Image</label><br>
                    <input type='file' name='artPhoto' id="fileSelect2" onchange="showArtImage(this);" />
                    <img id="artImage" src="" alt="" style="max-width: 300px; max-height: 300px" min-width="0px" min-height="0px" />
                </center>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
  <div class="bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="p-4 col-md-3">
          <h2 class="mb-4 text-secondary">iAdopt</h2>
          <p class="text-white">A company for adopting the dogs you've been wanting ever since.</p>
        </div>
        <div class="p-4 col-md-3">
          <h2 class="mb-4 text-secondary">Mapsite</h2>
          <ul class="list-unstyled">
            <a href="#" class="text-white">Home</a>
            <br>
            <a href="#" class="text-white">About us</a>
            <br>
            <a href="#" class="text-white">Our services</a>
            <br>
            <a href="#" class="text-white">Stories</a>
          </ul>
        </div>
        <div class="p-4 col-md-3">
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
        <div class="p-4 col-md-3">
          <h2 class="mb-4 text-light">Subscribe</h2>
          <form>
            <fieldset class="form-group text-white"> <label for="exampleInputEmail1">Get our newsletter</label>
              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"> </fieldset>
            <button type="submit"  class="btn btn-outline-secondary">Submit</button>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-3">
          <p class="text-center text-white">© Copyright 2017 Pingendo - All rights reserved. </p>
        </div>
      </div>
    </div>
  </div>
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