<?php
// Load users from JSON file
$json = file_get_contents("../data/users.json");
$users = json_decode($json);

// Get user ID from URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : 1;

// Find selected user
$user = null;

foreach ($users as $item) {
    if ($item->id == $id) {
        $user = $item;
        break;
    }
}

if (!$user) {
    die("User not found.");
}

$classes = implode(", ", $user->classes);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Editor</title>

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

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        button {
            margin-top: 20px;
            padding: 12px;
            width: 100%;
            cursor: pointer;
        }

        a {
            color: #333;
        }
    </style>
</head>

<body>

<div class="card">

    <a href="index.php">← Back to User List</a>

    <h1>User Editor</h1>

    <form method="post">

        <label>Name</label>
        <input type="text" name="name"
               value="<?= htmlspecialchars($user->name) ?>">

        <label>Type</label>
        <input type="text" name="type"
               value="<?= htmlspecialchars($user->type) ?>">

        <label>Email</label>
        <input type="email" name="email"
               value="<?= htmlspecialchars($user->email) ?>">

        <label>Classes</label>
        <input type="text" name="classes"
               value="<?= htmlspecialchars($classes) ?>">

        <button type="submit">Save Changes</button>

    </form>

</div>

</body>
</html>