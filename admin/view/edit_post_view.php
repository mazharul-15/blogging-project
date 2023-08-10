<?php

    // Display data by ID for editing
    if(isset($_GET['status'])) {
        if($_GET['status'] == 'edit') {
            $id = $_GET['id'];
            $data = $obj->display_edit_post($id);
            $postdata = mysqli_fetch_assoc($data);
        }
    }

    // Send data to database for editing
    if(isset($_POST['edit_post_btn'])) {
        $return_msg = $obj->update_blog_post($_POST);
    }
?>

<h2>Edit Post</h2>

<?php if(isset($return_msg)) {echo $return_msg; } ?>

<div class="shadow m-5 p-5">
    
    <form action="" method = "POST" class="form">
        <!-- Post ID -->
        <div class="form-group">
            <input name = "post_id" class="py-4" id="post_id" type="hidden" value = "<?php echo $postdata['post_id']; ?>"/>
        </div>
    
        <!-- Post Title -->
        <div class="form-group">
            <label class="mb-2" for="post_title">Change Title</label><br>
            <input class = "form-control py-4" name = "post_title" id="post_title" type="text" value = "<?php echo $postdata['post_title']; ?>"/>
        </div>
    
        <!-- Post Content -->
        <div class="form-group">
            <label class="mb-2" for="post_content">Change Content</label><br>
            <textarea name="post_content" class = "form-control" id="post_content" cols="30" rows="10" value = ""><?php echo $postdata['post_content']; ?></textarea>
        </div>
    
        <!-- Submit Button -->
        <div class="form-group">
            <input class = "form-control btn btn-primary mt-3" name = "edit_post_btn" id="edit_post_btn" type="submit" value = "Update Post"/>
        </div>
    </form>
</div>