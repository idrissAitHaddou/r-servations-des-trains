<br>


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






<div class="container">


<div class="row w-100 g-5 align-items-start justify-content-center">
    <div class="col-md-4 border p-4 d-flex flex-column align-item-center justify-content-center">

            <div class="w-100 d-flex flex-column align-item-center justify-content-center">
                <img src="../assets/images/admin.png" class="mx-auto" width="120" height="120" alt="">
            </div>
            <div class="w-100 d-flex flex-column align-item-center justify-content-center">
                <span class="mx-auto mt-1 text-capitalize"> <?php echo $profile[0]["nom"]." ".$profile[0]["prenom"] ?> </span><br>
                <a href="/home/reservation" class="mx-auto"> <button class="btn btn-light border border-primary text-primary">reservation</button> </a> 
            </div>

    </div>

    <div class="col-md-4">
            <form action="/home/profile" method="POST" class="">
                <h5>Mes informations</h5>
                <div class="row g-2">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php echo $profile[0]["email"] ?>" >
                            <label for="floatingInput">Email address</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" name="pass" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php echo $profile[0]["pass"] ?>" >
                            <label for="floatingInput">Mot de pass</label>
                        </div>
                    </div>
                
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" name="nom" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php echo $profile[0]["nom"] ?>" >
                            <label for="floatingInput">Nom</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" name="prenom" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php echo $profile[0]["prenom"] ?>" >
                            <label for="floatingInput">Prenom</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating mb-3">
                            <input type="text" name="tel" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php echo $profile[0]["tel"] ?>" >
                            <label for="floatingInput">Tel</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                        <button type="submit" class="btn border border-primary btn_light text-primary w-100">update</button>
                        </div>
                    </div>
                </div>

            </form>
    </div>

    <div class="col-md-4">
        <h5>Mes reservations</h5>
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
        <tbody>

       <?php  foreach($profile as $res){ ?>

            <tr>
                <td class="ml-4 p-2 text-primary d-flex justify-content-between">
                       <span><?php echo $res[17] ?></span>
                          <i class="fa-solid fa-caravan"></i>
                       <span><?php echo $res[18]." (  ".$res['date_depart']." )" ?></span>
                </td>
                <td class="pl-3 border text-center">
                        <i class="fa-solid fa-eraser text-warning" data-bs-toggle="modal" data-bs-target="<?php echo "#ModalAnnuler".$res['res']; ?>"></i>
                        <!-- Modal to Annuler -->
                        <div class="modal fade mt-5" id="<?php echo "ModalAnnuler".$res['res'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Annuler la reservation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-warning">
                                    Est ce que vous voulez annuler cette reservation ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                    <a href= <?php echo "/home/annulerRUser/".$res['res']; ?> > <button type="button" class="btn btn-warning">Annuler</button> </a>
                                </div>
                                </div>
                            </div>
                        </div>
                </td>
            </tr>

        <?php } ?>

        </tbody>
      </table>
               
    </div>

</div>


</div>

<br><br>