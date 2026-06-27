<?php
    $conn = new mysqli("localhost", "root", "", "");

    //Create Database
    $conn->query("CREATE DATABASE IF NOT EXISTS uiutech_final");
    $conn->query("USE uiutech_final");

    //Create Table
    $conn->query("CREATE TABLE IF NOT EXISTS employee_final(
    EmployeeID INT PRIMARY KEY,
    EmployeeName VARCHAR(100),
    DepartmentID INT,
    DepartmentName VARCHAR(100),
    Salary INT,
    PerformanceRating CHAR(1)
    )");

    //Insert Data
    $conn->query("INSERT IGNORE INTO 
    employee_final VALUES
    (1, 'Arif Rahman', 201, 'Software Development', 45000, 'B'),
    (2, 'Marium Khan', 201, 'Software Development', 52000, 'A'),
    (3, 'Sabbir Hossain', 202, 'Quality Assurance', 38000, 'C'),
    (4, 'Samira Begum', 203, 'UI/UX Design', 42000, 'B')
    ");

    //Query 1
    echo "<h3>Query-1 result:</h3>";

    $res = $conn->query("SELECT PerformanceRating, count(*) AS totalEmp
    FROM employee_final
    GROUP BY PerformanceRating");

    while($row = $res->fetch_assoc()){
        echo $row['PerformanceRating']." : ".$row['totalEmp']."<br>";
    }

    //Query 2
    $conn->query("UPDATE employee_final
    SET PerformanceRating = 'C' 
    WHERE Salary < 40000 
    AND PerformanceRating != 'D'");

    //Query 3
    $conn->query("UPDATE employee_final
    SET Salary = Salary + 5000
    WHERE Salary > 50000 
    AND Salary + 5000 < 60000");
?>