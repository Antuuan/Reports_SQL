<?php

include_once("connection.php");
$statement=$conn->prepare("
DROP TABLE IF EXISTS tbl_users;
CREATE TABLE tbl_users
(UserID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
gender VARCHAR(1) NOT NULL,
surname VARCHAR(20) NOT NULL,
forename VARCHAR(20) NOT NULL,
password VARCHAR(20) NOT NULL,
house VARCHAR(20) NOT NULL,
year INT(2) NOT NULL,
role TINYINT(1))
");

$statement->execute();
$statement->closeCursor();

$statement=$conn->prepare("
DROP TABLE IF EXISTS tbl_subjects;
CREATE TABLE tbl_subjects
(subjectID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
subjectname VARCHAR(20) NOT NULL,
teacher VARCHAR(20) NOT NULL);
");

$statement->execute();
$statement->closeCursor();

$statement=$conn->prepare("
DROP TABLE IF EXISTS tbl_pupilstudies;
CREATE TABLE tbl_pupilstudies
(subjectid INT(4),
userid INT(4),
classposition INT(2),
classgrade CHAR(1),
exammark INT(2),
comment TEXT,
PRIMARY KEY(subjectid,userid));
");

$statement->execute();
$statement->closeCursor();

echo("<br>tbl_users created")

?>