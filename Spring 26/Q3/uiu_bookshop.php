<?php
    $conn = new mysqli("localhost", "root", "", "");

    $conn->query("CREATE DATABASE IF NOT EXISTS uiu_bookshop");
    $conn->query("USE uiu_bookshop");

    $conn->query("CREATE TABLE IF NOT EXISTS book_info(
    BookID INT PRIMARY KEY,
    BookTitle VARCHAR(100),
    Author VARCHAR(100),
    Category VARCHAR(100),
    Price INT,
    Stock INT
    )");

    $conn->query("INSERT IGNORE INTO 
    book_info VALUES
    (1, 'Web Basic', 'John Smith', 'Programming', 450, 10),
    (2, 'Database Guide', 'Alice Roy', 'Programming', 550, 8),
    (3, 'English Grammer', 'Mary Khan', 'Language', 300, 15),
    (4, 'Business Math', 'David Lee', 'Business', 400, 12),
    (5, 'Python Mastery', 'Sara Ahmed', 'Programming', 600, 5),
    (6, 'French Made Easy', 'Paul Costa', 'Language', 350, 7)
    ");

    //Query 1
    echo "<h3>Query-1 result: All books from Programming category</h3>";

    $res = $conn->query("SELECT BookTitle from book_info WHERE Category = 'Programming' ORDER BY Price DESC");

    while($row = $res->fetch_assoc()){
        echo $row['BookTitle']."<br>";
    }

    //Query 2
    echo "<h3>Query-2 result: </h3>";

    $res = $conn->query("SELECT BookTitle, Author, Price FROM book_info WHERE Price > 400 AND Category = 'Programming'");

    while($row = $res->fetch_assoc()){
        echo "Book title: ".$row['BookTitle']." | Author: ".$row['Author']." | Price: ".$row['Price']."<br>";
    }

    //Query 3
    echo "<h3>Query-3 result: </h3>";

    $res = $conn->query("SELECT Category, sum(Stock) AS totalBook FROM book_info GROUP BY Category");

    while($row = $res->fetch_assoc()){
        echo "Category: ".$row['Category']." | Total books: ".$row['totalBook']."<br>";
    }

    //Query 4
    echo "<h3>Query-4 result: </h3>";

    $res = $conn->query("SELECT (Price * Stock) AS stockPrice FROM book_info");

    $total = 0;
    while($row = $res->fetch_assoc()){
        $total += $row['stockPrice'];
    }
    echo "Total net worth of the entire bookshop: ".$total;

    //Query 5
    $conn->query("UPDATE book_info
    SET Price = Price - (Price * 0.1) 
    WHERE Category = 'Language'");

    echo "<h3>Query-5 result: </h3>";
    $res = $conn->query("SELECT BookTitle, Price FROM book_info WHERE Category = 'Language'");

    while($row = $res->fetch_assoc()){
        echo "Book Title: ".$row['BookTitle']." | Updated Price: ".$row['Price']."<br>";
    }
?>