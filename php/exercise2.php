<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 2</title>
    <style>
        body {
            background-color: #1e1e2e;
            color: #cdd6f4;
            font-family: 'Comic Sans MS', sans-serif;
            font-size: 18px;
            text-align: center;
        }
        #title {
            font-size: 30px;
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 10px;
            color: #f5e0dc;
        }
        #hover, #click {
            font-size: 20px;
            margin: 0;
        }
        .exercise {
            color: #f9e2af;
        }
    </style>
</head>
<body>
    <p id="title">Exercise 2</p>

    <?php
        echo '<div class="exercise"><br>This is the first exercise.</div>';

        function number(){
            return rand(1,5);
        }

        $n1 = number();
        switch ($n1) {
            case 1:
                echo "The random number generated is " . $n1 ." so today is a A day.<br>";
                break;
            case 2:
                echo "The random number generated is " . $n1 ." so today is a B day.<br>";
                break;
            case 3:
                echo "The random number generated is " . $n1 ." so today is a C day.<br>";
                break;
            case 4:
                echo "The random number generated is " . $n1 ." so today is a D day.<br>";
                break;
            default:
                echo "The random number generated is " . $n1 ." so today is a phantom day.<br>";
                break;
        }

        echo '<div class="exercise"><br>This is the second exercise.</div>';

        function reverse($str){
            $returnStr = "";
            for ($i = strlen($str) - 1; $i >= 0; $i--) {
                $returnStr.=$str[$i];
            }
            return $returnStr;
        }
        $str = "Salutations!";
        echo "The string is: " . $str . "<br><br>";
        echo "The 'strrev()' reversed string is: " . strrev($str) . "<br>";
        echo "The custom reversed string is: " . reverse($str) . "<br>";

        echo '<div class="exercise"><br>This is the third exercise.</div>';
        $tempIter = 0;
        while ($tempIter<10){
            $tempIter++;
            echo "abc ";
        }
        echo "<br>";

        $tempIter = 0;
        do {
            $tempIter++;
            echo "xyz ";
        } while ($tempIter<10);
        echo "<br>";

        for ($i=0;$i<10;$i++){
            echo $i." ";
        }
        echo "<br>";

        echo '<div class="exercise"><br>This is the third exercise.</div>';

        $chars = array("A","B","C","D","E","F");

        echo "<div style='width:8%;margin:auto;'><ol>";
        foreach($chars as $char){
            echo "<li>Item " . $char . "</li>";
        }
        echo "</ol></div>";
        echo "<br>";

        echo "<div class='exercise'><br>This is the fifth exercise.</div>";

        function generatePass() {
            $lowercase = 'abcdefghijklmnopqrstuvwxyz';
            $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $numbers = '0123456789';
            $specialChars = '!@#$%^&*()-_=+{}|;:\'",./?';
            
            $password = '';
            
            $password .= $lowercase[rand(0, strlen($lowercase) - 1)];
            $password .= $uppercase[rand(0, strlen($uppercase) - 1)];
            $password .= $numbers[rand(0, strlen($numbers) - 1)];
            $password .= $specialChars[rand(0, strlen($specialChars) - 1)];
        
            $allChars = $lowercase . $uppercase . $numbers . $specialChars;
            while (strlen($password)<8) {
                $password .= $allChars[rand(0, strlen($allChars) - 1)];
            }
        
            $password = str_shuffle($password);
            return $password;
        }

        echo "<div style='width:26%;margin:auto;'><ol>";
        for ($i=0;$i<10;$i++){
            echo "<li>The random password is " . generatePass() . ".</li>";
        }
        echo "</ol></div>";
    ?>
</body>
</html>