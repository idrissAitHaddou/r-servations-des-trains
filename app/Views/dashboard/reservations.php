


 <div class="container reserv-slide">

    <div class="row main-slide-content">
        <div class="col-6">
            <span>this is a dashboard page</span><br>
            <a href=<?php echo BURL.'admin' ?> id="hide"> <button class="btn">Dashboard</button>  </a>
        </div>
        <div class="col-6">
            <img src="../assets/images/dash.svg" width="80" height="80" alt="">
        </div>
    </div>

</div>


<!-- warning for traitment on mobile -->
<div class="container" id="attention-mobile">
  <div class="d-flex align-items justify-content-center">
    <h class="text-center text-warning fw-bold">
      Tous les traitement sont possible jute en Desktop
    </h>
  </div>
</div>




<br>
<table class="table caption-top" id="hide">


      <!-- start error for search -->

      <?php  if(isset($error[0]) && !empty($error[0])){ ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Resultes!</strong> <?php echo $error; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php  } ?>

      <!-- end error for search -->

      <div class="container" id="hide">
            <div class="row">
                    <div class="col-7">
                      <span>Les reservation</span>
                    </div>
                    <div class="col-5">
                         <form action="/admin/reservations" method="post" class="w-100">
                            <div class="input-group mb-3">
                              <input type="date" name="dateSearch" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                              <button class="btn btn-outline-secondary" type="submit" id="button-addon2"> <i class="fa-solid fa-magnifying-glass"></i> </button>
                            </div>
                         </form> 
                    </div>
            </div>
      </div>
      <caption></caption> 

      <thead>
        <tr class="text-center">
          <th scope="col">Email</th>
          <th scope="col">Date depart</th>
          <th scope="col">Gar depart</th>
          <th scope="col">Gar arrivé</th>
          <th scope="col">Status</th>
          <th colspan="3" scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>

                <?php 

                  $vali=0;
                  foreach($reservations as $res){ 

                ?>

                <tr class="text-center">
                  <td> <?php echo $res['email']; ?> </th>
                  <td> <?php echo $res['created_at']; ?> </td>
                  <td> <?php echo $res['nomG']; ?> </td>
                  <td> <?php echo $garArrive[$vali]['nomArrive']; $vali++ ; ?> </td>
                  <td> <?php echo $res['state'];?> </td>

                  <td>

                    <i class="fa-solid fa-trash-can text-danger" data-bs-toggle="modal" data-bs-target="<?php echo "#ModalDelete".$res["id"] ?>" ></i>
                    
                    <!-- Modal to delete -->
                    <div class="modal fade" id="<?php echo "ModalDelete".$res["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Supprision</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body text-danger">
                            est ce que vous voulez supprimer cette reservation on base donnée ?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <a href= <?php echo "/admin/deleteR/".$res['id']; ?> >  <button type="button" class="btn btn-danger">Supprimer</button> </a>
                          </div>
                        </div>
                      </div>
                    </div>

                  </td>
                  <td>

                    <i class="fa-solid fa-eraser text-warning" data-bs-toggle="modal" data-bs-target="<?php echo "#ModalAnnuler".$res["id"] ?>"></i>
                    
                    <!-- Modal to Annuler -->
                    <div class="modal fade" id="<?php echo "ModalAnnuler".$res["id"] ?>"> tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Annuler la reservation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body text-warning">
                            est ce que vous voulez annuler cette reservation on base donnée ?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <a href= <?php echo "/admin/annulerR/".$res['id']; ?> > <button type="button" class="btn btn-warning">Annuler</button> </a>
                          </div>
                        </div>
                      </div>
                    </div>

                  </td>
                  <td>

                    <i class="fa-solid fa-paper-plane text-success" data-bs-toggle="modal" data-bs-target="<?php echo "#ModalSend".$res["id"] ?>" ></i>
                    
                    <!-- Modal to send message -->
                    <div class="modal fade" id="<?php echo "ModalSend".$res["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Send message</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>

                          <form action="/admin/sendEmail" method="post">

                              <div class="modal-body">

                                    <div class="mb-3">
                                      <label for="exampleFormControlInput1" class="form-label w-100 text-start">Email</label>
                                      <input type="email" required class="form-control" name="email" id="exampleFormControlInput1" placeholder="Email" value=" <?php echo $res["email"]; ?> ">
                                    </div>
                                    <div class="mb-3">
                                      <label for="exampleFormControlInput1" class="form-label w-100 text-start">Objet</label>
                                      <input type="text" required class="form-control" name="ojbect" id="exampleFormControlInput1" placeholder="Opjet">
                                    </div>
                                    <div class="mb-3">
                                      <label for="exampleFormControlTextarea1" class="form-label w-100 text-start">Message</label>
                                      <textarea class="form-control" required name="message" id="exampleFormControlTextarea1" placeholder="Message" rows="3"></textarea>
                                    </div>
                             

                            
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <input type="submit" class="btn btn-success" value="Send">
                              </div>

                          </form>


                        </div>
                      </div>
                    </div>







                  </td>
                </tr>

            <?php } ?>

      </tbody>
</table>


<!-- start pagination -->

<nav aria-label="Page navigation example" id="hide" style="margin:auto;width:200px">
  <ul class="pagination">
      <!-- <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li> -->

      <?php if(isset($numbRows)){ for($i=0 ; $i<$numbRows ; $i++){ ?>
         <li class="page-item"><a class="page-link" href="/admin/reservations/<?php echo $i+1; ?>"> <?php echo $i+1; ?> </a></li>
      <?php }} ?>

      <!-- <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li> -->
  </ul>
</nav>





