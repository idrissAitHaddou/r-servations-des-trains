<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/style/home.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cabin&family=Dancing+Script&family=Ubuntu+Mono&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/b6a6a301c2.js" crossorigin="anonymous"></script>
  <title>Trains</title>
</head>
<body>







<nav class="navbar navbar-expand-lg nav-user">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><h2>ONCF</h2></a>
    <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100 justify-content-center">
        <li class="nav-item mx-2">
          <a class="nav-link" aria-current="page" href="/home">Home</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link" href="/home/reservation">Reservation</a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link" href="/home/search">Recherche</a>
        </li>
      </ul>
      <div class="d-flex">

        <?php if(!isset($_SESSION["emailUser"]) && empty($_SESSION["emailUser"])){ ?>
            <button class="btn mx-3" style="white-space: nowrap !important;" data-bs-toggle="modal" data-bs-target="#ModalSignIn" data-bs-whatever="@mdo">Sign in</button>
            <button class="btn mx-3" style="white-space: nowrap !important;" data-bs-toggle="modal" data-bs-target="#ModalSignUp" data-bs-whatever="@mdo">Sign up</button>
        <?php } ?>

        <?php if(isset($_SESSION["emailUser"]) && !empty($_SESSION["emailUser"])){ ?>
            <div class="dropdown">
                <a href="#" class="dropdown-toggle nav-link dropdown-toggle user-action" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="/assets/images/admin.png" width="38" height="38" class="avatar" alt="Avatar"> <?php echo $_SESSION["emailUser"]; ?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <a href="/home/profile" class="dropdown-item"><i class="fa fa-user-o"></i> Profile</a></a>
                  <a href="/home/profile" class="dropdown-item"><i class="fa fa-sliders"></i> Settings</a></a>
                  <div class="dropdown-divider"></div>
                  <a href="/home/logout" class="dropdown-item"><i class="fa-solid fa-power-off"></i> Logout</a></a>
                </ul>
            </div>
        <?php } ?>

      </div>
    </div>
  </div>
</nav>



<!-- modal to sign in -->

<div class="modal fade" id="ModalSignIn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top:100px;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sign in</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="/home/login" method="POST">

            <div class="modal-body">

                  <div class="row">
                      <div class="col-12">
                          <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email">
                      </div>
                  </div>
                  <br>
                  <div class="row">
                      <div class="col-12">
                          <input type="password" name="pass" class="form-control" placeholder="Password" aria-label="Password">
                      </div>
                  </div>
                  <br>
                  

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
              <button type="submit" class="btn btn-primary">sign in</button>
            </div>

      </form>

    </div>
  </div>
</div>










<!-- modal to sign up -->

<div class="modal fade" id="ModalSignUp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top:100px;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sign up</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- start form -->
          <form action="/home/signUp" method="POST">

               <div class="modal-body">

                      <div class="row">
                          <div class="col-6">
                              <input type="text" name="nom" class="form-control" placeholder="Nom" aria-label="Nom">
                          </div>
                          <div class="col-6">
                              <input type="text" name="prenom" class="form-control" placeholder="Prenom" aria-label="Prenom">
                          </div>
                      </div>
                      <br>
                      <div class="row">
                          <div class="col-6">
                                <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email">
                            </div>
                            <div class="col-6">
                                <input type="password" name="pass" class="form-control" placeholder="Password" aria-label="Password">
                            </div>
                      </div>
                      <br>
                      <div class="row">
                              <div class="col-12">
                                  <input type="text" name="tel" class="form-control" placeholder="Tel" aria-label="Tel">
                              </div>
                      </div>
                      

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Sign up</button>
                  </div>

              </div>
          </form>
      <!-- end form -->
   
  </div>
</div>


  

