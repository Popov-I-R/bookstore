<?php

require_once 'header.php'; 
require_once '../common/includes/dbconnect.php';
//require_once 'includes/check.php';


$query = "SELECT title FROM categories";
//$query = "SELECT books.*, authors.name FROM books INNER JOIN book_author ON books.id = book_author.book_id INNER JOIN authors ON authors.id = book_author.author_id";
$result = $conn->query($query);

if(!$result)
    die("Fatal error");
?>

<div class="page-content p-5" id="content">
    
    <h1>Всички категории</h1>
    <table class="table">
        <thead>
             <tr>
                 <th scope="col">Категория</th>
             </tr>
        </thead>
        <tbody>
            <?php
            if($result->num_rows >0){
                while($row = $result->fetch_assoc()) { 
                    ?>
            <tr>
                <td><?php echo htmlspecialchars($row['title'])?></td>
            </tr>        
                    <?php
                }     
            }
            ?>
        </tbody>
    </table>
    
    ---------------------------------------------
    Select menu proba :
    <select>
        <?php while($row = mysqli_fetch_array($result)) {
         ?>
        <option value="<?php echo $row['title']; ?> "> <?php echo $row['title']; ?> </option>
        <?php
        }
        ?>
    </select>
    
    ------------------
    


    
</div>
