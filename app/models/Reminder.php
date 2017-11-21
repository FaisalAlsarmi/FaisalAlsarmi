<?php

class Reminder {


    public function __construct() {
        
    }

    public function get_reminders () {
        $db = db_connect();
        $statement = $db->prepare("SELECT * FROM reminders
                                WHERE username = :username AND deleted = 0;");
        $statement->bindValue(':username', $_SESSION['username']);

        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    public function readAll() {
        /*
         * if username and password good then
         * $this->auth = true;
         */

        $db = db_connect();
        $statement = $db->prepare("select * from Reminder
                ");
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
    }

    public function read($id) {
        /*
         * if username and password good then
         * $this->auth = true;
         */
		 
		$db = db_connect();
        $statement = $db->prepare("select * from Reminder
                                WHERE id = :id;
                ");
        $statement->bindValue(':id', $id);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
		
		return $rows;
    }
	
	public function create ($subject, $description, $created_date, $deleted, $username) {
		$db = db_connect();
        $statement = $db->prepare("INSERT INTO Reminder (subject, description, created_date, deleted, username )"
                . " VALUES (:subject, :description, :created_date, :deleted, :username ); ");

        $statement->bindValue(':subject', $subject);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':created_date', $created_date);
        $statement->bindValue(':deleted', $deleted);
        $statement->bindValue(':username', $username);
        $statement->execute();

	}


    public function update ($id, $subject, $description, $created_date, $deleted, $username) {
        $db = db_connect();
        $statement = $db->prepare("UPDATE Reminder SET subject = :subject, description = :description, "
            . " created_date = :created_date, deleted = :deleted, username = :username  "
            . " WHERE id = :id; ");

        $statement->bindValue(':id', $id);
        $statement->bindValue(':subject', $subject);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':created_date', $created_date);
        $statement->bindValue(':deleted', $deleted);
        $statement->bindValue(':username', $username);
        $statement->execute();

    }

    public function update2 ($id, $subject, $description, $created_date) {
        $db = db_connect();
        $statement = $db->prepare("UPDATE Reminder SET subject = :subject, description = :description, "
            . " created_date = :created_date "
            . " WHERE id = :id; ");

        $statement->bindValue(':id', $id);
        $statement->bindValue(':subject', $subject);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':created_date', $created_date);
        $statement->execute();

    }

    public function delete ($id) {
        $db = db_connect();
        $statement = $db->prepare("DELETE FROM Reminder "
                                            . " WHERE id = :id; ");

        $statement->bindValue(':id', $id);
        $statement->execute();

    }

}
