<?php

    session_start();
    include "UI_include.php";
    include INC_DIR.'header.html';

?>

    <body>
    <?php    
        if (isset($_GET["article"]))
            include INC_DIR."/process/p-article.php";
        else if (isset($_GET["category"]))
            include INC_DIR."/process/p-category.php";
        else
            include INC_DIR."/process/p-read.php";
    ?>
     
	</body>
</html>