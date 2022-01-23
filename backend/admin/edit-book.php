<?php
require_once 'header.php';

$book_id = $_GET['id'];

$sql = "SELECT books. * FROM books INNER JOIN book_author ON books.id = book_author.book_id INNER JOIN authors ON authors.id = book_author.author_id "
        . "INNER JOIN book_category ON books.id = book_category.book_id "
        . "INNER JOIN categories ON categories.id = book_category.category_id "
        . "INNER JOIN publishers ON publishers.id = books.publisher_id WHERE books.id=$book_id ";



$result = $conn->query($sql);
var_dump($result);

$sql_authors = "SELECT id, name FROM authors";
$result_authors = $conn->query($sql_authors);

$sql_categories = "SELECT id, title FROM categories";
$result_categories = $conn->query($sql_categories);

$sql_publishers = "SELECT id, title FROM publishers";
$result_publishers = $conn->query($sql_publishers);
   
?>
<!--Page content holder-->
<div class='page-content p-5' id="content">
    <div class="card">
        <h2 class="card-header">Добавяне на нова книга</h2>
        <?php
                            if($result->num_rows>0){
                                $row = $result->fetch_assoc(); ?>
        <div class='card-body'>
            <form action='add-book.php' id="add-book" method='POST' enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-12">
                        <label for="isbn">ISBN *</label>
                        <input value=" <?php echo $row['isbn'] ?> " type="text" class="form-control required" id="isbn" name="isbn" required>
                    </div>
                     <div class="col-12">
                        <label for="title">Заглавие *</label>
                        <input type="text" class="form-control required" id="title" name="title" required>
                    </div>
                    <div class="col-12">
                        <label for="author">Автор *</label>
                        <select class="form-control required" id="author" name="authors[]" multiple>
                            <?php
                            if($result_authors->num_rows>0){
                                while($row = $result_authors->fetch_assoc()){
                                  ?> 
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name'];?></option>
                                <?php
                                }
                            }
                            ?>
                        </select>
                 </div>   
                    <div class="col-12">
                         <label for="category">Категория *</label>
                        <select class="form-control required" id="category" name="categories[]" multiple>
                            <?php
                            if($result_categories->num_rows>0){
                                while($row = $result_categories->fetch_assoc()){
                                  ?> 
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['title'];?></option>
                                <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="year">Година</label>
                        <input type="text" class="form-control" id="year" name="year">
                    </div>
                    <div class="col-12">
                        <label for="description">Описание</label>
                        <input type="text" class="form-control" id="description" name="description">
                    </div>
                    <div class="col-12">
                        <label for="cover">Добавяне на снимка</label>
                        <input type="file" class="form-control" id="cover" name="cover" accept="image/*"/>
                    </div>
                    <div class="col-12">
                        <label for="price">Цена *</label>
                        <input type="number" class="form-control required" id="price" name="price">
                    </div>
                    <div class="col-12">
                        <label for="publisher">Издател *</label>
                        <select class="form-control required" id="publisher" name="publisher">
                            <?php
                            if($result_publishers->num_rows>0){
                                while($row = $result_publishers->fetch_assoc()){
                                  ?> 
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['title'];?></option>
                                <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-row mt-4">
                    <div class="col-12">
                        <input type="submit" id="btn-save" class="btn btn-primary" name="submit" value="Добавяне на книга">
                        <p id="success" style="color:green; padding-top: 20px"></p>
                        <p id="warning" style="color:red; padding-top: 20px"></p>
                    </div>
                </div>
            </form>
        </div> <?php } ?> 
    </div>
</div>


<?php
include_once 'footer.php';
