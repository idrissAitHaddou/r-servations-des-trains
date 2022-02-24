<?php


    class Client extends Personne {

        private $pass;
        
        public function __construct($pass=""){
            $this->pass=$pass;
        }

        //   get admin
        public function getAdmin(){
            return $this->selectJustOne($this->table,['role'],[1]);
        }
        //   update admin
        public function updateAdmin($email,$passW,$nom,$prenom,$tel){
            return $this->update($this->table,['email','pass','nom','prenom','tel'],[$email,$passW,$nom,$prenom,$tel],'role',1);
        }

        //   get number of Client
        public function getNumClient(){
            return $this->getRowCountWithConditio($this->table,['role'],[2]);
        }

        //   get number of Client static
        public function getClientStatic($mois){
            $mois>=10 ? $date_at="2022-$mois%" : $date_at="2022-0$mois%";
            return $this->getRowCountWithConditio($this->table,['create_at','role'],[$date_at,2]);
        }


         //  function to login of Client
         public function loginUser($email,$pass){

            $query=$this->connect()->prepare("SELECT * FROM `users` where email like '$email' and pass like '$pass' and role like 2 ");
            if($query->execute()){
              return $query->fetchAll();
            }else{
              return 0;
            }   

        }

         //  function to sign up of Client
         public function signUpUser($email,$pass,$nom,$prenom,$tel){
            
            $query=$this->connect()->prepare(" INSERT INTO `users`( `nom`, `prenom`, `email`, `pass`, `tel`, `role`) VALUES ('$nom','$prenom','$email','$pass','$tel',2) ");
            if($query->execute()){
              return 1;
            }else{
              return 0;
            } 

        }

    }


?>










