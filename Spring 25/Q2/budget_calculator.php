<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venue Booking Budget Calculator</title>
</head>
<body>
    <h2>Venue Booking Budget Calculator</h2>
    <form method="post">
        Attendees:
        <input type="number" name="attendees"><br><br>
        Cost per person:
        <input type="number" name="cost_per_person"><br><br>
        Venue capacity:
        <input type="number" name="venue_capacity"><br><br>
        <button type="submit" name="btn">Calculate</button>
    </form>

    <div>
        <?php
            function calculateVenue($attendees, $costPerPerson, $venueCapacity){
                $totalVenue = ceil($attendees / $venueCapacity);
                $totalSeats = $totalVenue * $venueCapacity;

                $emptySeats = 0;
                if($totalSeats > $attendees){
                    $emptySeats = $totalSeats - $attendees;
                }
                
                $wastedMoney = $emptySeats * $costPerPerson;

                echo "<h3>Result:</h3>";
                echo "<p>Total Venues: ".$totalVenue."</p><br>";
                echo "<p>Empty Seats: ".$emptySeats."</p><br>";
                echo "<p>Wasted Money (BDT): ".$wastedMoney."</p>";
            }

            if(isset($_POST["btn"])){
                calculateVenue($_POST["attendees"], $_POST["cost_per_person"], $_POST["venue_capacity"]);
            }
        ?>
    </div>
</body>
</html>