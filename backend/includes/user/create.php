<?php

require_once '../../../common/includes/dbconnect.php'; // свързваме базата данни така

//задаваме данните си в променливи/взимаме ги с POST, защото сме свързали с базата:

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = 'user'; // задаваме роля, винаги да е user
$date_created = date('Y-m-d G:i:s');


//$query = "SELECT * FROM users WHERE email = '$email'"; // Така Проверяваме има ли такъв съществуващщ мейл за да избегнем повтаряне - ТОЗИ НАЧИН НЕ Е ПРЕПОРЪЧИТЕЛЕН за ползване в практиката!!!
if($stmt = $conn->prepare('SELECT * FROM users WHERE email = ?')) {  // Така Проверяваме има ли такъв съществуващщ мейл за да избегнем повтаряне
    $stmt->bind_param('s', $email);//какво се очаква С - стринг и от къде да проверим
    // със STMT е препоръчителният начин (няма знач. как точно ще се казва)
    $stmt->execute(); //execute-ваме резултата
    $stmt->store_result(); // Слагаме във временната променлива
    if($stmt->num_rows>0) { // Проверява дали мейла не го има в базата данни.
        echo json_encode(["statusCode" => 201]);
    } else { // Ако няма рег потребители, то тогава ще го регистрираме и тази заявки insertва в таблицаата юзерс
        if($stmt = $conn->prepare('INSERT INTO users(username, password, email, role, created_at) VALUES (?,?,?,?,?)')) {
            $password = password_hash($password, PASSWORD_DEFAULT); // Хешираме паролата за да не може да се хаква
            $stmt->bind_param('sssss', $username, $password, $email, $role, $date_created);
           if( $stmt->execute()) {
           echo json_encode(["statusCode"=>200]);
           }
        } else { // този елсе е ако заявката не се е изпълнила както трябва
            echo json_encode(["statusCode"=>202]);
        }
    } 
    $stmt->close();
} else {
    echo json_encode(["statusCode"=>202]);
}