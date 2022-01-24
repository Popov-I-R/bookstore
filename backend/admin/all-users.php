<?php

require_once 'header.php'; 

$query = "SELECT * FROM users";
//$query = "SELECT books.*, authors.name FROM books INNER JOIN book_author ON books.id = book_author.book_id INNER JOIN authors ON authors.id = book_author.author_id";
$result = $conn->query($query);

if(!$result)
    die("Fatal error");
?>

<div class="page-content p-5" id="content">
    
    <h1>Всички потребители</h1>
    <table class="table">
        <thead>
             <tr>
                 <th scope="col">Име на потребител</th>
                 <th scope="col">E-mail</th>
                 <th scope="col">Създанен на</th>
             </tr>
        </thead>
        <tbody>
            <?php
            if($result->num_rows >0){
                while($row = $result->fetch_assoc()) { 
                    ?>
            <tr>
                <td><?php echo htmlspecialchars($row['username'])?></td>
                <td><?php echo htmlspecialchars($row['email'])?></td>
                <td><?php echo date("d.m.Y", strtotime($row['created_at']))?></td>
                <td>
                    <a href="<?php echo URLBASE ?>/backend/view-book.php?id=<?php echo $row['id']; ?>">Преглед</a>
                    <a href="<?php echo URLBASE ?>/backend/edit-book.php?id=<?php echo $row['id']; ?>">Редактиране</a>
                </td>
            </tr>        
                    <?php
                }     
            }
            ?>
        </tbody>
    </table>
    
</div>

<?php
include_once 'footer.php';