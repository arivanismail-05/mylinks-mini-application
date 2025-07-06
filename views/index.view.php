<?php

use Core\Session;

$session = new Session();
require base_path('views/partials/head.php');?>
<?php require base_path('views/partials/nav.php');?>


<div>Welcome<?=  $session->username ?? ''; ?> </div>


<?php require base_path('views/partials/foot.php');

