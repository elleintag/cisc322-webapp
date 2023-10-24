<?php   
    $servername = "localhost";
    $username = "root";
    $dbname = "restaurantdb";
    $conn = mysqli_connect($servername, $username, '', $dbname);
    if (!$conn) {
        die("Connection to database failed." . mysqli_connect_error());
    }

    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $address = $_POST['address'];

        // Check this to match sql in database
        $sql = "SELECT * FROM customers WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // Customer already exists
            echo "Customer with email $email already exists in the database.";
        } else {
            // Customer doesn't exist, so insert into the database
            $sql = "INSERT INTO customers (first_name, last_name, email, phone_number, address) VALUES ('$first_name', '$last_name', '$email', '$phone_number', '$address')";
            if (mysqli_query($conn, $sql)) {
                // Customer added successfully, so create an account with $5.00 credit
                $customer_id = mysqli_insert_id($conn);
                $sql = "INSERT INTO accounts (customer_id, balance) VALUES ($customer_id, 5.00)";
                mysqli_query($conn, $sql);
                echo "Customer added successfully.";
            } else {
                echo "Error adding customer: " . mysqli_error($conn);
            }
        }
    }

    // Close the database connection
    mysqli_close($conn);
?>
