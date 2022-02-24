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

        $query=$this->connect()->prepare("SELECT T.time_depart , T.time_arrive
        FROM traintime T , route O  where T.id_route=O.id and O.id_depart=$idDepart and O.id_arrive=$idArrive");
        if($query->execute()){
        return $query->fetchAll();
        }else{
            return 0;
        }

    }



  }


?>