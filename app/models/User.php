<?php


  class User extends Personne {


      public function getNumUser(){
          return $this->getRowCountWithConditio($this->table,['role'],[3]);
      }


  }


?>