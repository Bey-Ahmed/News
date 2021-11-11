<?php    

    $h = new Helper();
    $is_member = isset($_SESSION['username']);

    if (!$is_member) {
        $user = new BlogReader();
    }
    else {
        $user = new BlogMember($_SESSION['username']);
    }

    $post = $user->getPostFromDB($_GET["article"]);

    if ($post == false) {
        include "output_code/blankcard.html";
    }
    else {
        $title = htmlspecialchars($post['title']);
        $article = strip_tags($post['post'], "<strong><em><p><ol><ul><li><a><br>");
        $username = htmlspecialchars($post['username']);
        $postdate = htmlspecialchars($post['post_date']);

        include "output_code/articlecard.php";
    }

    if ($is_member)
        include "output_code/logout.html";