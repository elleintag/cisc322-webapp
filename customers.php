<!-- page requirements:
- add a new customer to database
    - ask for all data from customer
    - make sure customer doesn't already exist in database
    - create account with in $5.00 credit -->

<!DOCTYPE html>
<html>
    <head>
        <title>Customers</title>
    </head>

    <p> Want to become one of our customers? Join our database today and receive $5.00 in credit!
        Enter your information below:
    </p>

    <?php
        // this processes the data submitted in the form!
        // make sure user doesn't leave any parts of the form blank
        // check if customer already exists using primary key, phone number
    ?>

    <!-- form to get customer info -->
    <form method="post" action="">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name"><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name"><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address"><br>

        <label for="phone_number">Phone Number:</label>
        <input type="tel" id="phone_number" name="phone_number"><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br>

        <input type="submit" value="Submit">
    </form>
  
</html>