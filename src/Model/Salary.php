<?php
namespace Web\Model;

use Web\Database\Database;

class Salary extends Database{

  public function getAllSalary(){
      $sql ="
      SELECT 
       salary.id,
       salary.salary
   
      FROM 
      salary
      ORDER BY
      salary.salary
        
      ";
      $state = $this->pdo->query($sql);
      $data = $state->fetchAll();
      return $data;
  }

}
?>