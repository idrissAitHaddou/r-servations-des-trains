

 <div class="main-title">
    <h5>Dashboard</h5>
    <span class="text-secondary"> <?php  echo date("Y-M-D h:i:sa");  ?> </span>
 </div>

 <div class="container main-slide">

    <div class="row main-slide-content">
        <div class="col-6">
            <h3>Dashboard statistiques</h3>
            <span>this is a dashboard page</span><br>
            <span>this is a dashboard page</span><br>
            <a href=<?php echo BURL.'admin/reservations' ?> ><button class="btn">All reservation</button></a>
        </div>
        <div class="col-6">
            <img src="assets/images/dash.svg" width="180" height="180" alt="">
        </div>
    </div>

 </div>


 <div class="container static-dash">
     <div class="row">

            <div class="col-6 border st-content">

                    <div class="main-title st-title">  <span>Reservation History</span>  <span> <?php echo date('Y'); ?> </span>  </div>

                    <div class="main-title static-value"> 
                        <span class="text-secondary">All reservation</span> 
                        <span class="badge rounded-pill bg-primary"> <?php echo $numRes; ?> </span>
                    </div>
                    
                    <div class="main-title static-value"> 
                            <span class="text-secondary">Les client</span> 
                            <span class="badge rounded-pill bg-warning"> <?php echo $numClient; ?> </span>
                    </div>

                    <div class="main-title static-value"> 
                            <span class="text-secondary">User</span> 
                            <span class="badge rounded-pill bg-success"> <?php echo $numUser; ?> </span>
                    </div>

                    <div class="main-title static-value"> 
                            <span class="text-secondary">Reservation aujourdhui</span> 
                            <span class="badge rounded-pill bg-danger"> <?php echo $numResToDay; ?> </span>
                    </div>

            </div>

            <div class="col-1"></div>

            <div class="col-5">
                <canvas id="resrvationSta" style="width:100% ; height:100% ;"></canvas>
            </div>

     </div>
 </div>










