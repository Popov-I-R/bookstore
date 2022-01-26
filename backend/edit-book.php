<?php
require_once 'header.php';

$book_id = $_GET['id'];

$sql = "SELECT books. *, book_author.author_id, book_category.category_id FROM books INNER JOIN book_author ON books.id = book_author.book_id INNER JOIN authors ON authors.id = book_author.author_id "
        . "INNER JOIN book_category ON books.id = book_category.book_id "
        . "INNER JOIN categories ON categories.id = book_category.category_id "
        . "INNER JOIN publishers ON publishers.id = books.publisher_id WHERE books.id=$book_id ";

$result = $conn->query($sql);




$sql_authors = "SELECT id, name FROM authors";
$result_authors = $conn->query($sql_authors);

//$sql_books = "SELECT id, year, price FROM books";
//$result_books = $conn->query($sql_books);

$sql_categories = "SELECT id, title FROM categories";
$result_categories = $conn->query($sql_categories);

$sql_publishers = "SELECT id, title FROM publishers";
$result_publishers = $conn->query($sql_publishers);
   
?>
<!--Page content holder-->
<div class='page-content p-5' id="content">
    <div class="card">
        <h2 class="card-header">Редактиране на книга</h2>
        <div class='card-body'>
            
            <form action='edit-book.php' id="edit-book" method='POST' enctype="multipart/form-data">
                <div class="form-row">
                    <?php
                            if($result->num_rows>0){
                                $row = $result->fetch_assoc(); 
                                ?>
                    <div class="col-12">
                        <input value=" <?php echo $row['id'] ?> " type="hidden"  name="id">
                    </div>
                    <div class="col-12">
                        <label for="isbn">ISBN</label>
                        <input value=" <?php echo $row['isbn'] ?> " type="text" class="form-control required disabled" id="isbn" name="isbn" required >
                    </div>
                     <div class="col-12">
                        <label for="title">Заглавие</label>
                        <input value="<?php echo $row['title'] ?> " type='text' class="form-control required disabled" id="title" name="title" required>
                    </div>
                    <div class="col-12">
                        <label for="author">Автор</label>
                        <select class="form-control disabled" id="author" name="authors[]" >
                            <?php
                            if($result_authors->num_rows>0){
                                while($row_author = $result_authors->fetch_assoc()){
                                  ?> 
                                <option <?php echo ($row['author_id'] == $row_author['id']) ? "selected" : ""; ?> value="<?php echo $row_author['id']; ?>"><?php echo $row_author['name']; ?> </option>
                                <?php
                                }
                            }
                            ?>
                        </select>
                 </div>   
                    <div class="col-12">
                         <label for="category">Категория</label>
                        <select class="form-control required disabled" id="category" name="categories[]">
                            <?php
                            if($result_categories->num_rows>0){
                                while($row_category = $result_categories->fetch_assoc()){
                                  ?> 
                                <option <?php echo ($row['category_id'] == $row_category['id']) ? "selected" : ""; ?> value="<?php echo $row_category['id']; ?>"><?php echo $row_category['title']; ?> </option>
                                <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="year">Година</label>
                        <input value="<?php echo $row['year'] ?> " type='text' class="form-control" id="year" name="year" >
                    </div>
                    <div class="col-12">
                        <label for="description">Описание</label>
                        <input value='<?php echo $row['description'] ?> ' type="text" class="form-control" id="description" name="description">
                    </div>
                    <div class="col-12">
                        <label for="cover">Добавяне на снимка</label>
                        <input type="file" class="form-control disabled" id="cover" name="cover" accept="image/*"/>
                    </div>
                    <div class="col-12">
                        <label for="price">Цена</label>
                        <input value="<?php echo $row['price'] ?> " type="text" class="form-control" id="price" name="price">
                    </div>
                    <div class="col-12">
                        <label for="publisher">Издател</label>
                        <select class="form-control disabled " id="publisher" name="publisher">
                            <?php
                            if($result_publishers->num_rows>0){
                                while($row_publisher = $result_publishers->fetch_assoc()){
                                  ?> 
                                <option <?php echo ($row['publisher_id'] == $row_publisher['id']) ? "selected" : ""; ?> value="<?php echo $row_publisher['id']; ?>"><?php echo $row_publisher['title']; ?> </option>
                                <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-row mt-4">
                    <div class="col-12">
                        <input type="submit" id="btn-save" class="btn btn-primary" name="submit" value="Редактиране на книга">
                        <p id="success" style="color:green; padding-top: 20px"></p>
                        <p id="warning" style="color:red; padding-top: 20px"></p>
                    </div>
                </div>
            </form>
        </div> <?php } ?> 
    </div>
</div>



<script>
    $(document).ready(function(){
        $('#btn-save').unbind().bind('click', function(e){
            e.preventDefault();
            var isbn = $('#isbn').val();
            var title = $('#title').val();
            var publisher = $('#publisher').val();
            
            var form = $('form#edit-book')[0];
            var formData = new FormData(form);
            
            formData.append('cover',$('input[type=file]')[0].files[0]);

            if(isbn != "" && title != "" && publisher != ""){
                $.ajax({
                   type: 'POST',
//                   data: {
//                       isbn: isbn,
//                       dasdasd: $('#isbn').val(),
//                       
//                   },
                    data: formData,
                    cache: false, 
                    processData: false,
                    contentType: false,
                    url: 'includes/book/edit-.php',
                    success: function(dataResult){
                        console.log(dataResult);
                        var dataResult = JSON.parse(dataResult);
                        if(dataResult.statusCode == 200) {
                           $('#success').html('Книгата е редактирана успешно'); 
                        } else if (dataResult.statusCode == 201 && dataResult.flag !="") {
                            switch (dataResult.flag) {
                                case 1: 
                                    $('#warning').html('Разширението трябва да бъде .jpg, .jpeg или .png');
                                    break;
                                case 2:
                                    $('#warning').html('Изображението е твърде голямо.');
                                    break;
                                case 3:
                                    $('#warning').html('Проблем при качването на файла.');
                                    break;    
                            }
                        }else {
                            alert('Error');
                        }
                    }
                });
            }else {
                alert("Попълни задължителните полета!");
//                $('form').addClass('needs-validation');
            }
            
        });
    });
</script>
