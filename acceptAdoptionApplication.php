<?php session_start();
if($_SESSION['usertype'] != '1'){
    echo $_SESSION['usertype'];

    header('Location: http://localhost/iAdopt/home');
}

include 'curl_funcs.php';

if (isset($_POST['accept'])){
    $request_body = array(
            'status'=>'approved'
    );
    curl_patch('/db/pets/'.$_GET['oid'],$request_body);

    header("Location: http://localhost/iAdopt/applications");
}elseif(isset($_POST['reject'])){
    curl_delete('/db/pets'.$_GET['oid']);

    header("Location: http://localhost/iAdopt/pets");
}

?>
<!DOCTYPE html>
<html>

<head>

    <title>iAdopt | Animal Catalog</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


    <script src="http://localhost/iAdopt/bower_components/webcomponentsjs/webcomponents-lite.js"></script>

    <script src="http://localhost/iAdopt/bower_components/webcomponentsjs/webcomponents-loader.js"></script>

    <link rel="import" href="http://localhost/iAdopt/bower_components/polymer/polymer-element.html">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">

    <link rel="import" href="http://localhost/iAdopt/bower_components/iron-icon/iron-icon.html">
    <link rel="import" href="http://localhost/iAdopt/bower_components/iron-icons/iron-icons.html">
    <link rel="import" href="http://localhost/iAdopt/bower_components/paper-input/paper-input.html">


</head>

<body>
  <!-------------------------------------------------------------- NAVIGATION BAR --------------------------------------------------------------->
  <?php
    require "navbar.php";
    // ^pets/([a-zA-Z0-9_.-]+)

    ?>
  <!-------------------------------------------------------------- START OF BODY --------------------------------------------------------------->
  <?php
  //  sample request
        $ace = curl_getByID('/db/pets/',$_GET['oid']);
        $owner = curl_getByID('/db/accounts/', $ace['oid']);

  ?>
  <style>
      <?include 'animalCatalog.css'?>
  </style>
  <div class="py-5 bg-light text-dark">
    <div class="container">


      <div class="row">
        <div class="col-md-3">
          <div class="card" style="padding: 0px;">
              <img class="card-img-top" style="width: 100%; height: 180px"  src="<?php echo "http://localhost/iAdopt/".$ace['photo_url']; ?>">

              <div class="card-body">
              <h4> <?php echo $ace['name']; ?></h4>
              <h6 class="text-muted"><?php echo $ace['breed']?></h6>
              <br>
              <div class="card-block">
                  <form action="" method="POST" id="buttons">
                      <input type="hidden" value="">
                      <button type="submit" class="btn btn-fill btn-success" style="width: 100%;" name="accept" id="accept">Accept Application</button>

                  </form>
                  <form action="" method="POST" id="buttons">
                      <button type="submit" class="btn btn-fill btn-danger" style="width: 100%;" name="reject" id="reject">Reject Application</button>
                  </form>
                  <p class="card-text">
                      <small class="text-muted">Posted by: <?php echo $owner['name']?>
                      <img src="http://localhost/iAdopt/<?php echo $owner['photo_url']?>" style="height: 25px; width: 25px; border-radius: 70%" /> </small>
                      <br>

                      <small class="text-muted">On <?php echo $ace['postdate']?></small>
                  </p>

              </div>

            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="card">
            <div class="card-body">
                <h3> <img src="http://localhost/iAdopt/glyphicons/png/glyphicons-3-dog.png"> PET DETAILS </h3>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Name: </b> <?php echo $ace['name']; ?></li>
                    <li class="list-group-item"><b>Type of Animal: </b> <?php echo $ace['type']; ?></li>
                    <li class="list-group-item"><b>Breed: </b> <?php echo $ace['breed']; ?></li>
                    <li class="list-group-item"><b>Gender: </b> <?php echo $ace['gender']; ?></li>
                    <li class="list-group-item"><b>Age: </b> <?php echo $ace['age']; ?></li>
                    <li class="list-group-item"><b>Description: </b><?php echo $ace['xtra']; ?></li>
                    <li class="list-group-item"><b>Reason For Adoption: </b><?php echo $ace['reason']; ?></li>
                </ul>
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
              <a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true">«</span> <span class="sr-only">Previous</span> </a>
            </li>
            <li class="page-item">
              <a class="page-link" href="http://localhost/iAdopt/pets" aria-label="bACK"> <span aria-hidden="true">Go Back to Animal Catalog</span> <span class="sr-only">Next</span> </a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next"> <span aria-hidden="true">»</span> <span class="sr-only">Next</span> </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

<center><div id="disqus_thread" style="width:75vw;"></div>
</center>

<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};

(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://iadopt.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

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