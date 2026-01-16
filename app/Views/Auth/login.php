<?Php 
use Core\Security;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <form action="/login" method="Post">
        <input type="hidden" name="csrf_token" value="<?= Security::generateCSRFToken() ?>">
        <input name="email" type="text">
        <input name="password" type="password">
        <button type="submit">login</button>
    </form>
</body>
</html>