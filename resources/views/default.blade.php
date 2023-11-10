<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Card Distribution</title>
    </head>
    <body>
        <form method="get" action="">
            <label for="numberOfPeople">Number of People:</label>
            <input type="number" id="numberOfPeople" name="numberOfPeople" min="1">
            <button type="submit">Distribute Cards</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["numberOfPeople"])) {
            $numberOfPeople = (int)$_GET["numberOfPeople"];

            if ($numberOfPeople > 0) {
                // Generate and distribute cards
                if (!function_exists('generateAndDistributeCards')) {
                    function generateAndDistributeCards($numberOfPeople) {
                        $suits = ['S', 'H', 'D', 'C'];
                        $cards = [];

                        for ($i = 1; $i <= $numberOfPeople; $i++) {
                            foreach ($suits as $suit) {
                                for ($j = 1; $j <= 13; $j++) {
                                    $cards[$i][] = "$suit-" . ($j > 1 && $j <= 9 ? $j : ($j == 1 ? 'A' : ($j == 10 ? 'X' : ($j == 11 ? 'J' : ($j == 12 ? 'Q' : 'K')))));
                                }
                            }
                            shuffle($cards[$i]); // Shuffle the cards for each person
                        }

                        return $cards;
                    }
                }

                // Display the result
            echo "<p>";
            foreach (generateAndDistributeCards($numberOfPeople) as $person => $cards) {
                echo "$person: " . implode(', ', $cards) . "<br>";
            }
            echo "</p>";
            } else {
                echo "<p>Error: Input value does not exist or is invalid</p>";
            }
        }
        ?>
    </body>
</html>
