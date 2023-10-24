<!-- page requirements:
- user should be able to choose an employee + show their schedule
    - all employee names should be displayed in a list for user to choose someone
    - schedule shown should only show monday to friday (NOT SAT/SUN) -->

<!DOCTYPE html>
<html>
    <head>
        <title>Employees</title>
    </head>
    <p> 
        Here is a list of the employees in our database!
        To learn more about a specific employee (i.e. their schedule), select them below:
    </p>

    <?php
        // using the employee selected, show their schedule in table format
    ?>

    <form method="post" action="">
        <label for="employee">Choose an employee:</label>
        <select name="employee" id="employee">
            <!-- should list all employees as options here, doing this dynamically with php below -->

            **look this over**
            <!-- <?php while ($row = $result->fetch_assoc()) { ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
            <?php } ?> -->

        </select>
    </form>
    
</html>
