<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>users list</h1>
    <ul>
        <?php foreach ($users as $user) { ?>
        <li><?= "full name: " . $user['first_name'] . " " . $user['last_name'] . " email: " . $user['email'] ?></li>
        <?php } ?>
    </ul>
</body>
</html>