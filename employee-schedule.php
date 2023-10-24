
<?php   
    $servername = "localhost";
    $username = "root";
    $dbname = "restaurantdb";
    $conn = mysqli_connect($servername, $username, '', $dbname);
    if (!$conn) {
        die("Connection to database failed." . mysqli_connect_error());
    }

    // Check this over
    $sql = "SELECT * FROM employees";
    $result = mysqli_query($conn, $sql);

    // Check if any employees were found
    if (mysqli_num_rows($result) > 0) {
        // Display a dropdown list of all employees
        echo "<form method='post'>";
        echo "<label for='employee'>Select an employee:</label>";
        echo "<select id='employee' name='employee'>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
        }
        echo "</select>";
        echo "<input type='submit' value='Show Schedule'>";
        echo "</form>";

        // Check if a specific employee was selected
        if (isset($_POST['employee'])) {
            $employee_id = $_POST['employee'];

            // Retrieve the schedule for the selected employee
            $sql = "SELECT * FROM schedule WHERE employee_id = $employee_id AND DAYOFWEEK(date) >= 2 AND DAYOFWEEK(date) <= 6";
            $result = mysqli_query($conn, $sql);

            // Check if any schedule was found
            if (mysqli_num_rows($result) > 0) {
                // Output the schedule as an HTML table
                echo "<table>";
                echo "<tr><th>Date</th><th>Start Time</th><th>End Time</th></tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><td>" . $row['date'] . "</td><td>" . $row['start_time'] . "</td><td>" . $row['end_time'] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "No schedule found for the selected employee.";
            }
        }
    } else {
        echo "No employees found in the database.";
    }

    // Close the database connection
    mysqli_close($conn);
?>