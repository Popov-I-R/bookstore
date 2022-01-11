<?php

require_once 'header.php';


$sql_categories = "SELECT id, title FROM categories";
$result_categories = $conn->query($sql_categories);



?>




<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
.category:hover {display:block}

.form-row:hover {display:block}


</style>
</head>
<body>



    
    -----------------------------------------------------
    
<form>
  <div class="form-row align-items-center">
    <div class="col-auto my-1">
<!--      <label class="mr-sm-2" for="inlineFormCustomSelect">....</label>-->
      <select class="custom-select mr-sm-2" id="category" name="categories[]" miltiply>
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


  </div>
</form>

</body>
</html>
