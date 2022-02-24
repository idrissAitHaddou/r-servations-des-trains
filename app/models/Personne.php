<?php


  class Personne extends DB {

      protected $table="users";

      protected $nom;
      protected $prenom;
      protected $email;
      protected $tel;
      
      public function __construct($nom="",$prenom="",$email="",$tel=""){
          $this->id_user=$nom;
          $this->date_depart=$prenom;
          $this->id_route=$email;
          $this->id_route=$tel;
      }

      public function recherche(){
         
      }


  }


?>