<?php

class Admin extends BlogMember {

    public function __construct($pUsername) {
        parent::__construct($pUsername);
    }

    public function isValidLogin($pPassword) {
        $request = "SELECT password
                    FROM members
                    WHERE username = :username
                    AND is_admin = true";
        
        $values = array(
            array(':username', $this->username)
        );

        $result = $this->db->queryDB($request, Database::SELECTSINGLE, $values);

        if (isset($result['password']) && password_verify($pPassword, $result['password']))
            return true;
        return false;
    }

    public function insertIntoPostDB($title, $post, $category, $audience) {
        $request = "INSERT INTO posts (username, title, post, category, audience)
                    VALUES (:username, :title, :post, :category, :audience)";

        $values = array(
            array(':username', $this->username),
            array(':title', $title),
            array(':post', $post),
            array(':category', $category),
            array(':audience', $audience)
        );

        $this->db->queryDB($request, Database::EXECUTE, $values);
    }
}
