<?php
require_once '../../../common/includes/dbconnect.php';
var_dump($_POST);
$id = NULL;
$isbn = $_POST['isbn'];
$title = $_POST['title'];
$year = $_POST['year'];
$description = $_POST['description'];
$price = $_POST['price'];
$publisher = $_POST['publisher'];
$date_created = date('Y-m-d G:i:s');

$image = "";
$flag = "";

if(!empty($_FILES['cover']['name'])){
    $filename = $_FILES['cover']['name'];
    $destination = '../../uploads' . $filename;
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    
    $file = $_FILES['cover']['tmp_name'];
    $size = $_FILES['cover']['size'];
    
    if(!in_array($extension, ['jpeg', 'jpg','png'])){
        $flag = 1;
    } elseif ($size > 1000000) {
        $flag = 2;
    } else {
        if(move_uploaded_file($file, $destination)) {
           $image = $filename; 
        } else {
            $flag = 3;
        }
    }
}

$result = "";
if(($image == "" && $flag == "") || ($image != "" && $flag == "" )){
$stmp = $conn->prepare('INSERT INTO books VALUES(?,?,?,?,?,?,?,?,?)');
$stmp->bind_param('isssssdis', $id, $isbn, $title, $year, $description, $image, $price, $publisher, $date_created);
$result = $stmp->execute();    
}

$last_book_id = "";
if($result) {
    $last_book_id = $conn->insert_id; //връща последно качено id
}


if($last_book_id != "" && $_POST ['authors']) {
//    $query = "";
//    foreach ($_POST['authors'] as $author){
//       $query .= "('$last_book_id', '$author'),";
//    }
//    $query = "INSERT INTO book_author(book_id, author_id) VALUES " .trim($query, ',');
//            $result = $conn->query($query);
    $data = array();
    foreach($_POST['authors'] as $author) {
        $data[] = $author;
    }
    $stmt = $conn->prepare("INSERT INTO book_author(book_id, author_id) VALUES (?,?)");
    $conn->begin_transaction();        
    
    foreach($data as $row) {
        $stmt->bind_param("ii", $last_book_id, $row);
        $stmt->execute();
    }
    $conn->commit();
}

if($last_book_id != "" && $_POST['categories']) {
//    $query = "";
//    foreach ($_POST['categories'] as $category){
//       $query .= "('$last_book_id', '$category'),";
//    }
//    $query = "INSERT INTO book_category(book_id, category_id) VALUES " .trim($query, ',');
//            $result = $conn->query($query);
//}

    $data = array();
    foreach($_POST['categories'] as $categories) {
        $data[] = $author;
    }
    $stmt = $conn->prepare("INSERT INTO book_category(book_id, category_id) VALUES (?,?)");
    $conn->begin_transaction();        
    
    foreach($data as $row) {
        $stmt->bind_param("ii", $last_book_id, $row);
        $stmt->execute();
    }
    $conn->commit();
}
if($result) {
    echo json_encode(["statusCode" => 200]);
} else {
    echo json_encode([
        "statusCode" => 201,
        "flag" => $flag,
        ]);    
}