<?php
// define('BASEPATH', true);	
require("connect.php");

if(isset($_POST['updatedata'])){
    try{
        $pdo_conn = new PDO( 'mysql:host=localhost;dbname=company', $database_username, $database_password );
        $pdo_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $id = $_POST['update_id'];

    $f_name = $_POST['firstname'];
    $s_name = $_POST['surname'];
    $email = $_POST['email'];

    $stmt = $pdo_conn->prepare("UPDATE staff set first_name='" . $_POST[ 'firstname' ] . "', surname='" . $_POST[ 'surname' ]. "', email='" . $_POST[ 'email' ]. "' where id=$id");
    $stmt->bindParam(':first_name',$f_name);
    $stmt->bindParam(':surname',$s_name);
    $stmt->bindParam(':email',$email);

        if ($stmt->execute()){
            // $message = 'Data updated';
            echo '<script>window.location.replace("index.php")</script>';

        }else{
            $error = "Error: ".$e->getMessage();
            echo '<script>alert("'.$error.'");</script>';
        }
    }catch(PDOException $e){
        $error = "Error: ".$e->getMessage();
        echo '<script>alert("'.$error.'");</script>';
    }
}

?>