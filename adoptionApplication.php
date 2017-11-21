<!DOCTYPE html>
<?php
session_start();
include 'curl_funcs.php';
if($_SESSION['usertype'] != '1'){
    echo $_SESSION['usertype'];

    header('Location: http://localhost/iAdopt/home');
}

/*
$a = array(
    'postdate' => date("Y/m/d")

);
$ace = curl_getAll('/db/pets/');

foreach ($ace as $data){
    $abe = curl_patch("/db/pets/".$data['_id']['$oid'],$a);
}
*/
?>
<html>

<head>
    <title>iAdopt | Animal Catalog</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">


</head>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>

<body ng-app="myEtits" ng-controller="tite">
<style>
    .hovereffect {
        width: 100%;
        height: 100%;
        float: left;
        overflow: hidden;
        position: relative;
        text-align: center;
        cursor: default;
        background: #333;
    }

    .hovereffect .overlay {
        width: 100%;
        height: 100%;
        position: absolute;
        overflow: hidden;
        top: 0;
        left: 0;
        padding: 50px 20px;
    }

    .hovereffect img {
        display: block;
        position: relative;
        max-width: none;
        width: calc(100% + 20px);
        -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
        transition: opacity 0.35s, transform 0.35s;
        -webkit-transform: translate3d(-10px,0,0);
        transform: translate3d(-10px,0,0);
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
    }

    .hovereffect:hover img {
        opacity: 0.4;
        filter: alpha(opacity=40);
        -webkit-transform: translate3d(0,0,0);
        transform: translate3d(0,0,0);
    }

    .hovereffect h2 {
        text-transform: uppercase;
        color: #fff;
        text-align: center;
        position: relative;
        font-size: 17px;
        overflow: hidden;
        padding: 0.5em 0;
        background-color: transparent;
    }

    .hovereffect h2:after {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background: #fff;
        content: '';
        -webkit-transition: -webkit-transform 0.35s;
        transition: transform 0.35s;
        -webkit-transform: translate3d(-100%,0,0);
        transform: translate3d(-100%,0,0);
    }

    .hovereffect:hover h2:after {
        -webkit-transform: translate3d(0,0,0);
        transform: translate3d(0,0,0);
    }

    .hovereffect a, .hovereffect p {
        color: #FFF;
        opacity: 0;
        filter: alpha(opacity=0);
        -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
        transition: opacity 0.35s, transform 0.35s;
        -webkit-transform: translate3d(100%,0,0);
        transform: translate3d(100%,0,0);
    }

    .hovereffect:hover a, .hovereffect:hover p {
        opacity: 1;
        filter: alpha(opacity=100);
        -webkit-transform: translate3d(0,0,0);
        transform: translate3d(0,0,0);
    }
</style>
  <!-------------------------------------------------------------- NAVIGATION BAR --------------------------------------------------------------->
  <?php
    require "navbar.php";

    ?>
  <!-------------------------------------------------------------- START OF BODY --------------------------------------------------------------->
<style>
    <?include 'animalCatalog.css'?>
</style>
  <div class="py-5 bg-light text-dark">

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p class="lead text-center">Adoption Applications</p>
          <br>
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6" align="center">
              <input class="form-control mr-2" type="text"  id="markWeap" name="markWeap"  ng-model="markWeap" placeholder="Search">

            </div>
            <div class="col-md-3" align="center"></div>
          </div>
        </div>
      </div><br><br>

<div class="row">


    <div class="card" style="margin-bottom: 3vh" ng-repeat="x in thingsList | filter:markWeap | filter">
        <img class="card-img-top" style="width: 100%; height: 180px"  src="{{ x.photo_url }}">
        <div class="card-body">
            <a href="applications/{{ x._id }}">
                <h4>{{ x.name }}</h4>
            </a>
            <h6 class="text-muted"> {{ x.breed }} {{ x.type }}</h6>
            <small>Posted at {{ x.date }} by {{ x.oname }} </small>
        </div>
    </div>
    <!--

    <div class="card card-inverse">
        <img class="card-img" src="..." alt="Card image">
        <div class="card-img-overlay">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
    </div>

    <div class="card" style="margin-bottom: 3vh" ng-repeat="x in thingsList | filter:markWeap | filter">
                <img class="card-img-top" style="width: 100%; height: 180px"  src="{{ x.photo_url }}">
                <div class="card-body">

                    <a href="pets/{{ x._id }}">
                        <h4>{{ x.name }}</h4>
                    </a>
                    <h6 class="text-muted">{{ x.type }}</h6>

                    <h6 class="text-muted">{{ x.breed }}</h6>

                    <h6 class="text-muted">{{ x.gender }}</h6>

                </div>
            </div>
     -->



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
<script>
    var app = angular.module('myEtits', []);

    app.controller('tite', function($scope) {
        $scope.thingsList = [
        <?php
            $pets = curl_getAll("/db/pets?filter={'status':'pending'}");

            foreach($pets as $pet) {
                $owner = curl_getByID('/db/accounts/', $pet['oid']);
                ?>

            {   name:'<?php echo $pet['name'];?>',
                type:'<?php echo $pet['type'];?>',
                breed:'<?php echo $pet['breed'];?>',
                date:'<?php echo $pet['postdate'];?>',
                photo_url:'<?php echo $pet['photo_url'];?>',
                _id:'<?php echo $pet['_id']['$oid'];?>',
                oname:'<?php echo $owner['name']; ?>'

            },

        <?php } ?>
        ];

        $scope.things = [

        ];
    });
</script>

</html>