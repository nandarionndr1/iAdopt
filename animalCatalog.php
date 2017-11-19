<!DOCTYPE html>
<?php
session_start();
include 'curl_funcs.php';

?>
<html>

<head>
    <title>iAdopt | Animal Catalog</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="animalCatalog.css" type="text/css"> </head>

<body>
  <!-------------------------------------------------------------- NAVIGATION BAR --------------------------------------------------------------->
  <?php
    require "navbar.php";
    ?>
  <!-------------------------------------------------------------- START OF BODY --------------------------------------------------------------->
  <div class="py-5 bg-light text-dark">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="display-1 text-center">Animal Catalog</h1>
          <p class="lead text-center">Who knows? Maybe you are their next home.</p>
          <br>
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6" align="center">
              <input class="form-control mr-2" type="text" placeholder="Search">
              <div class="btn-group text-center">
                <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Category </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">Action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Separated link</a>
                </div>
              </div>
              <div class="btn-group text-center">
                <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Filter </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">Action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Separated link</a>
                </div>
              </div>
              <div class="btn-group text-center">
                <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Sort By </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">Action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Separated link</a>
                </div>
              </div>
            </div>
            <div class="col-md-3" align="center"> </div>
          </div>
        </div>
      </div><br><br>
<div class="row">        
<?php
// Getting
    
    $pets = curl_getAll("/db/pets/");
    $ctr = sizeOf($pets);
    foreach ($pets as $pet){
        
            ?><?php
        
        ?>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <a href="animalCatalogIndividual.html"><img class="img-fluid w-100 p-0 m-0" src="<?php echo $pet['photo_url']; ?>">
                    <hr>
                    <h4><?php echo $pet['name']?></h4></a>
                    <h6 class="text-muted"><?php echo $pet['type']?></h6>
                </div>
            </div>
        </div>
        <?php
        
            ?><?php
        
    }
    //echo $email['email'];
    //echo $email['password'];        
?>
    </div>
        
        
        
      <div class="row">
        <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <img class="img-fluid w-100 p-0 m-0" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg">
            <hr>
            <h4>Dog</h4>
            <h6 class="text-muted">Pomeranian Husky</h6>
          </div>
        </div>
      </div><div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <img class="img-fluid w-100 p-0 m-0" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg">
            <hr>
            <h4>Dog</h4>
            <h6 class="text-muted">Pomeranian Husky</h6>
          </div>
        </div>
      </div><div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <img class="img-fluid w-100 p-0 m-0" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg">
            <hr>
            <h4>Dog</h4>
            <h6 class="text-muted">Pomeranian Husky</h6>
          </div>
        </div>
      </div><div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <img class="img-fluid w-100 p-0 m-0" src="https://pingendo.com/assets/photos/wireframe/photo-1.jpg">
            <hr>
            <h4>Dog</h4>
            <h6 class="text-muted">Pomeranian Husky</h6>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6" align="center">
          <ul class="pagination" align="center">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true">«</span> <span class="sr-only">Previous</span> </a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">3</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">4</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next"> <span aria-hidden="true">»</span> <span class="sr-only">Next</span> </a>
            </li>
          </ul>
        </div>
        <div class="col-md-6"></div>
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