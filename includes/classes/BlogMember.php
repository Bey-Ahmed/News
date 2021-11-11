<?php

class BlogMember extends BlogReader {

    protected $username;
    protected $helper;

    public function __construct($pUsername) {
        parent::__construct();
        $this->username = $pUsername;
        $this->type = self::MEMBER;
        $this->helper = new Helper();
    }

    public function isDuplicateID() {
        $request = "SELECT COUNT(username) AS num
                    FROM members
                    WHERE username = :username";
        
        $values = array(
            array(':username', $this->username)
        );

        $user = $this->db->queryDB($request, Database::SELECTSINGLE, $values);

        if ($user['num'])
            return true;
        return $false;
    }

    public function insertIntoMemberDB($pPassword) {
        $request = "INSERT INTO members (username, password)
                    VALUES (:username, :password)";

        $values = array(
            array(':username', $this->username),
            array(':password', password_hash($pPassword, PASSWORD_DEFAULT))
        );

        $this->db->queryDB($request, Database::EXECUTE, $values);
    }

    public function isValidLogin($pPassword) {
        $request = "SELECT password
                    FROM members
                    WHERE username = :username";
        
        $values = array(
            array(':username', $this->username)
        );

        $result = $this->db->queryDB($request, Database::SELECTSINGLE, $values);

        if (isset($result['password']) && password_verify($pPassword, $result['password']))
            return true;
        return false;
    }

    private function getLatestPostID() {
        $request = "SELECT MAX(id) AS max FROM posts";

        $result = $this->db->queryDB($request, Database::SELECTSINGLE);

        if (isset($result['max']) && !empty($result['max']))
            return $result['max'];
        return 0;
    }

    public function updateLastViewedPost() {
        $max = $this->getLatestPostID();

        $request = "UPDATE members
                    SET last_viewed = :max
                    WHERE username = :username";

        $values = array(
            array(':max', $max),
            array(':username', $this->username)
        );

        $this->db->queryDB($request, Database::EXECUTE, $values);
    }

    public function getLastViewedPost() {
        $request = "SELECT last_viewed
                    FROM members
                    WHERE username = :username";

        $values = array(
            array(':username', $this->username)
        );

        $result = $this->db->queryDB($request, Database::SELECTSINGLE, $values);

        if (isset($result['last_viewed']))
            return $result['last_viewed'];
        return 0;
    }
}