<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>
<body>
    <form method="get" action="/welcome">
        <label for="name">Please enter your name:</label>
        <input id="name" name="name" type="text" value="" />
        <button type="submit">OK</button>
    </form>
</body>
</html>