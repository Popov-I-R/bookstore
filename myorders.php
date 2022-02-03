<?php
require_once 'header.php';
require_once 'backend/includes/check.php';

$user_id = $_SESSION["login_user"];
$query = "SELECT orders.*, books.title FROM orders INNER JOIN customers ON customers.id = orders.customer_id "
. "INNER JOIN books ON books.id = orders.book_id WHERE customers.user_id = $user_id";
$result = $conn->query($query);

if (!$result)
die("Fatal error");
?>
<!doctype html>

<html> 

    <head>

        <style>
            h2 {
                text-align: center;
            }
        </style>
    </head>


    <body>
        <main>
            <div class="page-content p-5" id="content">

                <div class="row">
                    <div class="col-12">
                        <h2>Моите поръчки</h2>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div style="overflow-x:auto;">
                        <table class="table" id="shopping-cart-results">
                            <thead>
                                <tr>
                                    <th>ID/поръчка</th>
                                    <th>Продукт</th>
                                    <th>Количество</th>
                                    
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                                            if ($result->num_rows > 0) {
                                                                while ($row = $result->fetch_assoc()) {
                                                                    ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['id']) ?></td>
                                    <td><?php echo htmlspecialchars($row['title']) ?></td>
                                    <td><?php echo htmlspecialchars($row['qty']) ?></td>
                                </tr>
                                 <?php
                                                                }
                                                            }
                                                            ?>
			

                          			
                            </tbody>
                        </table>
                    </div>
                </div>



        </main>
    </body>