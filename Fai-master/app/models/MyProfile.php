<?php

class MyProfile {

    public function __construct() {

    }


    public function getProfiles () {
        $db = db_connect();
        $statement = $db->prepare("SELECT * FROM personaldetails
                                WHERE username = :username;");
        $statement->bindValue(':username', $_SESSION['name']);

        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }


    public function create ($username, $birthdate, $phonenumber, $firstname, $lastname, $email) {
        $db = db_connect();
        $statement = $db->prepare("INSERT INTO personaldetails (username, birthdate, phonenumber, firstname, lastname, email)"
            . " VALUES (:username, :birthdate, :phonenumber, :firstname, :lastname, :email); ");

        $statement->bindValue(':username', $username);
        $statement->bindValue(':birthdate', $birthdate);
        $statement->bindValue(':phonenumber', $phonenumber);
        $statement->bindValue(':firstname', $firstname);
        $statement->bindValue(':lastname', $lastname);
        $statement->bindValue(':email', $email);
        $statement->execute();

    }

    public function update ($username, $birthdate, $phonenumber, $firstname, $lastname, $email) {
        $db = db_connect();
        $statement = $db->prepare("UPDATE personaldetails SET username = :username, birthdate = :birthdate, "
            . " phonenumber = :phonenumber, firstname = :firstname, lastname = :lastname, email = :email  "
            . " WHERE id = :id; ");

        $statement->bindValue(':username', $username);
        $statement->bindValue(':birthdate', $birthdate);
        $statement->bindValue(':phonenumber', $phonenumber);
        $statement->bindValue(':firstname', $firstname);
        $statement->bindValue(':lastname', $lastname);
        $statement->bindValue(':email', $email);
        $statement->execute();

    }

}
