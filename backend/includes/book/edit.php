<?php

require_once '../../../common/includes/dbconnect.php';
if (isset($_POST['id'])) {

    $id = $_POST['id'];
    $isbn = $_POST['isbn'];
    $title = $_POST['title'];
    $year = $_POST['year'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $publisher = $_POST['publisher'];

    $image = "";
    $flag = "";

    if (!empty($_FILES['cover']['name'])) {
        $filename = $_FILES['cover']['name'];
        $destination = '../../uploads/' . $filename;
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

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
        $last_book_id = $id; //връща последно качено id
    }

    if ($last_book_id != "" && isset($_POST ['authors'])) {

        $data = array();
        foreach ($_POST['authors'] as $author) {
            $data[] = $author;
        }
        $stmt = $conn->prepare("UPDATE book_author SET author_id=? WHERE book_id=?");
        $conn->begin_transaction();

        foreach ($data as $row) {
            $stmt->bind_param("ii", $row, $last_book_id);
            $stmt->execute();
        }
        $conn->commit();
    }

    if ($last_book_id != "" && isset($_POST['categories'])) {
        $query = "";
        foreach ($_POST['categories'] as $category) {
            $query .= "('$last_book_id', '$category'),";
        } 

        $data = array();
        foreach ($_POST['categories'] as $categories) {
            $data[] = $categories;
        }
        $stmt = $conn->prepare("UPDATE book_category SET category_id=? WHERE book_id=?");
        $conn->begin_transaction();
        foreach ($data as $row) {
            $stmt->bind_param("si", $row, $last_book_id);
            $stmt->execute();
        }
        $conn->commit();
    }

    if ($result) {
        echo json_encode(["statusCode" => 200]);
    } else {
        echo json_encode([
            "statusCode" => 201,
            "flag" => $flag,
        ]);
    }
} 