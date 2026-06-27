<?php
    $conn = new mysqli("localhost", "root", "", "");

    //Create Database
    $conn->query("CREATE DATABASE IF NOT EXISTS uiuweb_final");
    $conn->query("USE uiuweb_final");

    //Create Table
    $conn->query("CREATE TABLE IF NOT EXISTS student_final(
    StudentID INT PRIMARY KEY,
    StudentName VARCHAR(100),
    CourseID INT,
    CourseTitle VARCHAR(100),
    GRADE INT,
    LetterGrade CHAR(1)
    )");
    
    //Insert Data
    $conn->query("INSERT IGNORE INTO 
    student_final VALUES
    (1,'Karim Uddin',101,'Web Programming',85,'B'),
    (2,'Rahim Ahmed',101,'Web Programming',92,'A'),
    (3,'Jasim Hossain',102,'Project Management',78,'C'),
    (4,'Jasica Ahmed',101,'Web Programming',65,'D'),
    (5,'Fariya Karim',102,'Project Management',95,'A'),
    (6,'Niassoh Dihan',103,'System Analysis and Design',80,'B')
    ");

    //Query 1
    echo "<h3>Query-1 result:</h3>";

    $res = $conn->query("SELECT LetterGrade, count(*) AS totalStudent
    FROM student_final
    GROUP BY LetterGrade");

    while($row = $res->fetch_assoc()){
        echo $row['LetterGrade']." : ".$row['totalStudent']."<br>";
    }

    //Query 2
    $conn->query("UPDATE student_final 
    SET LetterGrade = 'C'
    WHERE GRADE < 75 
    AND LetterGrade != 'D'");

    //Query 3
    $conn->query("UPDATE student_final
    SET GRADE = GRADE + 5
    WHERE GRADE > 80
    AND GRADE + 5 <= 90");

    //Query 4
    echo "<h3>Query-4 result:</h3>";

    $res = $conn->query("SELECT CourseTitle, count(*) AS totalStudent
    FROM student_final 
    GROUP BY CourseTitle
    ORDER BY totalStudent DESC");

    while($row = $res->fetch_assoc()){
        echo $row['CourseTitle']." : ".$row['totalStudent']."<br>";
    }

    $conn->close();
?>