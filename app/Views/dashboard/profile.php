

<div class="container reserv-slide">

    <div class="row main-slide-content">
        <div class="col-md-6 col-sm-12">
            <span>this is a dashboard page</span><br>
            <a href=<?php echo BURL.'admin' ?> > <button class="btn">Dashboard</button>  </a>
        </div>
        <div class="col-md-6 col-sm-12">
            <img src="../assets/images/Admin-rafiki.svg" width="80" height="80" alt="" id="img-dash">
        </div>
    </div>

</div>
<br>


<!-- start error for search -->

    <?php  if(isset($error) && !empty($error)){ ?>

               <?php if(!strcmp($error,"Entrer tout les information")){ ?>

                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                     <?php echo $error; ?>
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>

              <?php  }else{   ?>

                 <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $error; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>

              <?php  }  ?>


    <?php  } ?>

<!-- end error for search -->



<form action="/admin/profile" method="POST">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php echo $profile["email"] ?>" >
                <label for="floatingInput">Email address</label>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="form-floating mb-3">
                <input type="text" name="pass" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php echo $profile["pass"] ?>" >
                <label for="floatingInput">Mot de pass</label>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="form-floating mb-3">
                <input type="text" name="nom" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php echo $profile["nom"] ?>" >
                <label for="floatingInput">Nom</label>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="form-floating mb-3">
                <input type="text" name="prenom" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php echo $profile["prenom"] ?>" >
                <label for="floatingInput">Prenom</label>
            </div>
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="form-floating mb-3">
                <input type="text" name="tel" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php echo $profile["tel"] ?>" >
                <label for="floatingInput">Tel</label>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="form-floating mb-3 h-100">
            <button type="submit" class="btn btn-primary w-100 mt-2">update</button>
            </div>
        </div>
    </div>


    <br>

</form>


