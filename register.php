<?php

//_POST super global array 
$name = $_POST['name'];
$email = $_POST['email'];
$password= $_POST['password'];
$encrypted = md5($_POST['password']);
$confirmPassword = $_POST['confirmPassword'];



if($name===""|| $email==="" || $password===""){
    die('Pls fill empty data'); 
}

if ($password !== $confirmPassword) {
    die('Password and Confirm password should match!');   
 }



$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "project1_form";

//create object to open connection with db, OOP style
$conn = new mysqli($servername, $username, $dbpassword, $dbname);

//check the connection
if($conn->connect_error){
    die("connection Failed".$conn->connect_error);
    // echo 'Database Connection error';
}
//prepared statment to access database in a safe way avoiding any sql injection or wtvr that means
$sql=("SELECT email FROM user WHERE email=?" );
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$emailQuery = $result->fetch_assoc();
if($emailQuery==""){

    echo 'Registration was successful ya bro';

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

else {

    echo 'Email Already Exits ya man ';

}



$stmt = $conn->prepare("INSERT INTO user (name, email, password) 
VALUES (?, ?, ?)");

$stmt->bind_param("sss", $name, $email, $encrypted);

if($stmt->execute()){
    echo 'success';
}
else echo 'faliure';
?>