<?php
namespace Web\Model;

use Web\Database\Database;

class Refers extends Database{

  public function getAllRefers(){
      $sql ="
      SELECT 
       refers.id,
       refers.title
   
      FROM 
      refers
      ORDER BY
      refers.id
        
      ";
      $state = $this->pdo->query($sql);
      $data = $state->fetchAll();
      return $data;
  }

}
?>