<?php

if (isset($_POST['signout'])){
    session_unset();
    session_destroy();
}
if (!isset($_SESSION['name'])){
    header('Location: http://localhost/iAdopt/home');
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Product+Sans" rel="stylesheet" type="text/css">

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script>
    $(function () {
        $('[data-toggle="popover"]').popover()

    });
    $(function () {

        $('.popover-dismiss').popover({
            trigger: 'focus'
        })
    });

</script>

<nav class="navbar navbar-expand-md bg-primary navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="http://localhost/iAdopt/home"><img src="http://localhost/iAdopt/iAdopt_logo.png" style="width: 40%;"></a>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/iAdopt/chat.php"><i class="fa d-inline fa-lg fa-wechat"></i>Chat With Others</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/iAdopt/AddPetAdoption.php"><i class="fa d-inline fa-lg fa-github"></i>Add For Adoption</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/iAdopt/pets"><i class="fa d-inline fa-lg fa-eye"></i>Catalog</a>
                </li>
                <?php if( $_SESSION['usertype'] == '1'){
                    $pending_notifs =  curl_getAll("/db/pets?filter={'status':'pending'}");

                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/iAdopt/applications">
                            <i class="fa d-inline fa-lg fa-inbox">
                                <?php if(sizeOf($pending_notifs)!=0){ ?>
                                    <span class="badge badge-pill badge-info">
                        <?php echo sizeOf($pending_notifs);?>
                    </span>
                                <?php } ?>
                            </i>
                        </a>
                    </li>
                <?php }?>
            </ul>



            <a href="#" data-toggle="popover"
               data-img="http://localhost/iAdopt/<?php echo $_SESSION['photo_url']?>"
               data-content='
                   <div class="media">
                   <a href="http://localhost/iAdopt/profile/<?php echo $_SESSION['oid']?>" class="pull-left">
                       <img src="http://localhost/iAdopt/<?php echo $_SESSION['photo_url']?>" style="border-radius:5%; height: 100px;width: 100px" class="media-object" alt="Sample Image"></a>
                       <div class="media-body" style="margin-left: 20px">
                       <p class="text-muted"><?php echo $_SESSION['email']?>
                       </p>

                       <hr>

                            <form method="post" action="">
                            <button name="signout" type="submit" class="btn navbar-btn btn-primary ml-2 ">
                                Sign-out
                            </button>
                       </form>
                       </div>

                   </div>'
               data-html="true"
               data-placement="bottom"
               data-trigger="focus" title="<?php echo $_SESSION['name']?>">
                <button name="signout" type="button" class="btn navbar-btn btn-primary ml-2 text-white">
                    <img src="http://localhost/iAdopt/<?php echo $_SESSION['photo_url']?>" style="height: 40px; width: 40px; border-radius: 60%" />
                </button>
            </a>
        </div>
    </div>
</nav>