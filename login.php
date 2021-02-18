<?php
//mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
//_POST super global array 
// error_reporting(E_ERROR | E_PARSE);
$email = $_POST['loginEmail'];
$password = $_POST['loginPassword'];
$encrypted = md5($_POST['loginPassword']);
if ($email === "" || $password === "") {
    die('Pls fill empty fields');
}

$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "project1_form";

//create object to open connection with db, OOP style
$conn = new mysqli($servername, $username, $dbpassword, $dbname);

//check the connection
if ($conn->connect_error) {
    die("connection Failed" . $conn->connect_error);
    // echo 'Database Connection error';
}

$sql = ("SELECT email, password, name FROM user WHERE email=? AND password=?");
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $encrypted);
$stmt->execute();
$result = $stmt->get_result();
$emailQuery = $result->fetch_assoc();
if ($emailQuery["email"] === $email && $emailQuery["password"] === $encrypted) 
{
    echo 'Welcome ya ' . $emailQuery["name"];

    
    $sql = "SELECT * FROM department ";
    $departmentQuery = $conn->query($sql);
    
    
        
         echo "<table class='table'>";
        
        $max_rows = mysqli_num_rows($departmentQuery);
        
        for ($i = 0; $i < $max_rows; $i++)
         {
            $row = $departmentQuery->fetch_assoc();
            
            for ($j = 0; $j<1; $j++) {
                echo "<tr>";
                    echo "<td> Dept_Id:</td>";
                    echo "<td>" . $row["department_id"] . "</td>";
                 
                    echo "<td> name:</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td> Description:</td>";
                    echo "<td>" . $row["description"] . "</td>";
                
                echo "</tr>";
            }
        }
        echo "</table>";
    }
    else die ("Data doesn't match ya bro");
?>