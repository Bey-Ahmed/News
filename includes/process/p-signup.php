<?php

    $h = new Helper();
    $msg = "";
    $username = "";

    if (isset($_POST['submit'])) {        
        $username = $_POST['username'];

        if ($h->isEmpty(array($username, $_POST['password'], $_POST['confirm_password']))) {
            $msg = "All fields are required!";  
        }
        else if (!$h->isValidLength($username, 6, 100)) {
            $msg = "The Username should have between 6 and 100 characters!";
        }
        else if (!$h->isValidLength($_POST['password'])) {
            $msg = "The password should have between 8 and 20 characters!";
        }
        else if (!$h->isSecure($_POST['password'])) {
            $msg = "The password should contain at least one lowercase character, one uppercase character and one digit!";
        }
        else if (!$h->passwordsMatch($_POST['password'], $_POST['confirm_password'])) {
            $msg = "The passwords don't match!";
        }
        else {
            $member = new BlogMember($username);

            if ($member->isDuplicateID()) {
                $msg = "Username already used!";
            }
            else {
                $member->insertIntoMemberDB($_POST['password']);
                header("Location: index.php?new=1");
            }
        }
    }