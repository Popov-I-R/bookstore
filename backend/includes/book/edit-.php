<?php

require_once '../../../common/includes/dbconnect.php';

if (isset($_POST['save'])) {



$id = $_POST['id'];
$isbn = $_POST['isbn'];
$title = $_POST['title'];
// $category = $_POST['categories'];
$year = $_POST['year'];
$description = $_POST['description'];
// $image = $_FILES['image'];
$price = $_POST['price'];
$publisher = $_POST['publisher'];

$query = "UPDATE books SET isbn='$isbn', title='$title', yeah='$year', description='$description, price='$price' ";
$result = $conn->query($query);

$image = "";
$flag = "";

if (!empty($_FILES['cover']['name'])) {
    $filename = $_FILES['cover']['name'];
    $destination = '../../uploads/' . $filename;
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

//    $destination = $_SERVER['DOCUMENT_ROOT'] . "/backend/uploads/" . $filename;
   
    $file = $_FILES['cover']['tmp_name'];
    $size = $_FILES['cover']['size'];
    if (!in_array($extension, ['jpeg', 'jpg', 'png'])) {
        $flag = 1;
    } elseif ($size > 2000000) {
        $flag = 2;
    } else {
        if (move_uploaded_file($file, $destination)) {
            $image = $filename;
        } else {
            $flag = 3;
        }
    }
}

$result = "";
if (($image == "" && $flag == "") || ($image != "" && $flag == "" )) {
    $stmp = $conn->prepare('UPDATE books SET isbn=?, title=?, year=?, description=?, image=?, price=?,publisher_id=? WHERE id=?');
    $stmp->bind_param('sssssdii', $isbn, $title, $year, $description, $image, $price, $publisher, $id);
    $result = $stmp->execute();
}

$last_book_id = "";
if ($result) {
    $last_book_id = $conn->insert_id; //връща последно качено id
}


if ($last_book_id != "" && isset($_POST ['authors'])) {
//    $query = "";
//    foreach ($_POST['authors'] as $author){
//       $query .= "('$last_book_id', '$author'),";
//    }
//    $query = "INSERT INTO book_author(book_id, author_id) VALUES " .trim($query, ',');
//    $result = $conn->query($query);
    $data = array();
    foreach ($_POST['authors'] as $author) {
        $data[] = $author;
    }
    $stmt = $conn->prepare("UPDATE book_author SET author_id=? WHERE book_id=?");
    $conn->begin_transaction();

    foreach ($data as $row) {
        $stmt->bind_param("ii", $row, $last_book_id) ;
        $stmt->execute();
    }
    $conn->commit();
}

if ($last_book_id != "" && isset($_POST['categories'])) {
    $query = "";
    foreach ($_POST['categories'] as $category){
       $query .= "('$last_book_id', '$category'),";
    }
//    $query = "INSERT INTO book_category(book_id, category_id) VALUES " .trim($query, ',');
//            $result = $conn->query($query);
//}

    $data = array();
    foreach ($_POST['categories'] as $categories) {
        $data[] = $categories;
    }
    $stmt = $conn->prepare("UPDATE book_category SET book_id=?, category_id=? WHERE id=?)");
    $conn->begin_transaction();
};
//    foreach ($data as $row) {
//        $stmt->bind_param("ii", $last_book_id, $row);
//        $stmt->execute();
//    }
//    $conn->commit();
//};



//
//if ($result) {
//    echo json_encode(["statusCode" => 200]);
//} else {
//    echo json_encode([
//        "statusCode" => 201,
//        "flag" => $flag,
//    ]);
//}