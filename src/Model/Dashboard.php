<?php
namespace Web\Model;

use Web\Database\Database;


Class Dashboard extends Database {
    public function getAllTasks() {
        $sql ="
        SELECT 
            members.firstname as fname, 
            members.lastname as lname,
            count(member) as task
        FROM 
            tasks
            INNER JOIN persons members ON tasks.member = members.user_id
        GROUP BY
            tasks.member
        ORDER BY
            tasks.member
            desc;
        ";
        $state = $this->pdo->query($sql);
        $data = $state->fetchAll();
        return $data;
    }
    public function getAllDoneTasks($filters) {
        $sql ="
        SELECT 
            persons.firstname as fname,
            persons.lastname as lname,
            count(*) as task
        FROM 
            tasks
            LEFT JOIN persons  ON tasks.member = persons.user_id
        WHERE
        	tasks.status = 'Complete'
        GROUP BY 
			tasks.member
        ORDER BY
            tasks.member
            desc;
         
        ";
        $state = $this->pdo->query($sql);
        $data = $state->fetchAll();
        return $data;
    }
}
?>