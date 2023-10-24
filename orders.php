<!-- page requirements:
- table that shows dates on which orders were placed + number of orders on that date
- list all orders made on a particular date
    - user is asked for a date
    - all data for orders on that date is displayed in tabular form! -->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Orders</title>
        <link rel="stylesheet" href="orders-style.css"/>
    </head>
    <body>
        <!-- Navigation Header -->
        <div class="nav-container">
            <div class="wrapper">
                <nav>
                    <!-- Restaurant Database -->
                    <div class="restaurantdb">
                        <a href="restaurant.html">Restaurant Database</a>
                    </div>

                    <!-- Navigation Links -->
                    <ul class="nav-items">
                        <li><a href = "orders.html">Orders</a></li>
                        <li><a href = "customers.html">Customers</a></li>
                        <li><a href = "employees.html" >Employees</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="header-container">
            <div class="wrapper">
                <div class="hero-content">
                    <!-- Text -->
                    <h1 class="orders">Orders</h1>

                    <div class="order-database">
                        Our order database
                    </div>

                    <!-- Table from database -->
                    <?php    
                        $servername = "localhost";
                        $username = "root";
                        $dbname = "restaurantdb";
                        $conn = mysqli_connect($servername, $username, '', $dbname);
                        if (!$conn) {
                            die("Connection to database failed." . mysqli_connect_error());
                        }
                    
                        // Check this query to match the database
                        $sql = "SELECT DATE(orderDate) AS orderDate, COUNT(*) AS orderCount FROM orderPlacement GROUP BY DATE(orderDate)";
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
            
                    <!-- Table from user input -->
                    
            
                    <!-- Information Text -->
                    <p class="information">To learn more about orders made on a specific date, please input a date below:</p>
                    <!-- Form to get date from user -->
                    <form class="form" method="post">
                        <label for="date">Enter a date:</label>
                        <input type="date" id="date" name="date">
                        <input class="submit-btn" type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>    
    </body>
</html>

