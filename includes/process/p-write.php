<?php

    if (!isset($_SESSION['username']) || !isset($_SESSION['is_admin'])) {
        header("Location: admin.php");
    }
    else {
        $h = new Helper();
        $title = "";
        $post = "";
        $category = "";
        $audience = "";
        $msg = "";

        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $post = $_POST['post'];
            $category = $_POST['category'];
            $audience = $_POST['audience'];

            if ($h->isEmpty(array($title, $post, $category, $audience))) {
                $msg = 'All fields are required';     
            }
            else {
                $admin = new Admin($_SESSION['username']);
                $admin->insertIntoPostDB($title, $post, $category, $audience);
                $msg = "Message saved successfully";
            }
        }
    }