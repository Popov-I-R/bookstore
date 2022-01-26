<?php
require_once '../../../common/includes/dbconnect.php';



if(isset($_POST['email']) && isset($_POST['password'])) {
    
session_start(); // Така стартираме сесия ?!? В случая сесия за успешно логнат потребител
    



$email = $_POST['email'];
$u_password = $_POST['password'];

    
    if($stmt = $conn->prepare('SELECT id, password FROM users WHERE email = ?')) {
        $stmt ->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
    }  
    if($stmt->num_rows>0) {
        $stmt->bind_result($id, $h_password);
        $stmt->fetch(); // Това прави възможността да може да се предадат стойности на променливи 
     
        
        if(password_verify($u_password, $h_password)) {
            $_SESSION['login_user'] = $id;//запаметяваме в сесията ид-то на юзър-а
            echo json_encode(['statusCode' =>200]);
        } else {
            echo json_encode(['statusCode' =>202]);
        }    
    }else {
        echo json_encode(['statusCode' =>201]);
    }
}