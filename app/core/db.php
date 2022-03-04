<?php


 class DB{

      protected $db;


      // ----- function to insert

      public function connect(){
          try {
                  $conn = new PDO("mysql:host=localhost;dbname=gestion_train", USER, PASS);
                  // set the PDO error mode to exception
                  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  return $this->db=$conn;
              } catch(PDOException $e) {
                  echo "Connection failed: " . $e->getMessage();
              }

      }


      // ----- function to insert

      public function insert($table,$tableCln,$tableVal)
      {
        
          $columns="";
          $values="";
          $vrls="";
          for ($i=0; $i < count($tableCln) ; $i++) 
          { 

              if ($i>0) 
              {
                $vrls=",";
              }
              $columns.=$vrls."`".$tableCln[$i]."`";
              $values.=$vrls."'".$tableVal[$i]."'";
              
          }

          $sql="INSERT INTO `$table`(".$columns.") VALUES (".$values.")";
          $query=$this->conn->prepare($sql);

          if($query->execute()){
              return 1;
          }else{
              return 0;
          }

      }


      // ----- function to selectAll
      
      public function selectAll($table,$start,$nb)
      {

          $query=$this->connect()->prepare("SELECT * FROM `$table` order by id LIMIT $start,$nb");
          if($query->execute()){
            return $query->fetchAll(PDO::FETCH_ASSOC);
          }else{
              return 0;
          }
        
      }


      // ----- function to select One with condition
      
      public function selectOne($table,$col,$val)
      {

          $query=$this->connect()->prepare("SELECT * FROM `$table` where $col like '$val'");
          if($query->execute()){
            return $query->fetchAll();
          }else{
              return 0;
          }
        
      }

      // ----- function to select One with condition
      public function selectJustOne($table,$col,$val)
      {

          $query=$this->connect()->prepare("SELECT * FROM `$table` where $col[0]=$val[0]");
          if($query->execute()){
            return $query->fetch();
          }else{
              return 0;
          }
        
      }


      // ----- function to update
      
      public function update($table,$tableCln,$tableVal,$role,$idRole)
      {

          $columns="";
          $vrls="";
          for ($i=0; $i < count($tableCln) ; $i++) 
          { 

              if ($i>0) 
              {
                $vrls=",";
              }
              $columns.=$vrls."`".$tableCln[$i]."`='".$tableVal[$i]."'";

          }
          $sql="UPDATE $table SET $columns WHERE $role=$idRole";
          $query=$this->connect()->prepare($sql);
          if($query->execute()){
              return 1;
          }else{
              return 0;
          }
          

      }

      
      // ----- function to delete
      
      public function delete($table,$id)
      {

          $query=$this->conn->prepare("DELETE FROM `$table` WHERE id=$id");
          if($query->execute()){
              return 1;
          }else{
              return 0;
          }

      }


         
      // ----- function to get row count with condition
      
      public function getRowCountWithConditio($table,$col=[],$val=[])
      {

            $condition="";
            $vrls=" WHERE ";
            for ($i=0; $i < 1 ; $i++) 
            { 

                if ($i>0) 
                {
                  $vrls=" AND ";
                }
                $condition.=$vrls.$col[0]." like '$val[0]'";
                
            }
            $query=$this->connect()->prepare("SELECT * FROM `$table` $condition ");
            if($query->execute()){
              return $query->fetchAll();
            }else{
              return 0;
            }

      }


       // ----- function to get row count without condition
      
       public function getRowCount($table)
       {
       
           $query=$this->connect()->prepare("SELECT * FROM `$table`");
           if($query->execute()){
               return $query->rowCount();
           }else{
               return 0;
           }
 
       }





 }


?>