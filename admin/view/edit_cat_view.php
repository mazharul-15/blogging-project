<?php 

    // displaying data in edit field from database with specific id;
    if(isset($_GET['status'])) {
        if($_GET['status'] = 'edit') {

            $id = $_GET['id'];
            // echo "<h1>$id</h1>";
            $data = $obj->display_data_by_id($id);
        }
    }

    // request for edit data
    if(isset($_POST['edit_cat'])) {
        $return_msg = $obj->edit_cat_by_id($_POST);
    }

?>

<?php if(isset($return_msg)) {echo "<h3>$return_msg</h3>";} ?>

<form action="" method = "POST">
    <!-- category id -->
    <input type="hidden" name="cat_id" value = "<?php echo $data['cat_id']; ?>"/>

    <!-- category name -->
    <div class="form-group">
        <label class="mb-1" for="cat_name">Category Name</label>
        <input name = "cat_name" class="form-control py-4" id="inputEmailAddress" type="text" value = "<?php echo $data['cat_name']; ?>"/>
    </div>    

    <!-- category description -->
    <div class="form-group">
        <label class="mb-1" for="cat_des">Category description</label>
        <input name = "cat_des" class="form-control py-4" id="inputEmailAddress" type="text" value = "<?php echo $data['cat_des']; ?>"/>
    </div>

    <!-- input submit -->
    <input type="submit" value = "Edit Category" name ="edit_cat" class = "form-control btn btn-block btn-primary">
</form>