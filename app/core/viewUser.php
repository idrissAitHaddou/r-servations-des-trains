
<?php 


class ViewUser{

    public function load($view_name,$view_data=[]){
        $file=VIEWS.'user/'.$view_name.'.php';
        if(file_exists($file)){
            extract($view_data);
            ob_flush();
            require (VIEWS.'user/inc/header.php');
            require ($file);
            require (VIEWS.'user/inc/footer.php');
            ob_end_flush();
        }else{
            echo "does view ".$view_name." not exist";
        }
    }

}



?>