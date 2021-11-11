<?php    

    $h = new Helper();
    $update = false;
    $is_member = isset($_SESSION['username']);

    if (!$is_member) {
        $user = new BlogReader();
    }
    else {
        $user = new BlogMember($_SESSION['username']);
        $lastViewedPost = $user->getLastViewedPost();
    }

    $posts = $user->getPostsFromDB();
    $categories = $user->getCategories();

    if ($posts == false) {
        include "output_code/blankcard.html";
    }
    else {
        $postsNumb = count($posts);
        $pagesNumb = (int) ($postsNumb / 2) + (($postsNumb % 2 == 0) ? 0 : 1);
        $page = (isset($_GET["page"]) ? $_GET["page"] : 1);
        for ($i = ($page - 1) * 2; $i < $page * 2; $i++) {
            if ($i >= $postsNumb)
                break;
            $msgid = $posts[$i]['id'];
            $title = htmlspecialchars($posts[$i]['title']);
            $post = strip_tags($posts[$i]['post'], "<strong><em><p><ol><ul><li><a><br>");
            $username = htmlspecialchars($posts[$i]['username']);
            $postdate = htmlspecialchars($posts[$i]['post_date']);

            include "output_code/messagecard.php";
        }
        include "output_code/nextpage.php";
    }

    if ($is_member) {
        include "output_code/logout.html";

        if ($update) {
            $user->updateLastViewedPost();
        }
    }