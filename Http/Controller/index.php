<?php
use Core\Database;
use Core\App;

$db = App::resolve(Database::class);
$results = $db->query("
    SELECT  users.username, links.name AS link_name, links.link
    FROM links
    JOIN users ON users.id = links.user_id
")->get();


$grouped = [];

foreach ($results as $row) {
    $user = $row['username'];

    if (!isset($grouped[$user])) {
        $grouped[$user] = [];
    }

    $grouped[$user][] = [
        'name' => $row['link_name'],
        'link' => $row['link']
    ];
}


 veiw('index.view.php',[

    'grouped' => $grouped
 ]
);

