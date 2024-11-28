<!DOCTYPE html>
<html>
<head>
    
    <title>Page title</title>
    
</head>
<body>
    
    <form action="add_users.php" method="POST">
    First name:<input type="text" name="firstname"><br>
    Last name:<input type="text" name="surname"><br>
    Password:<input type="password" name="password"><br>
    House:<input type="text" name="house"><br>
    Year:<input type="text" name="year"><br>
    <!--Creates a drop down list-->
    Gender:<select name="gender">
            <option value="M">Male</option>
            <option value="F">Female</option>
        </select>
    <br>
    <!--Next 3 lines create a radio button which we can use to select the user role-->
    <input type="radio" name="role" value="pupil" checked> Pupil<br>
    <input type="radio" name="role" value="teacher"> Teacher<br>
    <input type="radio" name="role" value="admin"> Admin<br>
    <input type="submit" value="add user">
    </form>

    <h3>Current Users</h3>

    <!-- printing the database -->
    <?php
        include_once("connection.php");
        $stmt = $conn->prepare("SELECT * FROM tbl_users;");

        $stmt->execute();

        // while loop to print each row
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            #print_r($row);
            echo($row["firstname"]." ".$row["surname"]."<br>");
        }
    ?>

</body>
</html>

