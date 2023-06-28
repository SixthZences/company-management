<?php
namespace Web\Model;

use Web\Database\Database;


Class Task extends Database {


    public function addTask($task){
        $sql="
        INSERT INTO tasks (
            title,
            description,
            manager,
            member
            ) VALUES (
                :title,
                :description,
                :manager,
                :member
                )
        ";
        $state = $this->pdo->prepare($sql);
        $state->bindValue( ":title", $task['title']);
        $state->bindValue( ":description", $task['description']);
        $state->bindValue( ":manager", $task['manager_id']);
        $state->bindValue( ":member", $task['member_id']);
        $state->execute();//[$person]
        return $this->pdo->lastInsertId();
      }
      public function editTask($task){      
         $sql="
         UPDATE tasks SET 
             status = :status
         WHERE tasks.id = :id
         ";
         $state = $this->pdo->prepare($sql);
         $state->bindValue( ':status', $task['task']);
         $state->bindValue( ':id', $task['id']);
         $state->execute();
         return true;
       }
      public function getAllTasks($filters) {
        //   echo($filters['role']);
        //   echo($filters['user_id']);
        //   echo("this is task".$filters['task_id']);
        //   echo("this is title".$filters['title']);
        //   echo("this is name".$filters['name']);
        //   echo"this is status".($filters['status']);
        $where="";
        if($filters['role']=='manager') {
          $where .="AND (tasks.manager = {$filters['user_id']} )";
        }
        elseif($filters['role']=='employee'){
            $where.="AND (tasks.member = {$filters['user_id']}  )";
        }else{
            unset($filters['role']);
            unset($filters['user_id']);
          }
        if($filters['task_id']){
            $where.="AND (tasks.id = :task_id)";
        }else{
            unset($filters['task_id']);
          }
        if($filters['title']){
            $where.="AND (tasks.title LIKE :title)";
            $filters['title']="%{$filters['title']}%";
        }else{
            unset($filters['title']);
          }
        if($filters['name']) {
            $where .="AND (members.firstname LIKE :name OR members.lastname LIKE :name)";
            $filters['name']="%{$filters['name']}%";
        }else{
            unset($filters['name']);
        }
        if($filters['status']){
            $where.="AND (tasks.status = :status )";
        }else{
            unset($filters['status']);
          }
        $sql ="
        SELECT 
            tasks.id,
            tasks.title,
            tasks.description,
            managers.firstname as manager_fname, 
            managers.lastname as manager_lname,
            members.firstname as member_fname, 
            members.lastname as member_lname,
            tasks.member,
            tasks.started_date,
            tasks.status
        FROM 
            tasks       
            INNER JOIN persons managers ON tasks.manager = managers.user_id
            INNER JOIN persons members ON tasks.member = members.user_id
        WHERE
            tasks.id > 0
            {$where}
        ORDER BY
        tasks.id
        
         
        ";
        $state = $this->pdo->prepare($sql);

        if(isset($filters['task_id'])){
            $state->bindValue(":task_id",$filters['task_id']);
        }
        if(isset($filters['title'])){
            
        $state->bindValue(":title",$filters['title']);
        }
        if(isset($filters['name'])){
            
          $state->bindValue(":name",$filters['name']);
          }
        if(isset($filters['status'])){
            $state->bindValue(":status",$filters['status']);
        }
        $state->execute();
        $data = $state->fetchAll();
        return $data;
    }

    public function getTaskById($taskid){
    $sql ="
    SELECT 
     tasks.title,
     persons.firstname as manager_fname, 
     persons.lastname as manager_lname,
     tasks.description,
     tasks.started_date   
    FROM 
        tasks
        INNER JOIN persons ON tasks.manager = persons.user_id
    WHERE 
      tasks.id = :id
    ";
    $state = $this->pdo->prepare($sql);
    $state->bindValue(":id",$taskid['id']);
    $state->execute();
    $data = $state->fetchAll();
    return $data[0];
  }
}
?>