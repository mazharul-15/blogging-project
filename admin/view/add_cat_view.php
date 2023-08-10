<?php
    // calling "add_category" function for adding category

    if(isset($_POST['add_cat'])) {
        $return_msg = $obj->add_category($_POST);
    }

?>
<?php if(isset($return_msg)) {echo $return_msg; } ?>
<form action="" method = "POST">

    <!-- category name -->
    <div class="form-group">
        <label class="mb-1" for="cat_name">Category Name</label>
        <input name = "cat_name" class="form-control py-4" id="inputEmailAddress" type="text"/>
    </div>

    <!-- category description -->
    <div class="form-group">
        <label class="mb-1" for="cat_des">Category description</label>
        <input name = "cat_des" class="form-control py-4" id="inputEmailAddress" type="text"/>
    </div>

    <!-- input submit -->
    <input type="submit" value = "Add Category" name ="add_cat" class = "form-control btn btn-block btn-primary">
</form>