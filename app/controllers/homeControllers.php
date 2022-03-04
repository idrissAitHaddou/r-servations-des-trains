<?php

    session_start();

   class homeControllers{

      public function index(){

         ViewUser::load('home');
         
      }

      public function logout(){

         session_destroy();
         header("location:/home");
         
      }


      // function to sign up

      public function signUp(){

         $cli = new Client();
         $data=[];
         $data["error"]="";
         if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(empty($_POST["email"]) || empty($_POST["pass"]) || empty($_POST["nom"]) || empty($_POST["prenom"]) || empty($_POST["tel"])){
                  $data["error"]="Entrer votre information";
            }else{
               $isInsert=$cli->signUpUser($_POST["email"] , $_POST["pass"] , $_POST["nom"] , $_POST["prenom"] , $_POST["tel"]);
               if($isInsert==1){
                  $data["error"]="Votre information est bien enregistrer , Bienvenu";
               }else{
                  $data["error"]="Votre information n'est pas bien enregistrer";
               }
                
                
            }
         }


         if(!empty($data["error"])){ 

               if(!strcmp($data["error"],"Entrer votre information")){ 

                  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">';
                           echo $data["error"]; 
                           echo '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';

               }elseif(!strcmp($data["error"],"Votre information n'est pas bien enregistrer")){   

                  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                           echo $data["error"]; 
                           echo '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';

               }elseif(!strcmp($data["error"],"Votre information est bien enregistrer , Bienvenu")){

                  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                           echo $data["error"]; 
                           echo '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';

               }  


           } 

          ViewUser::load('home');
         
      }





      // function to login 

      public function login(){

         $cli = new Client();
         $data=[];
         $data["error"]="";
         if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(empty($_POST["email"]) || empty($_POST["pass"])){
                  $data["error"]="Entrer votre information";
            }else{
               $data["ourUser"]=$cli->loginUser($_POST["email"],$_POST["pass"]);
               if(count($data["ourUser"]) >0){
                  $data["error"]="merci pour votre authentification";

                  $_SESSION["emailUser"]=$data["ourUser"][0]["email"];
                  $_SESSION["idUser"]=$data["ourUser"][0]["id"];
                  
               }else{
                  $data["error"]="votre email ou mote de pass invalid";
               }
                
                
            }
         }


         if(!empty($data["error"])){ 

               if(!strcmp($data["error"],"Entrer votre information")){ 

                  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">';
                           echo $data["error"]; 
                           echo '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';

               }elseif(!strcmp($data["error"],"votre email ou mote de pass invalid")){   

                  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                           echo $data["error"]; 
                           echo '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';

               }elseif(!strcmp($data["error"],"merci pour votre authentification")){

                  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                           echo $data["error"]; 
                           echo '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';

               }  


           } 

          ViewUser::load('home');
         
      }

      public function reservation(){

               $res = new Reservation();
               $data=[];
               $data["errorDtae"]="";
               $data["responseSearch"]="";
               $data["garDepartPost"]="";
               $data["garArrivePost"]="";
               if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST["garDepart"])){

                  if(!empty($_POST["garDepart"]) && !empty($_POST["garArrive"]))
                  {

                        $data["garDepartPost"]=$_POST["garDepart"];
                        $data["garArrivePost"]=$_POST["garArrive"];
                        $data["responseSearch"]=$res->searchRES($_POST["garDepart"],$_POST["garArrive"]);
                        count($data['responseSearch']) >0 ? $data["error"]="" : $data["error"]="votre recherche n'exist pas" ;

                  }

                  if(!isset($_SESSION["idUser"]) && empty($_SESSION["idUser"])){
                      if(empty($_POST["email"]) || empty($_POST["nom"]) || empty($_POST["prenom"]) || empty($_POST["getDate"]) || empty($_POST["garArrive"]) || empty($_POST["garDepart"]) ){
                              $data["errorDtae"]="Tout les information sont obliger pour reservation";
                      }else{

                                 // for user
                                 $Rout=$res->getRoute($_POST["garDepart"],$_POST["garArrive"]);

                                 $userAdded=$res->addUser($_POST["nom"],$_POST["prenom"],$_POST["email"]);
                                 $lastUser=$res->getLastUser();
                                 
                                 $res->addReservation($_POST["getDate"],$lastUser[0],$Rout[0]);

                                 $data["errorDtae"]="votre reservation est bien enregistrer";

                      }
                  }else{

                     // for client
                     if(empty($_POST["getDate"]) || empty($_POST["garDepart"]) || empty($_POST["garArrive"]))
                     {
                        $data["errorDtae"]="Tout les information sont obliger pour reservation";
                     }else{

                           $Rout=$res->getRoute($_POST["garDepart"],$_POST["garArrive"]);
                           $res->addReservation($_POST["getDate"],$_SESSION["idUser"],$Rout[0]);
                           $data["errorDtae"]="votre reservation est bien enregistrer";

                     }

                  }
                  
                  

               }

               ViewUser::load('reservation',$data);
         
      }

      public function search(){

         $res = new Reservation();
         $data=[];
         $data["error"]="";
         $data["responseSearch"]="";
         $data["garDepartPost"]="";
         $data["garArrivePost"]="";
         if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST["garDepart"])){

             if(empty($_POST["garDepart"]) || empty($_POST["garArrive"])){

                   $data["error"]="gar depart et gar arrive sont obliger pour recherche";

             }else{

                   $data["garDepartPost"]=$_POST["garDepart"];
                   $data["garArrivePost"]=$_POST["garArrive"];
                   $data["responseSearch"]=$res->searchRES($_POST["garDepart"],$_POST["garArrive"]);
                   count($data['responseSearch']) >0 ? $data["error"]="" : $data["error"]="votre recherche n'exist pas" ;

             }
             

         }

         ViewUser::load('search',$data);
         
      }

      public function profile(){

         

            //  get all contactes 
            $cli = new Client();

            if($_SERVER["REQUEST_METHOD"]=="POST"){

                  $data=[];
                  if(empty($_POST["email"]) || empty($_POST["pass"]) || empty($_POST["nom"]) || empty($_POST["prenom"]) || empty($_POST["tel"]))
                  {
                     $data["error"]="Entrer tout les information" ;
                  }else
                  {
                     $data["error"]="Votre information est bien enregistrer";
                     $cli->updateAdmin($_POST["email"],$_POST["pass"],$_POST["nom"],$_POST["prenom"],$_POST["tel"],'id',$_SESSION["idUser"]);
                  }

                  $data['profile']=$cli->getAdmin('id',$_SESSION["idUser"]);
                  ViewUser::load('profile',$data);

            }else{
               
                  $data['profile']=$cli->getAdmin('id',$_SESSION["idUser"]);
                  ViewUser::load('profile',$data);
            }
                     
         
      }

      


   }

?>