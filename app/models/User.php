<?php

class User {

    public $username;
    public $password;
    public $auth = false;

    public function __construct() {
        
    }

    public function authenticate() {
        /*
         * if username and password good then
         * $this->auth = true;
         */
		 
		$db = db_connect();
        $statement = $db->prepare("select * from users
                                WHERE username = :name;
                ");
        $statement->bindValue(':name', $this->username);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
		
		if ($rows) {
			$this->auth = true;
            $_SESSION['name'] = $rows[0]['Username'];
			$_SESSION['email'] = $rows[0]['Email'];
            $_SESSION['usertype'] = $rows[0]['UserType'];
			//log the login
            $statement = $db->prepare("INSERT INTO Users_login (Username, LoginTime, Status)"
                . " VALUES (:username, :logintime, :status); ");
            $statement->bindValue(':username', $this->username);
            $statement->bindValue(':logintime', time());
            $statement->bindValue(':status', 1);
            $statement->execute();
            // get number time to login
            $statement = $db->prepare("select count(*) as TotalLoginToday from Users_login
                                WHERE  FROM_UNIXTIME(LoginTime, '%Y-%m-%d') = CURDATE();
                ");
            //$statement->bindValue(':name', $this->username);
            $statement->execute();
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
            if ($rows) {
                $_SESSION['total_login_attempts_today'] = $rows[0]['TotalLoginToday'];
            }
		} else {
            //log the login
            $statement = $db->prepare("INSERT INTO Users_login (Username, LoginTime, Status)"
                . " VALUES (:username, :logintime, :status); ");
            $statement->bindValue(':username', $this->username);
            $time = time();
            $statement->bindValue(':logintime', $time);
            $statement->bindValue(':status', 0);
            $statement->execute();
        }
    }
	public  function getTotalLoginToday(){
        // get number time to login
        $db = db_connect();
        $statement = $db->prepare("select count(*) as TotalLoginToday from Users_login
                                WHERE FROM_UNIXTIME(LoginTime, '%Y-%m-%d') = CURDATE();
                ");
        //$statement->bindValue(':name', $this->username);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        if ($rows) {
            $_SESSION['total_login_attempts_today'] = $rows[0]['TotalLoginToday'];
        }
    }
	public function register ($username, $password) {
		$db = db_connect();
        $statement = $db->prepare("INSERT INTO users (Username, Password)"
                . " VALUES (:name, :pass); ");

        $statement->bindValue(':name', $username);
        $statement->bindValue(':pass', $password);
        $statement->execute();

	}

}
