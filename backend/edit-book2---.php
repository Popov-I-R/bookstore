<?php //
require_once 'header.php';




$sql_isbn = "SELECT id, isbn, title, price FROM books";
$result_isbn = $conn->query($sql_isbn);

?>
<!--Page content holder-->
<div class='page-content p-5' id="content">
 <div class="col-12">
                        <label for="isbn">ISBN *</label>
                         <?php
                            if($result_isbn->num_rows>0){
                                $row = $result_isbn->fetch_assoc();
                                echo $row['id'];  echo $row['isbn']; echo $row['title']; echo $row['price'];
                            }
                                ?>
                                
                                

                    </div>
</div>


<?php
include_once 'footer.php';