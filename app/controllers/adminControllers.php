<?php

   session_start();

   class adminControllers{

         private $numberPages=5;


         public function index(){

            
             // get numbers of client :
             $cli = new Client();
             $data['numClient']=count($cli->getNumClient());
             //  get numbers of user :
             $user = new User();
             $data['numUser']=count($user->getNumUser());
            //  get numbers of reservation :
             $res = new Reservation();
             $data['numRes']=$res->getNumReservation();
              //  get numbers of reservation toDay :
              $res = new Reservation();
              $data['numResToDay']=count($res->getAllReservationToDay());

            
             ViewAdmin::load('main',$data);
            
         }


         // Function to logout 
         public function logout(){
           session_destroy();
           header("location:/admin/login");
         }


         // Function for login 
         public function login(){

            $admObject = new Client();
            $data=[];
            $data["error"]="";
            if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST["email"])){

               if(empty($_POST["email"]) || empty($_POST["pass"])){
                     $data["error"]="Entrer votre les information";
               }else{
                     $data["email"]=$_POST["email"];
                     $data["pass"]=$_POST["pass"];
                     $admin=$admObject->getAdmin('role',1);
                     if($admin["email"]==$data["email"] && $admin["pass"]==$data["pass"]){
                       $_SESSION["adminEmail"]=$data["email"];
                       header("location:/admin");
                       die();
                     }else{
                        $data["error"]="votre email ou mot de pass invalid";
                     }
               }

               ViewAdmin::load('login',$data);
                  
            }else{
                ViewAdmin::load('login');
            }
            
         }


         // Function of contact
         public function contact($page=1){

                  //  get all reservation :
                  $res = new Contact();

                  if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST["dateSearch"])){
                        $date = $_POST["dateSearch"];
                        
                        $data['contact']=$res->getAllContactSearch($date);

                        count($data['contact']) >0 ? $data["error"]="" : $data["error"]="votre recherche n'exist pas" ;
                        ViewAdmin::load('contact',$data);

                  }else{
                     
                        $rowsRes=$res->getNumContact();
                        $data["numbRows"]=ceil($rowsRes/$this->numberPages);
                        $startPosition=($page-1)*$this->numberPages;
                        $data['contact']=$res->getAllContact($startPosition,$this->numberPages);
                        ViewAdmin::load('contact',$data);
                  }


         }



         public function reservations($page=1){

                  $res = new Reservation();

                  if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST["dateSearch"])){
                     $date = $_POST["dateSearch"];
                     
                     $data['reservations']=$res->getAllReservationSearch($date);
                     $data['garArrive']=$res->getGarArriveReservationSearch($date);

                     count($data['reservations']) >0 ? $data["error"]="" : $data["error"]="votre recherche n'exist pas" ;
                     ViewAdmin::load('reservations',$data);
                  }else{
                     
                        $rowsRes=$res->getNumReservation();
                        $data["numbRows"]=ceil($rowsRes/$this->numberPages);
                        $startPosition=($page-1)*$this->numberPages;

                        // get all reservation 
                        $data['reservations']=$res->getAllReservation($startPosition,$this->numberPages);
                        $data['garArrive']=$res->getGarArriveReservation($startPosition,$this->numberPages);
                        ViewAdmin::load('reservations',$data);
                  }
               
            
         }




         public function statistiques(){

            ViewAdmin::load('statistiques');
            
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
                        $cli->updateAdmin($_POST["email"],$_POST["pass"],$_POST["nom"],$_POST["prenom"],$_POST["tel"],'role',1);
                     }

                     $data['profile']=$cli->getAdmin('role',1);
                     ViewAdmin::load('profile',$data);

               }else{
                  
                     $data['profile']=$cli->getAdmin('role',1);
                     ViewAdmin::load('profile',$data);
               }
            
            
         }

         

         public function deleteR($id){

            $res = new Reservation();
            $res->deleteReservation($id);
            header("location:/admin/reservations");
            
         }

         public function deleteC($id){

            $res = new Contact();
            $res->deleteContact($id);
            header("location:/admin/contact");
            
         }

         public function annulerR($id){

            $res = new Reservation();
            $res->annulerReservation($id);
            header("location:/admin/reservations");
            
         }

         public function sendEmail(){

               $res = new Reservation();
               $data["email"]=$_POST["email"];
               $data["object"]=$_POST["ojbect"];   
               $data["message"]=$_POST["message"];
               $res->sendEmailRes($data);
               header("location:/admin/reservations");
            
         }

         public function rependreEmail(){

            $res = new Reservation();
            $data["email"]=$_POST["email"];
            $data["object"]=$_POST["ojbect"];   
            $data["message"]=$_POST["message"];
            $res->sendEmailRes($data);
            header("location:/admin/contact");
         
         }






// ***************************** API ********************************************************


         public function getReservationStatic(){

            $data=[];
            $res = new Reservation();
            for($i=1 ; $i<=12 ; $i++){
               $data[]=count($res->getReservationStatic($i));
            }
           
            echo json_encode($data);
            
         }

         public function getClientSta(){

            $data=[];
            $cli = new Client();
            for($i=1 ; $i<=12 ; $i++){
               $data[]=count($cli->getClientStatic($i));
            }
           
            echo json_encode($data);
            
         }


         
   }

?>