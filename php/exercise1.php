<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 1</title>
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
    <p id="title">PHP: Hypertext Preproccesor</p>

    <?php
        echo '<div class="exercise"><br>This is the first exercise.</div>';
        $name = "Mario";
        echo "I am " . $name . "<br>";

        echo '<div class="exercise"><br>This is the second exercise.</div>';
        if ($name == "Mario") {
            echo "I am Mario<br>";
        }

        echo '<div class="exercise"><br>This is the third exercise.</div>';
        $name = "awaken";
        if ($name == "Mario") {
            echo "I am Mario<br>";
        } else {
            echo "NO NO NO, THAT IS NOT MY NAME!1!!<br>";
        }

        echo '<div class="exercise"><br>This is the fourth exercise.</div>';
        $val = 2;
        echo "Value is now " . $val . ".<br>";
        $val += 3;
        echo "Add 3. Value is now " . $val . ".<br>";
        $val -= 1;
        echo "Subtract 1. Value is now " . $val . ".<br>";
        $val *= 17;
        echo "Multiply by 17. Value is now " . $val . ".<br>";
        $val /= 2;
        echo "Divide by 2. Value is now " . $val . ".<br>";
        $val++;
        echo "Increment value by one. Value is now " . $val . ".<br>";
        $val--;
        echo "Decrement value by one. Value is now " . $val . ".<br>";

        echo '<div class="exercise"><br>This is the fifth exercise.</div>';
        $whatisit = "patanka";
        echo "Value is " . gettype($whatisit) . ".<br>";
        $whatisit = 3.14;
        echo "Value is " . gettype($whatisit) . ".<br>";
        $whatisit = true;
        echo "Value is " . gettype($whatisit) . ".<br>";
        $whatisit = 3;
        echo "Value is " . gettype($whatisit) . ".<br>";
        $whatisit = null;
        echo "Value is " . gettype($whatisit) . ".<br>";

        echo '<div class="exercise"><br>This is the sixth exercise.</div>';
        echo "Must start with dollar sign and can contain letters, numbers, and underscores.<br>";
        echo "print returns a value, while echo does not<br>";
        echo "true, PHP is a loosely typed language<br>";
        echo "true<br>";
        echo "printing a variable is not the same and math functions are called differently<br>";
    ?>
</body>
</html>