<!DOCTYPE html>
<html>
<title>Subjects</title>
    
</head>
<body>
    <form action="add_subjects.php" method="post">
        Subject name:<input type="text" name="subjectname"><br>
        Teacher:<input type="text" name="teacher"><br>
    
        <input type="submit" value="Add Subject">
    </form>

    <!-- printing the database -->
    <?php
        include_once("connection.php");
        $stmt = $conn->prepare("SELECT * FROM tbl_subjects;");

        $stmt->execute();

        // while loop to print each row
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            #print_r($row);
            echo($row["subjectname"].", " .$row["teacher"]."<br>");
        }
    ?>
  
</body>
</html>