<!-- 
    This file is included with "template.php" in "49 line" 
    file with help of "add_post.php" file
-->

<?php
    // taking category name form database unsing  function.php
    $data = $obj->display_category();

    // adding post to database 
    if(isset($_POST['add_post'])) {
        $return_msg = $obj->add_post($_POST);
    }
?>


<h2>Add Post Page</h2>
<?php if(isset($return_msg)) {echo $return_msg; }?>
<form action="" method = "POST" enctype = "multipart/form-data">

    <!-- Post Title -->
    <div class="form-group">
        <label class="mb-1" for="post_title">Post Title</label>
        <input name = "post_title" class="form-control py-4" id="post_title" type="text"/>
    </div>

    <!-- Post Content -->
    <div class="form-group">
        <label class="mb-1" for="post_content">Post Content</label>
        <textarea class = "form-control py-4" name="post_content" id="post_content" cols="30" rows="10"></textarea>
    </div>
    
    <!-- Post Image -->
    <div class="form-group">
        <label class="mb-1" for="post_img">Upload Thumbnail</label><br>
        <input name = "post_img" class="py-4" id="post_img" type="file"/>
    </div>

    <!-- Select Post Category -->
    <div class="form-group">
        <label class="mb-1" for="post_ctg">Select Post Category</label>
        <select class = "form-control" name="post_ctg" id="post_ctg">
            <!-- display category list -->
            <?php while($categoryName = mysqli_fetch_assoc($data)) { ?>
                <option value="<?php echo $categoryName['cat_id']; ?>"><?php echo $categoryName['cat_name']; ?></option>
            <?php } ?>
        </select>
    </div>
    
    <!-- Post Summery -->
    <div class="form-group">
        <label class="mb-1" for="post_summery">Post Summery</label>
        <input name = "post_summery" class="form-control py-4" id="post_summery" type="text"/>
    </div>

    <!-- Post Tag -->
    <div class="form-group">
        <label class="mb-1" for="post_tag">Post Tags</label>
        <input name = "post_tag" class="form-control py-4" id="post_tag" type="text"/>
    </div>

    <!-- Post Status -->
    <div class="form-group">
        <label class="mb-1" for="post_status">Post Status</label>
        <select class = "form-control" name="post_status" id="post_status">
            <option value="1">Published</option>
            <option value="0">Unpublished</option>
        </select>
    </div>

    <!-- input submit -->
    <input type="submit" value = "Add Post" name ="add_post" class = "form-control btn btn-block btn-primary">
</form>