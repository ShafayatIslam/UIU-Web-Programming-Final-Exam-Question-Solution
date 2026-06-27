<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Party Calculator</title>
    <link rel="stylesheet" href="calculator.css">
</head>
<body>
    <div class="header">
        <h1>Pizza Calculator</h1>
    </div>
    <div class="container">
        <div class="pizza-form">
            <div class="form-header">
                <h3>Fill the form</h4>
            </div>
            <form method="post">
                Number of Students:
                <input type="number" name="students" required><br><br>
                Slices Per Student:
                <input type="number" name="slicesPerStudent" required><br><br>
                Slices Per Pizza:
                <input type="number" name="slicesPerPizza" required><br><br>
                <div class="form-btn">
                    <button type="submit" name="calculate">Calculate</button>
                </div>
            </form>
        </div>

        <div class="result">
            <div class="result-header">
                <h3>Result</h3>
            </div>
            <?php
                function calculatePizza($students, $slicesPerStudent, $slicesPerPizza){
                    $pizzaPrice = 1050;
                    $slicePrice = $pizzaPrice / $slicesPerPizza;
                    $slicesNeeded = $students * $slicesPerStudent;
                    $totalPizzas = ceil(($students * $slicesPerStudent) / $slicesPerPizza);
                    $totalSlices = $totalPizzas * $slicesPerPizza;
                    $leftoverSlices = 0;
                    $wastedMoney = 0;

                    if($totalSlices > $slicesNeeded){
                        $leftoverSlices = $totalSlices - $slicesNeeded;
                        $wastedMoney = $leftoverSlices * $slicePrice;
                    }

                    echo "<p>Total Pizzas: ".$totalPizzas."</p><br><br>";
                    echo "<p>Leftover Slices: ".$leftoverSlices."</p><br><br>";
                    echo "<p>Wasted Money (BDT): ".$wastedMoney."</p><br>";
                }

                if(isset($_POST["calculate"])){
                    $students = $_POST["students"];
                    $slicesPerStudent = $_POST["slicesPerStudent"];
                    $slicesPerPizza = $_POST["slicesPerPizza"];

                    calculatePizza($students, $slicesPerStudent, $slicesPerPizza);
                }
            ?>
        </div>
    </div>
</body>
</html>