
<?php   
    $servername = "localhost";
    $username = "root";
    $dbname = "restaurantdb";
    $conn = mysqli_connect($servername, $username, '', $dbname);
    if (!$conn) {
        die("Connection to database failed." . mysqli_connect_error());
    }

    // Check this query to match the database
    $sql = "SELECT DATE(order_date) AS order_date, COUNT(*) AS order_count FROM orders GROUP BY DATE(order_date)";
    $result = mysqli_query($conn, $sql);

    // Check if any orders were found
    if (mysqli_num_rows($result) > 0) {
    // Output the results as an HTML table
    echo "<table>";
    echo "<tr><th>Date</th><th>Number of Orders</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row['order_date'] . "</td><td>" . $row['order_count'] . "</td></tr>";
    }
    echo "</table>";
    } else {
    echo "No orders found.";
    }

    // Close the database connection
    mysqli_close($conn);
?>