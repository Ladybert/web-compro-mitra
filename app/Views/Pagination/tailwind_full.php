<?php $pager->setSurroundCount(1) ?>

<nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center mt-4">
    <ul class="flex items-center space-x-2">
        <?php if ($pager->hasPrevious()) : ?>
            <li>
                <a href="<?= $pager->getFirst() ?>" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                    &laquo; First
                </a>
            </li>
            <li>
                <a href="<?= $pager->getPrevious() ?>" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                    &lsaquo; Prev
                </a>
            </li>
        <?php endif ?>

        <?php foreach ($pager->links() as $link) : ?>
            <li>
                <a href="<?= $link['uri'] ?>" class="px-4 py-2 text-sm font-medium <?= $link['active'] ? 'text-white bg-blue-500 border border-blue-500' : 'text-gray-700 bg-white border border-gray-300' ?> rounded-lg hover:bg-gray-100">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>

        <?php if ($pager->hasNext()) : ?>
            <li>
                <a href="<?= $pager->getNext() ?>" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                    Next &rsaquo;
                </a>
            </li>
            <li>
                <a href="<?= $pager->getLast() ?>" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                    Last &raquo;
                </a>
            </li>
        <?php endif ?>
    </ul>
</nav>
