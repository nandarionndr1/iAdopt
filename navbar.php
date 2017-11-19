<?php
if (isset($_POST['signout'])){
    session_unset(); 
    session_destroy(); 
}
if (!isset($_SESSION['name'])){
    echo "<script>location.href = 'homepageViewer.php';</script>";
}
?>  
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
            <a class="nav-link" href="animalCatalog.php"><i class="fa d-inline fa-lg fa-eye"></i>&nbsp; &nbsp;Animal Catalog</a>
          </li>
        </ul>
          <form method="post" action="">
              <button name="signout" type="submit" class="btn navbar-btn btn-primary ml-2 text-white"><i class="fa d-inline fa-lg fa-user-circle-o"></i>&nbsp; Sign Out</button></form>
      </div>
    </div>
  </nav>