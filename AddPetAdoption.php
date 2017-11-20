<?php
session_start();

    include 'curl_funcs.php';

    if(isset($_POST['submit'])){
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["artPhoto"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

        include 'upload.php';
        $artifactImagePath = "uploads/" . $_FILES["artPhoto"]["name"];

        $a = array(
            'oid'=>$_SESSION['oid'],
            'name'=>$_POST['name'],
            'age'=>$_POST['age'],
            'type'=>$_POST['type'],
            'breed'=>$_POST['breed'],
            'gender'=>$_POST['gender'],
            'reason'=>$_POST['reason'],
            'xtra'=>$_POST['xtra'],
            'postdate'=>date("Y/m/d"),
            'status'=>'pending', // put into pending later
            'photo_url'=>"uploads/".$_FILES["artPhoto"]["name"]
        );
        curl_post('/db/pets/', $a);

        //AIzaSyB3Fgc5t0ztFJHt-lyQ1YrJK75ArTI3zEA api key

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
    <script src="https://maps.googleapis.com/maps/api/jsvv=3.exp&sensor=false&libraries=places"></script>

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

    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
    <style>
        #locationField, #controls {
            position: relative;
            width: 480px;
        }
        #autocomplete {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 99%;
        }
        .label {
            text-align: right;
            font-weight: bold;
            width: 100px;
            color: #303030;
        }
        #address {
            border: 1px solid #000090;
            background-color: #f0f0ff;
            width: 480px;
            padding-right: 2px;
        }
        #address td {
            font-size: 10pt;
        }
        .field {
            width: 99%;
        }
        .slimField {
            width: 80px;
        }
        .wideField {
            width: 200px;
        }
        #locationField {
            height: 20px;
            margin-bottom: 2px;
        }
    </style>
</head>

</head>

<body>
    <?php include 'navbar.php'?>
    
    
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
                    <input type='file' name='artPhoto' id="fileSelect2" onchange="showArtImage(this);" required />
                    <img id="artImage" src="" alt="" style="max-width: 300px; max-height: 300px" min-width="0px" min-height="0px" />

                    <label for="locationTextField">Location</label>
                    <input id="locationTextField" type="text" size="50">

                    <script>
                        function init() {
                            var input = document.getElementById('locationTextField');
                            var autocomplete = new google.maps.places.Autocomplete(input);
                        }

                        google.maps.event.addDomListener(window, 'load', init);
                    </script>


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