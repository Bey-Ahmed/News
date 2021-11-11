<div class="card read-card pages">
    <div class="card-body pages">
    <?php
        if ($page > 1) {
    ?>
            <button type="button" class="btn btn-dark"><a href="read.php?category=<?= urlencode($_GET["category"]) ?>&page=<?= $page - 1 ?>">Previous</a></button>
    <?php
        } else {
    ?>
            <button type="button" class="btn btn-dark"><a href="read.php?category=<?= urlencode($_GET["category"]) ?>&page=<?= $pagesNumb ?>">Previous</a></button>
    <?php
        }

        if ($page < $pagesNumb) {
    ?>
            <button type="button" class="btn btn-dark"><a href="read.php?category=<?= urlencode($_GET["category"]) ?>&page=<?= $page + 1 ?>">Next</a></button>
    <?php
        } else {
    ?>
            <button type="button" class="btn btn-dark"><a href="read.php?category=<?= urlencode($_GET["category"]) ?>&page=<?= 1 ?>">Next</a></button>
    <?php
        }
    ?>
    </div>
</div>