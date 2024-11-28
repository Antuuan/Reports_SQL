<!DOCTYPE html>
<html>
<title>Add pupil to class</title>
    
</head>
<body>
    <form action="add_pupil.php" method="post">
    <select name="student">
    <?php
        include_once("connection.php");
        $stmt = $conn->prepare("SELECT * FROM tbl_users WHERE role=0 ORDER BY surname ASC;");
        $stmt->execute();

        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            #print_r($row);
            echo("<option value=".$row["user_id"].">".$row["surname"].", ".$row["firstname"]."</option>");
        }
    
        include_once("connection.php");
        $stmt = $conn->prepare("SELECT * FROM tbl_subjects WHERE role=0 ORDER BY subjectname ASC;");
        $stmt->execute();

        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            #print_r($row);
            echo("<option value=".$row["subjectID"].">".$row["subjectname"].", ".$row["teacher"]."</option>");
        }
    ?>
    </select>
        <input type="submit" value="Add pupil to subject">
    </form>

</body>
</html>