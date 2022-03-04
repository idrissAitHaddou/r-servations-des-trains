
    <div class="w-50" style="margin:auto;">
        
        <div class="container reserv-slide">

            <div class="row main-slide-content">
                <div class="col-6">
                    <h3>Reservation</h3>
                </div>
                <div class="col-6">
                    <img src="../assets/images/Reset password-bro.svg" width="80" height="80" alt="">
                </div>
            </div>

        </div>

        <br>

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


        <br>

        <?php if($responseSearch){ foreach($responseSearch as $res){ ?>

            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">your reservation</h4>
                <p>perix : <?php echo $res['prix']; ?>DH </p>
                <p>distance : <?php echo $res['distance']; ?>KM </p>
                <hr>
                <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                <br>
            </div>

        <?php  }}  ?>


            <form action="/home/reservation" method="POST" class="row w-100 p-5 search-content" style="margin-top:10px;border:none !important;">

                    <div class="row">
                            <div class="col-6">
                            <select name="garDepart" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <option <?php if(empty($garDepartPost)){echo "selected";} ?> disabled>Gar depart</option>
                                <option value="1" <?php if($garDepartPost==1){echo "selected";} ?> >Safi</option>
                                <option value="6" <?php if($garDepartPost==6){echo "selected";} ?> >Souira</option>
                                <option value="5" <?php if($garDepartPost==5){echo "selected";} ?> >Agadir</option>
                            </select>
                            </div>
                        
                            <div class="col-6">
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

                    <?php if($responseSearch){ foreach($responseSearch as $res){ ?>

                        <input type="date" name="getDate" class="form-control"> <br> 
                        
                    <?php  }}  ?>
                     
                </div>

                <div class="col-12">

                    <?php if(!isset($_SESSION["idUser"]) && empty($_SESSION["idUser"]) && !empty($_POST["garDepart"]) && !empty($_POST["garArrive"])){ ?>

                        <input type="email" name="email" placeholder="Email" class="form-control"> <br>
                        
                    <?php  }  ?>
                
                </div>

                <div class="col-12">

                    <?php if(!isset($_SESSION["idUser"]) && empty($_SESSION["idUser"]) && !empty($_POST["garDepart"]) && !empty($_POST["garArrive"])){  ?>

                        <input type="text" name="nom" placeholder="Nom" class="form-control"> <br>
                        
                    <?php  }  ?>
                
                </div>

                <div class="col-12">

                    <?php if(!isset($_SESSION["idUser"]) && empty($_SESSION["idUser"]) && !empty($_POST["garDepart"]) && !empty($_POST["garArrive"])){  ?>

                        <input type="text" name="prenom" placeholder="Prenom" class="form-control"> <br>
                        
                    <?php  }  ?>
                
                </div>

                <div class="col-12">
                <?php if(strcmp($errorDtae,"votre reservation est bien enregistrer")){ if($responseSearch){ ?>

                    <input type="submit" class="btn btn-success w-100" value="valider" >       

                <?php  }else{  ?>

                    <input type="submit" class="btn btn-primary w-100" value="Reservation" >                

                <?php }}  ?>
                </div>
            </div>

        </form>



    </div>