<?php
    session_start();

require_once 'curl_funcs.php';
require_once 'navbar.php';
?>
<!DOCTYPE html>
<html>

<head>
    
    <title>iAdopt | Animal Catalog</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">

    <style>
        <?include 'animalCatalog.css';
        ?>
    </style>
 
</head>   

<body>
  <!-------------------------------------------------------------- NAVIGATION BAR --------------------------------------------------------------->
<?php

      $user = curl_getByID('/db/accounts/',$_GET['oid']);
      $pets = curl_getAll("/db/pets?filter={'oid':'".$_GET['oid']."','status':'approved'}");
?>
  <!-------------------------------------------------------------- START OF BODY --------------------------------------------------------------->
<!--<div class="container">
    <div class="row">
        <br><br>
        <div class="p-5 col-md-12">
            <div class="card-deck" style="padding: -100%;">
                <div class="card text-center" style="width: 20rem;">
                  <div class="card-block">
                    <h4 class="card-title">Special title treatment</h4>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  </div>
                </div>
                <div class="card text-center" style="width: 20rem;">
                  <div class="card-block">
                    <h4 class="card-title">Special title treatment</h4>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>--->
    
    <div class="row">
        <div class="p-2 col-md-4">
            <div class="card card-inverse" style="background-color:#000000; ">
                <img class="card-img" src="http://localhost/iAdopt/<? echo $user['photo_url']?>" alt="Card image" style="opacity: 0.4">
                <div class="card-img-overlay">
                    <h4 class="card-title" style="color: white;"><?php echo $user['name']?></h4>
                    <p class="card-text" style="color: white;"><?php echo $user['email']?></p>
                </div>
                <div class="card-body">
                    <p class="card-text" style="color: white;">Animals and info.</p>
                </div>
            </div>
        </div>
        <div class="p-2 col-md-8">


            <div class="row">
          <?php foreach ($pets as $pet){ ?>
              <div class="col-md-4" style="padding: 0px;">
                  <div class="card" style="background-color:#000000; ">
                    <img class="card-img" src="http://localhost/iAdopt/<? echo $pet['photo_url']?>" style="opacity: 0.6" alt="Card image" >
                      <div class="card-img-overlay">
                          <h4 class="card-title" style="color: white;"><a href="http://localhost/iAdopt/pets/<?php echo $pet['_id']['$oid']?>"><?php echo $pet['name']?></a></h4>
                          <p class="card-text" style="color: white;"><?php echo $pet['breed']?></p>
                      </div>

                        <!--
                        <p><b>Name:</b> <? echo $pet['name']?></p>
                        <p><b>Type of Animal:</b> <? echo $pet['type']?></p>
                        <p><b>Breed:</b> <? echo $pet['breed']?></p>
                        <p><b>Gender:</b> <? echo $pet['gender']?></p>
                        <p><b>Age:</b> <? echo $pet['age']?></p>
                        <p><b>Description:</b> <? echo $pet['xtra']?></p>
                        <p><b>Reason for Adoption:</b> <? echo $pet['reason']?></p>
                        <p class="card-text"><small class="text-muted">Posted at <? echo $pet['postdate']?></small></p>
                        -->
                  </div>
              </div>
        <?php } ?>
            </div>
        </div>

      </div>

  <!-------------------------------------------------------------- FOOTER STARS HERE ---------------------------------------------------------->
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