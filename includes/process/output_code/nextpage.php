<div class="card read-card pages">
    <div class="card-body pages">
    <?php
        if ($categories)
            foreach ($categories as $elmt) {
    ?>
                <a href="read.php?category=<?= urlencode($elmt['category']) ?>"><?= $elmt['category'] ?></a>
                <span> | </span>
    <?php
            }
    ?>
    </div>
</div>

<div class="card read-card pages">
    <div class="card-body pages">
    <?php
        if ($page > 1) {
    ?>
            <button type="button" class="btn btn-dark"><a href="read.php?page=<?= $page - 1 ?>">Previous</a></button>
    <?php
        } else {
    ?>
            <button type="button" class="btn btn-dark"><a href="read.php?page=<?= $pagesNumb ?>">Previous</a></button>
    <?php
        }

        if ($page < $pagesNumb) {
    ?>
            <button type="button" class="btn btn-dark"><a href="read.php?page=<?= $page + 1 ?>">Next</a></button>
    <?php
        } else {
    ?>
            <button type="button" class="btn btn-dark"><a href="read.php?page=<?= 1 ?>">Next</a></button>
    <?php
        }
    ?>
    </div>
</div>