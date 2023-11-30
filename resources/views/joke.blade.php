<!DOCTYPE html>
<html lang="en">
<!-- include 'JokeController.php' -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // Example Database Connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "joke-app";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    $stmt = $conn->prepare("SELECT * FROM jokes");
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <?php foreach ($data as $row) : ?>
        <li><?php echo $row['jokeContent']; ?></li>
        <!-- Repeat for other columns as needed -->
    <?php endforeach; ?>
</body>

</html>