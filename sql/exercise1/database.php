<?php
require 'config.php';

$databasePort = 3306;

$mysqli = new mysqli($databaseHost, $databaseUsername, $databasePassword, '', $databasePort);
$mysqli->set_charset('utf8mb4');

$dbName = 'Grades';
$mysqli->query("CREATE DATABASE IF NOT EXISTS `$dbName`");

$mysqli->select_db($dbName);

$tableSql = "CREATE TABLE IF NOT EXISTS Quizzes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    score INT NOT NULL,
    quiz_date DATE NOT NULL,
    UNIQUE KEY unique_quiz (first_name, last_name, score, quiz_date)
) ENGINE=InnoDB";
$mysqli->query($tableSql);

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Records</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }
        
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #ff9a9e, #8797ff);
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .container {
            width: 90%;
            max-width: 800px;
        }
        
        .glass-card {
            background: rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            border: 1px solid rgba(0, 0, 0, 0.18);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            padding: 20px 30px;
            margin-bottom: 30px;
        }
        
        h2 {
            color: #fff;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            margin-bottom: 15px;
            font-weight: 600;
        }
        
        .record {
            background: rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 12px 15px;
            margin-bottom: 8px;
            color: #fff;
            font-size: 16px;
        }
        
        .record:hover {
            background: rgba(0, 0, 0, 0.2);
            transform: translateY(-2px);
            transition: all 0.3s ease;
        }
    </style>
</head>
<body>
    <div class="container">';

$required = ['first_name', 'last_name', 'score', 'quiz_date'];
foreach ($required as $field) {
    if (empty($_POST[$field])) {
        exit;
    }
}

$first = $mysqli->real_escape_string(trim($_POST['first_name']));
$last  = $mysqli->real_escape_string(trim($_POST['last_name']));
$score = (int) $_POST['score'];
$date  = $_POST['quiz_date'];

$insSql = "INSERT IGNORE INTO Quizzes (first_name, last_name, score, quiz_date) VALUES 
    ('$first', '$last', $score, '$date')";
$mysqli->query($insSql);

echo "<div class='glass-card'>";
echo "<h2>All Quiz Records</h2>";
$res1 = $mysqli->query("SELECT * FROM Quizzes");

if ($res1 && $res1->num_rows > 0) {
    while ($row = $res1->fetch_assoc()) {
        echo "<div class='record'>{$row['first_name']} {$row['last_name']} - {$row['score']} on {$row['quiz_date']}</div>";
    }
}
echo "</div>";

echo "<div class='glass-card'>";
echo "<h2>Scores Less Than 70</h2>";
$res2 = $mysqli->query("SELECT first_name, last_name, score FROM Quizzes WHERE score < 70");
if ($res2 && $res2->num_rows > 0) {
    while ($row = $res2->fetch_assoc()) {
        echo "<div class='record'>{$row['first_name']} {$row['last_name']} - {$row['score']}</div>";
    }
} else {
    echo "<div class='record'>No records found</div>";
}
echo "</div>";

echo "<div class='glass-card'>";
echo "<h2>Quizzes Taken Before Nov. 10, 2021</h2>";
$res3 = $mysqli->query("SELECT first_name, last_name FROM Quizzes WHERE quiz_date < '2021-11-10'");
if ($res3 && $res3->num_rows > 0) {
    while ($row = $res3->fetch_assoc()) {
        echo "<div class='record'>{$row['first_name']} {$row['last_name']}</div>";
    }
} else {
    echo "<div class='record'>No records found</div>";
}
echo "</div>";

echo '    </div>
</body>
</html>';

$mysqli->close();