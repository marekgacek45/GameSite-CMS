<nav aria-label="Page navigation example" class='container d-flex flex-row justify-content-center align-item-center'>
    <ul class="pagination">

        <?php if ($paginator->previous): ?>
            <li class="page-item"><a class="page-link" href="?page=<?= $paginator->previous ?>">Poprzednia</a></li>
        <?php else: ?>
            <li class="page-item disabled"><a class="page-link" href="?page=<?= $paginator->previous ?>">Poprzednia</a></li>
        <?php endif ?>

        <?php for ($i = 1; $i <= $paginator->totalPages; $i++): ?>
            <li class="page-item"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
        <?php endfor ?>

        <?php if ($paginator->next): ?>
            <li class="page-item"><a class="page-link" href="?page=<?= $paginator->next ?>">Następna</a></li>
        <?php else: ?>
            <li class="page-item disabled"><a class="page-link" href="?page=<?= $paginator->next ?>">Następna</a></li>
        <?php endif ?>

    </ul>
</nav>