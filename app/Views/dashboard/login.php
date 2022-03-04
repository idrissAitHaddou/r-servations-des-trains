<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style/home.css">
    <script src="https://kit.fontawesome.com/b6a6a301c2.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Trains</title>
</head>
<body>

<!-- start error for search -->

<?php  if(isset($error) && !empty($error)){ ?>

<?php if(!strcmp($error,"Entrer votre les information")){ ?>

   <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <?php echo $error; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>

<?php  }elseif(!strcmp($error,"votre email ou mot de pass invalid")){   ?>

  <div class="alert alert-danger alert-dismissible fade show" role="alert">
     <?php echo $error; ?>
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>

<?php  }  ?>


<?php  } ?>

<!-- end error for search -->
    
    <div class="w-50 login-content">
        
        <div class="container reserv-slide">

            <div class="row main-slide-content">
                <div class="col-6">
                    <h3>Administrateur</h3>
                </div>
                <div class="col-6">
                    <img src="../assets/images/Reset password-bro.svg" width="80" height="80" alt="">
                </div>
            </div>

        </div>
        <br>


        <form action="/admin/login" method="POST">

          <br>
          <div class="row g-4">
             <div class="col-md-6">
                <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email">
             </div>
             <div class="col-md-6">
                <input type="text" name="pass" class="form-control" placeholder="Mot de pass" aria-label="Mot de pass">
             </div>
          </div>
          <br>
          <div class="row">
              <div class="col-12">
                <input type="submit" class="btn btn-primary w-100" value="Login" >
              </div>
           </div>
        </form>

    </div>


</body>
</html>