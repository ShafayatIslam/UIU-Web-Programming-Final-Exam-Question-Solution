<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        Mission distance per meters:
        <input type="number" name="missionDist"><br><br>
        Energy consumption per meter:
        <input type="number" name="eneryConsumption"><br><br>
        Capacity of one battery:
        <input type="number" name="capacity"><br><br>
        <button type="submit" name="btn">Calculate</button>
    </form>

    <div>
        <?php
            function calculateBattery($distance, $energyConsumption, $batteryCapacity){
                $energyRequired = $distance * $energyConsumption;
                $batteryNeeded = ceil($energyRequired / $batteryCapacity);
                $totalEnergy = $batteryCapacity * $batteryNeeded;
                
                $unusedEnergy = 0;
                if($totalEnergy > $energyRequired){
                    $unusedEnergy = $totalEnergy - $energyRequired;
                }

                $status = "";
                if($unusedEnergy <= ($totalEnergy * 0.1)){
                    $status = "Efficient";
                }else if($unusedEnergy > ($totalEnergy * 0.1) && $unusedEnergy <= ($totalEnergy * 0.25)){
                    $status = "Acceptable";
                }else $status = "Wasteful";

                echo "<h3>Result:</h3>";
                echo "<p>Total energy required: ".$energyRequired."<p>";
                echo "<p>Battery Modules: ".$batteryNeeded."<p>";
                echo "<p>Unused energy: ".$unusedEnergy."<p>";
                echo "<p>Status: ".$status."<p>";
            }

            if(isset($_POST['btn'])){
                calculateBattery($_POST['missionDist'], $_POST['eneryConsumption'], $_POST['capacity']);
            }
        ?>
    </div>
</body>
</html>