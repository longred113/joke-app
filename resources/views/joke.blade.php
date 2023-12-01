<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <link href="/main.css" rel="stylesheet">
</head>

<body class="container">
    <?php
    if (session_id() === '') {
        session_start();
    }
    if (!isset($_SESSION['jokeIdExists'])) {
        $_SESSION['jokeIdExists'] = $countData;
    }
    if (isset($_SESSION['jokeIdExists']) && $_SESSION['jokeIdExists'] > 0) {
        $_SESSION['jokeIdExists'] -= 1;
    }
    if ($_SESSION['jokeIdExists'] == 0) {
        $jokeContent = "That's all the jokes for today! Come back another day!";
    }
    // echo $_SESSION['jokeIdExists'];
    // unset($_SESSION['jokeIdExists']);
    ?>
    <form action="" method="post">
        <p id="jokeContent" , name="laa"><?= $jokeContent ?></p><br>
        <input type="hidden" name="jokeId" value="<?= $id ?>">
        <input type="hidden" name="countData" value="<?= $countData ?>">
        {{csrf_field()}}
        <button>This is Funny!</button>
        <button>This is not funny.</button>
    </form>
</body>

</html>