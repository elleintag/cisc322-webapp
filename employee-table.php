<?php   
    $servername = "localhost";
    $username = "root";
    $dbname = "restaurantdb";
    $conn = mysqli_connect($servername, $username, '', $dbname);
    if (!$conn) {
        die("Connection to database failed." . mysqli_connect_error());
    }

    // Define the SELECT query to retrieve all employees
    $sql = "SELECT * FROM employees";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if any rows were returned
    if (mysqli_num_rows($result) > 0) {
    // Output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "ID: " . $row["id"]. " - Name: " . $row["name"]. " - Email: " . $row["email"]. "<br>";
        }
    } else {
        echo "0 results";
    }

    // Close the database connection
    mysqli_close($conn);
?>