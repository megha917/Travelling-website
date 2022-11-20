
<?php

$insert = false;

// set connection variables

if(isset($_POST['name'])){
$_SERVER = "localhost";
$username = "root";
$password ="";

// Create a database connection
$con = mysqli_connect($_SERVER, $username, $password);

// Check for connection success
if(!$con){
    die("Connection to this database failed due to " .mysqli_connect_error());
}
// echo "Success connecting to the database"

// Collect post variables
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];
$sql = "INSERT INTO `nainital_trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `DT`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

// echo $sql;

// Execute the query

if($con -> query($sql) == TRUE){

    // echo "Successfully Inserted";

    // Flag for successful insertion
    $insert = true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}

// Close the database connection
$con -> close();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
</head>
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">

<link rel="stylesheet" href="style_1.css">
<body>
    <img class="bg" src="bg.jpeg" alt="Nainital">
    <div class="container">
        <h1>Welcome to Cat Agency Nainital Trip form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>

        <?php

        $insert = false;
        
        if
            ($insert == true){

        echo "<p> Thanks for submitting your form. We are happy to see you coming for the Nainital Trip. </p>";

        }
        ?>

        <form action="index.php" method="post">

            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            
            <button class="btn">Submit</button>
            


        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>