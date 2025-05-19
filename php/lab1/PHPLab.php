<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Lab 1</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background: linear-gradient(135deg, #1a1b26, #24283b);
            color: #cdd6f4;
            font-family: 'Poppins', sans-serif;
            text-align: center;
            height: 100vh;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-attachment: fixed;
            overflow-y: auto;
        }
        img {
            border-radius: 8px;
            height: 20vh;
            object-fit: cover;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
            margin-bottom: 15px;
        }
        .title {
            font-size: 24px;
            font-weight: 700;
            margin: 10px 0;
            color: #f5e0dc;
            text-shadow: 0 2px 10px rgba(245, 224, 220, 0.3);
        }
        .header {
            color: #cdd6f4;
            font-weight: 600;
            font-size: 16px;
        }
        #submit {
            background: rgba(253, 241, 214, 0.2);
            color: #fab387;
            border: 1px solid rgba(250, 179, 135, 0.3);
            padding: 8px 25px;
            margin: 20px 0;
            cursor: pointer;
            font-weight: 600;
            border-radius: 30px;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        #submit {
            position: relative;
            overflow: hidden;
            background: linear-gradient(90deg, rgba(253, 241, 214, 0.3), rgba(250, 179, 135, 0.4), rgba(253, 241, 214, 0.3));
            background-size: 200% 100%;
        }
        #submit:hover {
            animation: gradientMove 0.5s ease;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }
        @keyframes gradientMove {
            0% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        #cont {
            background: rgba(49, 50, 68, 0.5);
            backdrop-filter: blur(16px);
            border-radius: 15px;
            width: 90%;
            max-width: 500px;
            padding: 15px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        table {
            margin: 10px auto;
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            border: 1px solid rgba(180, 190, 254, 0.6);
            border-radius: 8px;
        }
        td {
            padding: 8px 5px;
            border: 1px solid rgba(180, 190, 254, 0.3);
        }
        tr:hover {
            background: rgba(180, 190, 254, 0.1);
            box-shadow: 0 0 10px rgba(180, 190, 254, 0.2) inset;
            transition: all 0.3s ease;
        }
        input[type="number"] {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 5px;
            padding: 5px;
            color: #cdd6f4;
            width: 60px;
            text-align: center;
        }
        .divider {
            height: 1px;
            background: linear-gradient(to right, transparent, rgba(245, 224, 220, 0.5), transparent);
            margin: 5px 0;
        }
        .recipt {
            color: #b4befe;
            font-size: 14px;
            line-height: 1.4;
        }
        .result-section {
            background: rgba(49, 50, 68, 0.3);
            border-radius: 10px;
            padding: 12px;
            margin-top: 10px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body>
    <img src="service.jpg" alt="Service Image"/>
    <div id="cont">
        <h1 class="title">Welcome to Patankar Auto Parts</h1>
        <form method="post" action="PHPLab.php">
        <table>
            <tr class="header">
                <td>Item</td>
                <td>Quantity</td>
                <td>Price</td>
            </tr>
            <tr>
                <td colspan="3"><div class="divider"></div></td>
            </tr>
            <tr>
                <td>Tires</td>
                <td><input type="number" max="999" name="tire" min="0"/></td>
                <td>$75.56</td>
            </tr>
            <tr>
                <td>Oil</td>
                <td><input type="number" max="999" name="oil" min="0"/></td>
                <td>$25.89</td>
            </tr>
            <tr>
                <td>Spark Plug</td>
                <td><input type="number" max="999" name="plug" min="0"/></td>
                <td>$49.99</td>
            </tr>
        </table>
        <input type="submit" id="submit" value="Purchase"/>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tire = isset($_POST['tire']) && $_POST['tire'] !== '' ? (int)$_POST['tire'] : 0;
            $oil = isset($_POST['oil']) && $_POST['oil'] !== '' ? (int)$_POST['oil'] : 0;
            $plug = isset($_POST['plug']) && $_POST['plug'] !== '' ? (int)$_POST['plug'] : 0;

            echo '<div class="result-section">';
            if ($tire == 0 && $oil == 0 && $plug == 0) {
                echo "<h2 style='color: #f38ba8;'>You didn't buy anything</h2>";
            } else if ($tire > 4) {
                echo "<h2 style='color: #f38ba8;'>You can only buy 4 tires</h2>";
            } else {
                $total = ($tire*75.56)+($oil*25.89)+($plug*49.99);
                echo "<span class='recipt'>Items Ordered: " . ($tire+$oil+$plug) . "</span><br>";
                echo "<span class='recipt'># Tires: " . $tire . "</span><br>";
                echo "<span class='recipt'># Oil: " . $oil . "</span><br>";
                echo "<span class='recipt'># Spark Plugs: " . $plug . "</span><br>";
                echo "<div class='divider'></div>";
                echo "<span class='recipt'>Subtotal: $" . number_format($total, 2) . "</span><br>";
                echo "<span class='recipt'>Total Including Tax: $" . number_format($total*1.1, 2) . "</span><br>";
            }
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>
