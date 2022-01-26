<?php

require_once 'header.php';


$sql_isbn = "SELECT id, isbn, title, price  FROM books INNER JOIN book_author ON books.id = book_author.book_id INNER JOIN authors ON authors.id = book_author.author_id WHERE id=$book_id";
$result_isbn = $conn->query($sql_isbn);
      




?>

<!--Page content holder-->
<div class='page-content p-5' id="content">
    <div class="card">
        <h2 class="card-header">Добавяне на нова книга</h2>
        <div class='card-body'>
            <form action='add-book.php' id="add-book" method='POST' enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-12">
                        <label for="isbn">ISBN *</label>
                         <?php
                            if($result_isbn->num_rows>0){
                                while($row = $result_isbn->fetch_assoc()){
                                  ?> 
                        <input type="text" class="form-control required" id="isbn" name="isbn" required>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['isbn'];?></option>
                               <?php
                                }
                            }
                            ?>
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
        </div>
    </div>
</div>

<?php
include_once 'footer.php';
?>

<script>
    $(document).ready(function(){
        $('#btn-save').unbind().bind('click', function(e){
            e.preventDefault();
            var isbn = $('#isbn').val();
            var title = $('#title').val();
            var publisher = $('#publisher').val();
            
            var form = $('form#add-book')[0];
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
                    url: '../includes/book/create.php',
                    success: function(dataResult){
                        console.log(dataResult);
                        var dataResult = JSON.parse(dataResult);
                        if(dataResult.statusCode == 200) {
                           $('#success').html('Книгата е добавена успешно'); 
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