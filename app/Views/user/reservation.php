<!-- start error for search -->

<?php  if(isset($errorDtae) && !empty($errorDtae)){ ?>

<?php  if(!strcmp($errorDtae,"Tout les information sont obliger pour reservation")){ ?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?php  echo $errorDtae; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php  }elseif(!strcmp($errorDtae,"votre reservation est bien enregistrer")){  ?>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php  echo $errorDtae; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php }} ?>

<!-- end error for search -->

<?php if($responseSearch){ foreach($responseSearch as $res){ ?>

<div class="container">
    <div class="row mx-auto align-items-center justify-content-center">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">your reservation</h4>
            <p>perix : <?php echo $res['prix']; ?>DH </p>
            <p>distance : <?php echo $res['distance']; ?>KM </p>
            <hr>
            <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
            <br>
        </div>
    </div>
</div>

<?php  }}  ?>




<div class="container mb-5">
    <div class="row w-100 mt-5 d-flex align-items-center justify-content-center">
        
        <div class="col-md-4 h-100 d-flex align-items-start justify-content-center mt-4 text-center">
                <img src="../assets/images/Reset password-bro.svg" width="220" height="220" alt="">
        </div>





        <form action="/home/reservation" method="POST" class="col-md-8 p-4 border border-info border-end-0 border-top-0 border-bottom-0">

                    <div class="row g-3">
                            <div class="col-md-6">
                            <select name="garDepart" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <option <?php if(empty($garDepartPost)){echo "selected";} ?> disabled>Gar depart</option>
                                <option value="1" <?php if($garDepartPost==1){echo "selected";} ?> >Safi</option>
                                <option value="6" <?php if($garDepartPost==6){echo "selected";} ?> >Souira</option>
                                <option value="5" <?php if($garDepartPost==5){echo "selected";} ?> >Agadir</option>
                            </select>
                            </div>
                        
                            <div class="col-md-6">
                            <select name="garArrive" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <option <?php if(empty($garArrivePost)){echo "selected";} ?> disabled>Gar depart</option>
                                <option value="1" <?php if($garArrivePost==1){echo "selected";} ?> >Safi</option>
                                <option value="6" <?php if($garArrivePost==6){echo "selected";} ?> >Souira</option>
                                <option value="5" <?php if($garArrivePost==5){echo "selected";} ?> >Agadir</option>
                            </select>
                            </div>
                    </div>



            <br>

            <div class="row">

            <?php if($responseSearch){ foreach($responseSearch as $res){ ?>

                    <div class="col-6">
                        <div class="input-group mb-3 w-100 justify-content-center">
                                <button type="button" class="btn btn-primary"> <?php echo $res[0]; ?> </button>
                                <div class="input-group-text">
                                    <button class="btn btn-light">Time depart</button>
                                </div>
                        </div>
                    </div>


                    <div class="col-6">
                        <div class="input-group mb-3 w-100 justify-content-center">
                                <button type="button" class="btn btn-success"> <?php echo $res[1]; ?> </button>
                                <div class="input-group-text">
                                    <button class="btn btn-light">Time arrive</button>
                                </div>
                        </div>
                    </div>

            <?php  }}  ?>
                
            </div>


            <br><br>

            <div class="row">
                <div class="col-12">

                    <?php if($responseSearch && $numberplaces['ressum']<4){ foreach($responseSearch as $res){ ?>

                        <input type="date" name="getDate" class="form-control"> <br> 
                        
                    <?php  }}  ?>
                     
                </div>

                <div class="col-12">

                    <?php if(!isset($_SESSION["idUser"]) && empty($_SESSION["idUser"]) && !empty($_POST["garDepart"]) && !empty($_POST["garArrive"]) && $numberplaces['ressum']<4){ ?>

                        <input type="email" name="email" placeholder="Email" class="form-control"> <br>
                        
                    <?php  }  ?>
                
                </div>

                <div class="col-12">

                    <?php if(!isset($_SESSION["idUser"]) && empty($_SESSION["idUser"]) && !empty($_POST["garDepart"]) && !empty($_POST["garArrive"]) && $numberplaces['ressum']<4){  ?>

                        <input type="text" name="nom" placeholder="Nom" class="form-control"> <br>
                        
                    <?php  }  ?>
                
                </div>

                <div class="col-12">

                    <?php if(!isset($_SESSION["idUser"]) && empty($_SESSION["idUser"]) && !empty($_POST["garDepart"]) && !empty($_POST["garArrive"]) && $numberplaces['ressum']<4){  ?>

                        <input type="text" name="prenom" placeholder="Prenom" class="form-control"> <br>
                        
                    <?php  }  ?>
                
                </div>

                <div class="col-12">
                <?php if(strcmp($errorDtae,"votre reservation est bien enregistrer") && $numberplaces['ressum']<4){ if($responseSearch){ ?>

                    <input type="submit" class="btn btn-success w-100" value="valider" >       

                <?php  }elseif($numberplaces['ressum']<4){  ?>

                    <input type="submit" class="btn border-primary text-primary w-100" value="Reservation" >                

                <?php }}  ?>

                <?php  if($numberplaces['ressum']>=4){ ?>
                    <p>le nombre de places est plien</p>
                <?php }  ?>

                </div>
            </div>

        </form>



    </div>
</div>