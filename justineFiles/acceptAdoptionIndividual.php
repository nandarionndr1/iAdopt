<?php
    $id = $_GET['id'];
    $m = new MongoClient();
    $db = $m->db;
    $col = $db->pets;
    if(isset($_POST['accept'])){
        //  EMAIL
    }
    $current = $col->findOne(array('id' => $id));
    
    
?>
<!DOCTYPE html>
<html>

<head>
    
  <title>iAdopt | Accept Adoption</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="animalCatalog.css" type="text/css"> </head>

<body>
  <!-------------------------------------------------------------- NAVIGATION BAR --------------------------------------------------------------->
  <nav class="navbar navbar-expand-md bg-primary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="homepageUser.html">iAdopt</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="AddPetAdoption.html"><i class="fa d-inline fa-lg fa-github"></i>&nbsp; Add Pet for Adoption</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="findPet.html"><i class="fa d-inline fa-lg fa-search"></i>&nbsp; &nbsp;Find a Pet</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="animalCatalog.html"><i class="fa d-inline fa-lg fa-eye"></i>&nbsp; &nbsp;Animal Catalog</a>
          </li>
        </ul>
        <a class="btn navbar-btn btn-primary ml-2 text-white" href="homepageViewer.html"><i class="fa d-inline fa-lg fa-user-circle-o"></i>&nbsp; Sign Out</a>
      </div>
    </div>
  </nav>
  <!-------------------------------------------------------------- START OF BODY --------------------------------------------------------------->
  <div class="py-5 bg-light text-dark">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <img class="img-fluid w-100 p-0 m-0" src="https://i.pinimg.com/736x/25/37/5c/25375c3078ec819fbedd47baed27cb1c--husky-pomeranian-mix-teacup-husky-puppies.jpg">
              <hr>
              <h4>Sophie</h4>
              <h6 class="text-muted">Pomeranian Husky</h6>
              <br>
              <form action="<?php echo $_SERVER['PHP_SELF']."?id=".$id; ?>" method="POST" id="buttons">
                <button type="submit" class="btn btn-fill btn-primary" style="width: 100%;" name="accept" id="accept">I'M INTERESTED</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="card">
            <div class="card-body">
            <?php
              echo "<p><b>Name:</b> ".$current['name']."</p>";
              echo "<p><b>Type of Animal:</b> ".$current['type']."</p>";
              echo "<p><b>Breed:</b> ".$current['breed']."</p>";
              echo "<p><b>Age:</b> ".$current['age']." human years</p>";
              // echo "<p><b>Owner:</b> ".$currentOwner['name']."</p>";
              echo "<p><b>Description:</b> ".$current['xtra']."</p>";
              echo "<p><b>Reason for Adoption:</b> ".$current['reason']."</p>";
            ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-6" align="center">
          <ul class="pagination" align="center">
            <li class="page-item">
              <a class="page-link" href="animalCatalog.html" aria-label="bACK"> <span aria-hidden="true">Go Back to List</span> <span class="sr-only">Next</span> </a>
            </li>
          </ul>
        </div>
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
  <script>
    /*function doSomething(){
        var choice = confirm("This will now add the pet up for adoption and allow the pet to be seen by other users in the animal catalog. Do you want to continue?");
        if(choice){
            document.buttons.accept.value = "Y";
            document.buttons.submit();
        }
        else{}
    }
    
    function doElse(){
        var choice = confirm("You are rejecting the applicaiton of a pet to find a loving home. Do you want to continue?");
        if(choice){
            document.buttons.reject.value = "Y";
            document.buttons.submit();
        }
        else{}
        
    }*/
  </script>
</body>

</html>