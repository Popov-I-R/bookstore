<?php

require_once 'header.php';


$sql_categories = "SELECT id, title FROM categories";
$result_categories = $conn->query($sql_categories);



?>

<!--Page content holder-->
<div class='page-content p-5' id="content">
   
                    <div class="col-2">
                         <label for="category">Категория</label>
                        <select class="form-control required" id="category" name="categories[]" >
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
    --------------------------------
<!--<div class="btn-group">
    <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Family</button>
    <div class="dropdown-menu">
        <?php
           
            // Replace with the desired SQL
            $sql = "SELECT id, title FROM categories";
            
            // get the results
            $result = $conn->query($sql);

            if ($result->num_rows > 0) 
            {
                // output data of each row
                while($option = $result->fetch_assoc()) 
                {
                    // change "name" to the column fo your DB row.  
                    echo "<a class='categories' href='#'>".$option["title"]."</a> ";

                    // if you also store a link to your DB, for ex in a column link then use
                    // echo "<a class='dropdown-item' href='".option["link"]."'>".$option["name"]."</a> ";
                }
            } 
            $conn->close();
        ?>
     </div>
 </div>-->


<!--         
