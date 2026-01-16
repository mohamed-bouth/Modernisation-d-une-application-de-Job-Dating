<?Php 
use Core\Security;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>register</h1>
    <form action="/register" method="post">
        <input type="hidden" name="csrf_token" value="<?= Security::generateCSRFToken() ?>">
        <input name="firstName" type="text">
        <input name="lastName" type="text">
        <input name="email" type="text">
        <input name="password" type="password">
        <button type="submit">register</button>
    </form>
</body>
</html>
