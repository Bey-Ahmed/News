<div class="card read-card">
    <div class="card-body">

        <h4 class="card-title"><?= $title ?></h4>
    <?php
        if (isset($_GET["category"])) {
    ?>
            <h5><?= $_GET["category"] ?></h5>
    <?php        
        }
    ?>
        <hr>
        
        <?php
            if ($is_member and $lastViewedPost < $msgid)
            {
                echo '<span class="new-post">NOUVEAU</span>';
                $update = true;
            }
        ?>    
        
        <span class="post-time">Posté par <?= $username ?> on <?= date('d-M-Y g:i a', $postdate) ?></span>
        <p class="card-text">
            <?= $h->extract($post) ?>
            <a href="read.php?article=<?= $msgid ?>">Suite ...</a>
        </p>            

    </div>
</div> 