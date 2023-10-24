
<?php   
    $servername = "localhost";
    $username = "root";
    $dbname = "restaurantdb";
    $conn = mysqli_connect($servername, $username, '', $dbname);
    if (!$conn) {
        die("Connection to database failed." . mysqli_connect_error());
    }

    // Check this query to match the database
    $sql = "SELECT DATE(orderDate) AS orderDate, COUNT(*) AS orderCount 
            FROM orderPlacement 
            GROUP BY DATE(orderDate)";
    $result = mysqli_query($conn, $sql);

    // Check if any orders were found
    if (mysqli_num_rows($result) > 0) {
        // Output the results as an HTML table
        echo "<table>";
        echo "<tr><th>Date</th><th>Number of Orders</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row['orderDate'] . "</td><td>" . $row['orderCount'] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No orders found.";
    }

    // Close the database connection
    mysqli_close($conn);
?>