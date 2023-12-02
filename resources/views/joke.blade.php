<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <link href="/main.css" rel="stylesheet">
</head>

<body>
    <?php
    if (session_id() === '') {
        session_start();
    }
    if (!isset($_SESSION['countJokeExists'])) {
        $_SESSION['countJokeExists'] = $countData;
    }
    if (empty($_SESSION['existsJoke'])) {
        $_SESSION['existsJokeIds'] = $existsIds;
        $existsIds = $_SESSION['existsJokeIds'];
    }
    if (isset($_SESSION['countJokeExists']) && $_SESSION['countJokeExists'] > 0) {
        $_SESSION['countJokeExists'] -= 1;
    }
    if ($_SESSION['countJokeExists'] == 0) {
        $jokeContent = "That's all the jokes for today! Come back another day!";
    }
    // unset($_SESSION['countJokeExists']);
    // session_destroy();
    ?>
    <!-- <header>
        <h2>Cities</h2>
    </header> -->
    <div class="greenSquare">
        <h1 class="jokeContent">A joke a date keep the doctor away.</h1>
        <p>If you joke wrong way, your teeth have to pay. (Serious) </p>
    </div>
    <div class="jokeContent">
        <form action="" method="post">
            <p id="jokeContent" , name="laa"><?= $jokeContent ?></p><br>
            <input type="hidden" name="jokeId" value="<?= $id ?>">
            <input type="hidden" name="countData" value="<?= $countData ?>">
            <input type="hidden" name="existsJokeIds" value="<?= implode(',', $existsIds) ?>">
            {{csrf_field()}}
            <button type="submit" name="status" value="This is Funny!">This is Funny!</button>
            <button type="submit" name="status" value="This is not funny">This is not funny.</button>
        </form>
    </div>
    <footer class="footer">
        <p>This is website is created as part of Hlsolutions program. The materials contained on this website are provided for general, information only and do not constitute any form of advice.
            HLS assumes no responsibility for the accuracy of any particular statement and accepts no liability for any loss or damage which may arise from reliance on the information contained on this site.
        </p>
        <p>Copyright 2021 HLS</p>
    </footer>
</body>

</html>