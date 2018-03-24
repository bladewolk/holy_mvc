<div class="row justify-content-end">
    <nav>
        <ul class="mt-3 pagination ">
            <li class="page-item <?php if ($paginator->prev() === '#') : ?> disabled <?php endif; ?>">
                <a class="page-link" href="<?= $paginator->prev() ?>" tabindex="-1">Previous</a>
            </li>

            <li class="page-item <?php if ($paginator->next() === '#') : ?> disabled <?php endif; ?> ">
                <a class="page-link" href="<?= $paginator->next() ?>">Next</a>
            </li>
        </ul>
    </nav>
</div>