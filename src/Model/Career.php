<?php
namespace Web\Model;

use Web\Database\Database;

class Career extends Database{

  public function getAllCareer(){
      $sql ="
      SELECT 
       career.id,
       career.title
   
      FROM 
        career
      ORDER BY
        career.id
        
      ";
      $state = $this->pdo->query($sql);
      $data = $state->fetchAll();
      return $data;
  }

}
?>