<?php

  date_default_timezone_set("Africa/casablanca");

  class Contact extends DB{

      private $table="contact";

      private $id_user;
      private $date_depart;
      private $id_route;

      
      public function __construct($id_user="",$date_depart="",$id_route=""){
          $this->conn=$this->connect();
          $this->id_user=$id_user;
          $this->date_depart=$date_depart;
          $this->id_route=$id_route;
      }

      public function getAllContact($start,$nb){
        return $this->selectAll($this->table,$start,$nb);
      }

      public function getAllContactSearch($date){
        return $this->selectOne($this->table,"created_at",$date);
      }

      

      //   get number of reservation
      public function getNumContact(){
        return $this->getRowCount($this->table);
      }

      public function deleteContact($id){
          $this->delete($this->table,$id);
      }

      public function sendEmailRes($data){

        $to      = $data["email"];
        $subject = "le sujet";
        $message = "Bonjour !";
        $headers = "From: onsf@gmail.com". phpversion();
   
        mail($to, $subject, $message, $headers);

      }



  }


?>