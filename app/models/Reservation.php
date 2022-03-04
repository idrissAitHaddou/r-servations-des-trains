<?php

  date_default_timezone_set("Africa/casablanca");

  class Reservation extends DB{

      private $table="reservation";

      private $id_user;
      private $date_depart;
      private $id_route;

      
      public function __construct($id_user="",$date_depart="",$id_route=""){
          $this->conn=$this->connect();
          $this->id_user=$id_user;
          $this->date_depart=$date_depart;
          $this->id_route=$id_route;
      }

       //   get number of reservation
       public function getAllReservation($start,$nb){

            $query=$this->connect()->prepare("SELECT R.id as id , R.state as state , u.email as email,R.date_depart as date_depart,g.nom as nomG
            FROM reservation R, route O, users u,gar g  where R.id_route=O.id and R.id_user=u.id and O.id_depart=g.id order by R.id LIMIT $start,$nb");
            if($query->execute()){
            return $query->fetchAll();
            }else{
                return 0;
            }

       }

       //    ***************** START FUNCTIONS TO SEARCH *************************
       //   get reservation search
        public function getAllReservationSearch($date){

            $query=$this->connect()->prepare("SELECT R.id as id , R.state as state , u.email as email,R.date_depart as date_depart,g.nom as nomG
            FROM reservation R, route O, users u,gar g  where R.id_route=O.id and R.id_user=u.id and O.id_depart=g.id and R.created_at like '$date%'");
            if($query->execute()){
               return $query->fetchAll();
            }else{
                return 0;
            }

       }

        //   get  reservation  serach with gar arrive
          public function getGarArriveReservationSearch($date){

                $query=$this->connect()->prepare("SELECT g.nom as nomArrive
                FROM reservation R, route O,gar g  where R.id_route=O.id and O.id_arrive=g.id and R.created_at like '$date%'");
                if($query->execute()){
                return $query->fetchAll();
                }else{
                    return 0;
                }
    
          }

       

    //    ***************** END FUNCTIONS TO SEARCH *************************


       public function getGarArriveReservation(){

        $query=$this->connect()->prepare("SELECT g.nom as nomArrive
        FROM reservation R, route O,gar g  where R.id_route=O.id and O.id_arrive=g.id");
        if($query->execute()){
        return $query->fetchAll();
        }else{
            return 0;
        }

      }



      //   get number of reservation
      public function getNumReservation(){
          return $this->getRowCount($this->table);
      }

      //   get number of reservation today
      public function getAllReservationToDay(){
          $date_at=date('Y-m-d %');
          return $this->getRowCountWithConditio($this->table,["created_at"],[$date_at]);
      }

      // get number of reservation static
      public function getReservationStatic($mois){
         $mois>=10 ? $date_at="2022-$mois%" :  $date_at="2022-0$mois%";
         return $this->getRowCountWithConditio($this->table,["created_at"],[$date_at]);
      }

      public function deleteReservation($id){
          $this->delete($this->table,$id);
      }


      public function annulerReservation($id){
        $this->update($this->table,['state'],['annuler'],$id);
      }

      public function sendEmailRes($data){

        $to      = $data["email"];
        $subject = "le sujet";
        $message = "Bonjour !";
        $headers = "From: onsf@gmail.com". phpversion();
   
        mail($to, $subject, $message, $headers);

      }



    //   function to search

    public function searchRES($idDepart,$idArrive){

        $query=$this->connect()->prepare("SELECT T.time_depart , T.time_arrive , O.prix as prix , O.distance as distance
        FROM traintime T , route O  where T.id_route=O.id and O.id_depart=$idDepart and O.id_arrive=$idArrive");
        if($query->execute()){
        return $query->fetchAll();
        }else{
            return 0;
        }

    }


    //   function to get Route

    public function getRoute($idDepart,$idArrive){

        $query=$this->connect()->prepare("SELECT id FROM route where id_depart like $idDepart  and id_arrive like $idArrive ");
        if($query->execute()){
            return $query->fetch();
        }else{
            return 0;
        }

    }

    //   function to add reservation

    public function addReservation($date_depart,$idUser,$route){

        $this->insert($this->table,['date_depart','id_user','id_route'],[$date_depart,$idUser,$route]);

    }

        //   function to add user

        public function addUser($nom,$prenom,$email){

            $this->insert("users",['nom','prenom','email'],[$nom,$prenom,$email]);
    
        }

         //   function to get last user

         public function getLastUser(){

            $query=$this->connect()->prepare("SELECT id FROM users order by id desc LIMIT 0,1");
            if($query->execute()){
                return $query->fetch();
            }else{
                return 0;
            } 
    
        }



  }


?>