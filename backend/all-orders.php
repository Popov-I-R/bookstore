<?php

require_once 'header.php'; 

$query = "SELECT * FROM orders";
$result = $conn->query($query);

if(!$result)
    die("Fatal error");
?>

<div class="page-content p-5" id="content">
    
    <h1>Всички потребители</h1>
    <table class="table">
        <thead>
             <tr>
                 <th scope="col">Потребител</th>
                 <th scope="col">Книга</th>
                 <th scope="col">Количество</th>
             </tr>
        </thead>
        <tbody>
            <?php
            if($result->num_rows >0){
                while($row = $result->fetch_assoc()) { 
                    ?>
            <tr>
                <td><?php echo htmlspecialchars($row['customer_id'])?></td>
                <td><?php echo htmlspecialchars($row['book_id'])?></td>
                <td><?php echo htmlspecialchars($row['qty'])?></td>
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