<?php
$users = json_decode(
    file_get_contents(__DIR__ . '/../data/users.json')
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 40px;
        }
        .card {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }
        a {
            display: block;
            padding: 10px 0;
            color: #333;
        }
    </style>
</head>
<body>

<div class="card">
    <h1>User Admin</h1>
    <h2>User List</h2>

    <?php foreach ($users as $user): ?>
        <a href="users.php?id=<?= $user->id ?>">
            <?= htmlspecialchars($user->name) ?>
        </a>
    <?php endforeach; ?>
</div>

</body>
</html>