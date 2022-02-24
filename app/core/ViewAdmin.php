
<?php 


    class ViewAdmin{

        public function load($view_name,$view_data=[]){
            $file=VIEWS.'dashboard/'.$view_name.'.php';
            if(file_exists($file)){
                extract($view_data);
                ob_flush();
               
                 if(!isset($_SESSION["adminEmail"]) || empty($_SESSION["adminEmail"])){
                    require (VIEWS.'dashboard/login.php');
                  }else{
                    
                      if($view_name!="login"){
                         require ( VIEWS.'dashboard/'.'inc/p1Dashboard.php' );
                         require ($file);
                         require ( VIEWS.'dashboard/'.'inc/p2Dashboard.php' );
                      }else{
                         require ($file);
                      }
                  }





               
                ob_end_flush();
            }else{
                echo "does view ".$view_name." not exist";
            }
        }

    }



?>