<?php
require_once 'header.php';
require_once 'backend/includes/check.php';

$user_id = $_SESSION["login_user"];
$query = "SELECT orders.*, books.title FROM orders INNER JOIN customers ON customers.id = orders.customer_id "
        . "INNER JOIN books ON books.id = orders.book_id WHERE customers.user_id = $user_id";
$result = $conn->query($query);

if(!$result)
    die("Fatal error");


?>
<!doctype html>

<html> 

    <head>

        <style>

        </style>
    </head>



    <body>
        <main>
            <div class="page-content p-5" id="content">


                <!-- Page content -->
                <div class="container-fluid mt--7">
                    <div class="row">

                        <div class="col-xl-12 order-xl-1">
                            <div class="card bg-secondary shadow">
                                <div class="card-header bg-white border-2">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <h3 class="mb-1">Моите поръчки</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <h6 class="heading-small text-muted mb-4">User information</h6>
                                        <div class="pl-lg-4">
                                            <div class="row">
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
                <td><?php echo htmlspecialchars($row['title'])?></td>
                <td><?php echo htmlspecialchars($row['qty'])?></td>
                <td>
                    <a href="<?php echo URLBASE ?>/backend/view-book.php?id=<?php echo $row['id']; ?>">Преглед</a>
                </td>
            </tr>        
                    <?php
                }     
            }
            ?>
        </tbody>
    </table>
                                            </div>
                                           


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





            </div>










        </div>
    </main>
</body>