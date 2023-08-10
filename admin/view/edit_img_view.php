<?php
    if(isset($_GET['status'])) {
        if($_GET['status'] == 'edit_img') {
            $id = $_GET['id'];
        }
    }

    if(isset($_POST['change_img_btn'])) {
        $return_msg = $obj->edit_img($_POST);
    }
?>

<div class="shadow m-5 p-5">
    <?php if(isset($return_msg)) {echo $return_msg; } ?>
    <form action="" method = "POST" class = "form" enctype = "multipart/form-data">
    <!-- image choosing -->
    <div class="form-group">
        <label class="mb-1" for="change_img">Change Thumbnail</label><br>
        <input name = "change_img" class="py-4" id="change_img" type="file"/>
    </div>

    <!-- post id in hidden type -->
    <div class="form-group">
        <input name = "post_id" class="py-4" id="post_id" type="hidden" value = "<?php echo $id?>"/>
    </div>

    <div class="form-group">
        <input type="submit" value="Submit" name = "change_img_btn" class = "btn btn-primary">
    </div>
    </form>
</div>