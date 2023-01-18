<?php
namespace Web\Model;

use Web\Database\Database;

class User extends Database{

  public function createUser($user){

    $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);

    $sql ="
     INSERT INTO users (
         user_id,
         name,
         username,
         password
    )VALUES (
        :user_id,
        :name,
        :username,
        :password

    )
    ";
    $state = $this->pdo->prepare($sql);
    $state->execute($user);

    session_start();
    $user_id = $this->pdo->lastInsertID();
    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['name'] = $user['name'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = 'employee';
    $_SESSION['login'] = true;


    return $this->pdo->lastInsertID();
  }
  public function checkUser($user){
      $sql="
       SELECT
       user_id,
       name,
       username,
       role,
       password
      FROM
       users
      WHERE
       users.username = ?
      ";
      $state = $this->pdo->prepare($sql);
      $state->execute([$user['username']]);
      $data = $state->fetchAll();
      $userDB = $data[0];

      if(password_verify($user['password'],$userDB['password'])){
          session_start();
          // user_login 
          $_SESSION['user_id'] = $userDB['user_id'];
          $_SESSION['name'] = $userDB['name'];
          $_SESSION['username'] = $userDB['username'];
          $_SESSION['role'] = $userDB['role'];
          $_SESSION['login'] = true;
          
      
          return true;

      } else {
          return false;
      }
    }
  public function fetchUserDataByID($user){

        $sql="
         SELECT
         firstname,
         lastname,
         gender_id,
         dob,
         career_id,
         salary_id,
         avatar,
         user_id,
         refers.title AS gender,
         career.title AS career,
         salary.salary AS salary
         
        FROM
         persons
         LEFT JOIN refers ON persons.gender_id = refers.id
         LEFT JOIN career ON persons.career_id = career.id
         LEFT JOIN salary ON persons.salary_id = salary.id
        WHERE
         persons.user_id = ?
        ";
        $state = $this->pdo->prepare($sql);
        $state->execute([$user['user_id']]);
        $data = $state->fetchAll();
        if (isset($data[0])){
          return $data[0];
        }
        return false;
    }
  
    public function deleteUser($user_id){
      $sql = "
      DELETE FROM users WHERE user_id = ?
      ";
      $state = $this->pdo->prepare($sql);
      $state->bindValue( ":user_id", $user_id);
      $state->execute([$user_id]);
      return true;
  }

  public function checkATDInput($user){
  
      $sql ="
       SELECT
        persons.user_id
       FROM
        persons
       WHERE
        persons.user_id > 0 
  
      
      ";
      $state = $this->pdo->query($sql);
      $data = $state->fetchAll();
      $userDB = $data;

      foreach($userDB as $person) {
        if ($person['user_id']==$user['user_id']){
          $sql2 ="
          INSERT INTO attendance (user_id)
          VALUES ( :user_id )
          ";
          $state = $this->pdo->prepare($sql2);
          $state->execute($user);
          return true;
     
        }
      }
      
  
  
      return false;
  }
  public function isEmployee($user){
    $sql ="
       SELECT
        persons.user_id
       FROM
        persons
       WHERE
        persons.user_id > 0  
      ";
      $state = $this->pdo->query($sql);
      $data = $state->fetchAll();
      $userDB = $data;
      foreach($userDB as $person) {
        if ($person['user_id']==$user['user_id']){
          return true;
     
        }
      }
      return false;
  }


  
}