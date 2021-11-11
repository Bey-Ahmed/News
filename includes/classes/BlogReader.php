<?php

class BlogReader {

    const READER = 1;
    const MEMBER = 2;
    
    protected $db;
    protected $type;

    public function __construct() {
        $this->db = new Database();
        $this->type = self::READER;
    }
    
    public function getPostsFromDB() {
        $request = "SELECT id, unix_timestamp(post_date) as 'post_date', username, title, post, category, audience
                    FROM posts
                    WHERE audience <= :audience
                    ORDER BY id DESC";

        $values = array(
            array(':audience', $this->type)
        );

        $result = $this->db->queryDB($request, Database::SELECTALL, $values);

        if (empty($result))
            return false;
        return $result;
    }

    public function getPostsByCategoryFromDB($category) {
        $request = "SELECT id, unix_timestamp(post_date) as 'post_date', username, title, post, category, audience
                    FROM posts
                    WHERE audience <= :audience
                    AND category = :category
                    ORDER BY id DESC";

        $values = array(
            array(':category', $category),
            array(':audience', $this->type)
        );

        $result = $this->db->queryDB($request, Database::SELECTALL, $values);

        if (empty($result))
            return false;
        return $result;
    }

    public function getPostFromDB($idArticle) {
        $request = "SELECT unix_timestamp(post_date) as 'post_date', username, title, post, category, audience
                    FROM posts
                    WHERE id=".$idArticle;

        $result = $this->db->queryDB($request, Database::SELECTSINGLE);

        if (empty($result))
            return false;
        return $result;
    }

    public function getCategories() {
        $request = "SELECT DISTINCT category
                    FROM posts";

        $result = $this->db->queryDB($request, Database::SELECTALL);

        if (empty($result))
            return false;
        return $result;
    }
    
}
