<?php

use Core\Session;

$session = new Session();
require base_path('views/partials/head.php');
require base_path('views/partials/nav.php');

?>


<div?>Welcome <?=  $session->username ?? ''; ?> </div>

<div class="px-32 py-12 flex justify-center gap-4">
   

<?php foreach ($grouped as $username => $links): ?>
<div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm text-center">
    <a href="#">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 "><?= htmlspecialchars($username) ?></h5>
    </a>
    <?php foreach ($links as $link): ?>
    <a href="<?= htmlspecialchars($link['link']) ?>" class="flex mt-2 w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
        <span><?= htmlspecialchars($link['name']) ?></span>
    </a>
    <?php endforeach; ?>
</div>
<?php endforeach ?>
</div>
<?php require base_path('views/partials/foot.php');

