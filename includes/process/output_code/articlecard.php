<div class="card read-card">
    <div class="card-body">

        <h4 class="card-title"><?= $title ?></h4>
        <hr> 
        
        <span class="post-time">Posté par <?= $username ?> on <?= date('d-M-Y g:i a', $postdate) ?></span>
        <p class="card-text">
            <?= $article ?>
        </p>            

    </div>
</div> 