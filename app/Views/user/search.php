
<div class="container">

<form action="/home/search" method="POST" class="row w-100 p-5 search-content" style="margin-top:10px;">

        <div class="col-4">
          <select name="garDepart" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
            <option <?php if(empty($garDepartPost)){echo "selected";} ?> disabled>Gar depart</option>
            <option value="1" <?php if($garDepartPost==1){echo "selected";} ?> >Safi</option>
            <option value="6" <?php if($garDepartPost==6){echo "selected";} ?> >Souira</option>
            <option value="5" <?php if($garDepartPost==5){echo "selected";} ?> >Agadir</option>
          </select>
        </div>
    
        <div class="col-4">
          <select name="garArrive" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
            <option <?php if(empty($garArrivePost)){echo "selected";} ?> disabled>Gar depart</option>
            <option value="1" <?php if($garArrivePost==1){echo "selected";} ?> >Safi</option>
            <option value="6" <?php if($garArrivePost==6){echo "selected";} ?> >Souira</option>
            <option value="5" <?php if($garArrivePost==5){echo "selected";} ?> >Agadir</option>
          </select>
        </div>
        <div class="col-1"></div>
        <div class="col-3 mt-1">
            <button type="submit" class="btn btn-primary w-100" style="width:130px;">search <i class="fa-solid fa-magnifying-glass mx-2"></i></button>
        </div>

</form>

</div>








<div class="container-fluid px-5 categories">

    <!-- start error for search -->

            <?php  if(isset($error) && !empty($error)){ ?>

                <?php if(!strcmp($error,"gar depart et gar arrive sont obliger pour recherche")){ ?>

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $error; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                <?php  }elseif(!strcmp($error,"votre recherche n'exist pas")){   ?>

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $error; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                <?php  }  ?>


            <?php  } ?>

    <!-- end error for search -->


        <div class="row w-100">

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


                <?php  }}elseif(empty($error)){  ?>

                    <div class="row w-100">
                         <div class="col-12 text-center">
                         <img src="/assets/images/Search.svg" style="margin-top:-50px !important;" width="300" height="300" alt="">
                    </div>

                <?php  } ?>
                
        </div>


</div>

<br><br><br><br><br>








