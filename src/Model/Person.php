<?php
namespace Web\Model;

use Web\Database\Database;

class Person extends Database{

  public function getAllPersons($filters) {
      $where="";
      if($filters['name']) {
        $where .="AND (persons.firstname LIKE :name OR persons.lastname LIKE :name)";
        $filters['name']="%{$filters['name']}%";
      }else{
        unset($filters['name']);
      }
      if($filters['gender_id']) {
        $where .="AND persons.gender_id = :gender_id ";
      }else{
        unset($filters['gender_id']);
      }
      if($filters['career_id']) {
        $where .="AND persons.career_id = :career_id";
      }else{
        unset($filters['career_id']);
      }
      $sql ="
      SELECT 
       persons.user_id,
       persons.firstname,
       persons.lastname,
       persons.dob,
       persons.avatar,
       refers.title AS gender,
       career.title AS career,
       salary.salary AS salary
      FROM 
        persons 
        LEFT JOIN refers ON persons.gender_id = refers.id
        LEFT JOIN career ON persons.career_id = career.id
        LEFT JOIN salary ON persons.salary_id = salary.id
      WHERE
      persons.user_id > 0
      {$where}

      ORDER BY
       persons.user_id
      ";
      $state = $this->pdo->prepare($sql);
      $state->execute($filters);
      $data = $state->fetchAll();
      return $data;
  }
  public function getPersons() {
    $sql ="
    SELECT 
     persons.user_id,
     persons.firstname,
     persons.lastname
    FROM 
      persons
      INNER JOIN users ON persons.user_id = users.user_id AND users.role = 'employee'
    WHERE
      persons.user_id > 0
    ORDER BY
      persons.user_id
    ";
    $state = $this->pdo->query($sql);
    $data = $state->fetchAll();
    return $data;
}
  public function addPerson($person){
    $sql="
    INSERT INTO persons (
        firstname,
        lastname,
        dob,
        gender_id,
        career_id,
        salary_id,
        avatar
        ) VALUES (
            :firstname,
            :lastname,
            :dob,
            :gender_id,
            :career_id,
            :salary_id,
            :avatar
            )
    ";
    $state = $this->pdo->prepare($sql);
    $state->bindValue( ":firstname", $person['firstname']);
    $state->bindValue( ":lastname", $person['lastname']);
    $state->bindValue( ":dob", $person['dob']);
    $state->bindValue( ":gender_id", $person['gender_id']);
    $state->bindValue( ":career_id", $person['career_id']);
    $state->bindValue( ":salary_id", $person['salary_id']);
    $state->bindValue( ":avatar", $person['avatar']);
    $state->execute();//[$person]
   
    return $this->pdo->lastInsertId();
  }
  public function deletePerson($user_id){
      $sql = "
      DELETE FROM persons WHERE user_id = ?
      ";
      $state = $this->pdo->prepare($sql);
      $state->bindValue( ":user_id", $user_id);
      $state->execute([$user_id]);
      return true;
  }


  public function getPersonById($id){
    $sql ="
    SELECT 
     persons.user_id,
     persons.firstname,
     persons.lastname,
     persons.dob,
     persons.gender_id,
     persons.avatar,
     persons.career_id,
     persons.salary_id
      
    FROM 
      persons
    WHERE 
      persons.user_id = ?
    ";
    
    $state = $this->pdo->prepare($sql);
    $state->execute([$id]);
    $data = $state->fetchAll();
    return $data[0];
  }


  public function updatePerson($person){
   echo $person['firstname']." 1 ";
   echo $person['lastname']." 2 ";
   echo $person['dob']." 3 ";
   echo $person['gender_id']." 4 ";
   echo $person['career_id']." 5 ";
   echo $person['salary_id']." 6 ";
   echo $person['avatar']." 7 ";
   echo $person['action']." 8 ";
   echo $person['user_id']." 9 ";
   
    $sql="
    UPDATE persons SET 
        firstname = :firstname,
        lastname = :lastname,
        dob = :dob,
        gender_id = :gender_id,
        career_id = :career_id,
        salary_id = :salary_id,
        avatar = :avatar
    WHERE user_id = :user_id
    ";
    $state = $this->pdo->prepare($sql);
    $state->bindValue( ':firstname', $person['firstname']);
    $state->bindValue( ':lastname', $person['lastname']);
    $state->bindValue( ':dob', $person['dob']);
    $state->bindValue( ':gender_id', $person['gender_id']);
    $state->bindValue( ':career_id', $person['career_id']);
    $state->bindValue( ':salary_id', $person['salary_id']);
    $state->bindValue( ':avatar', $person['avatar']);
    $state->bindValue( ':user_id', $person['id']);
    $state->execute();
    return true;
  }
  public function fetchATDAllUser($filters){
    $where="";
    if($filters['name']) {
      $where .="AND (persons.firstname LIKE :name OR persons.lastname LIKE :name)";
      $filters['name']="%{$filters['name']}%";
    }else{
      unset($filters['name']);
    }
    if($filters['user_id']) {
      $where .="AND (persons.user_id = :user_id)";
    }else{
      unset($filters['user_id']);
    }
    if($filters['gender_id']) {
      $where .="AND persons.gender_id = :gender_id ";
    }else{
      unset($filters['gender_id']);
    }
    if($filters['career_id']) {
      $where .="AND persons.career_id = :career_id";
    }else{
      unset($filters['career_id']);
    }
    $sql ="
    SELECT 
       attendance.user_id,
       attendance.day,
       attendance.title,
       persons.firstname,
       persons.lastname,
       persons.gender_id as gender,
       persons.career_id as career
      FROM 
        attendance 
        LEFT JOIN persons ON attendance.user_id = persons.user_id
          
      WHERE
      attendance.user_id = persons.user_id
      {$where}

      ORDER BY
       attendance.day
    ";
    $state = $this->pdo->prepare($sql);
    $state->execute($filters);
    $data = $state->fetchAll();
    return $data;
  }
  public function fetchATDById($user){

    $sql ="
    SELECT 
       attendance.user_id,
       attendance.day,
       attendance.title,
       persons.firstname,
       persons.lastname,
       persons.gender_id as gender,
       persons.career_id as career
      FROM 
        attendance 
        LEFT JOIN persons ON attendance.user_id = persons.user_id
      WHERE
      attendance.user_id = :user_id
      ORDER BY
       attendance.day
    ";
    $state = $this->pdo->prepare($sql);
    $state->bindValue( ":user_id", $user['user_id']);
    $state->execute();
    $data = $state->fetchAll();
    return $data;
  }
}

?>