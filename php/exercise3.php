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
    <p id="title">My Array Exercises</p>

    <?php
        echo '<div class="exercise"><br>This is the first exercise.</div></br>';

        $weather = ["snow","wind","sunshine","clouds","rain","hail","sleet"];
        echo "We've seen all kinds of weather this month. At the beginning of the month, we had $weather[0] and $weather[1]. Then came $weather[2] with a few $weather[3] and some $weather[4]. At least we didn't get any $weather[5] or $weather[6]</br>";

        echo '<div class="exercise"><br>This is the second exercise.</div></br>';
        $cities = ["Tokyo", "Mexico City", "New York City", "Mumbai", "Seoul", "Shanghai", "Lagos",
        "Buenos Aires", "Cairo", "London"];
        print_r($cities);
        echo "</br></br>";
        var_dump($cities);
        echo "</br></br>";
        echo implode(", ", $cities);
        sort($cities);
        echo "<div style='width:13%;margin:auto;'><ul><li>" . implode("</li><li>", $cities) . "</li></ul></div>";
        array_push($cities, "Los Angeles", "Calcutta","Osaka","Beijing");
        sort($cities);
        echo "<div style='width:13%;margin:auto;'><ol><li>" . implode("</li><li>", $cities) . "</li></ol></div>";
/*hi*/
        echo "<div class='exercise'><br>This is the third exercise.</div></br>";
        $min = strlen($cities[0]);
        $max = strlen($cities[0]);
        $minCity = $cities[0];
        $maxCity = $cities[0];
        foreach ($cities as $city) {
            if (strlen($city) < $min) {
                $min = strlen($city);
                $minCity = $city;
            }
            if (strlen($city) > $max) {
                $max = strlen($city);
                $maxCity = $city;
            }
        }
        echo "The city with the most letters is <strong>$maxCity</strong> with $max letters.</br>";
        echo "The city with the least letters is <strong>$minCity</strong> with $min letters.</br>";

        echo "<div class='exercise'><br>This is the fourth exercise.</div></br>";
        $colors = ["#cba6f7","#eba0ac","#fab387","#a6e3a1","#89dceb"];
        echo "<table style='border-collapse: collapse; margin: 0 auto;'>";
        foreach ($colors as $color) {
            echo "<tr>";
            echo "<td style='border: 1px solid white; background-color: $color; width: 40%; height: 50px; text-align: center; color: white; font-weight: bold;'>$color</td>";
            echo "</tr>";
        }
        echo "</table>";

        echo "<div class='exercise'><br>This is the fifth exercise.</div></br>";
        $temperatures = [];
        for ($i = 0; $i < 50; $i++) {
            $temperatures[] = rand(40, 90);
        }

        $sum = array_sum($temperatures);
        $num_elements = count($temperatures);
        $average = $sum / $num_elements;
        $unique_temperatures = array_unique($temperatures);
        sort($unique_temperatures);

        echo "<div class='result'><strong>Average Temperature:</strong> " . number_format($average, 2) . "°F</div>";

        echo "<div class='result'><strong>Five Warmest Temperatures:</strong> ";
        echo implode(", ", array_slice($unique_temperatures, -5)) . "</div>";

        echo "<div class='result'><strong>Five Coolest Temperatures:</strong> ";
        echo implode(", ", array_slice($unique_temperatures, 0, 5)) . "</div>";
    ?>
</body>
</html>