<!--  -->
<?php 

    //Display all Blog Post form posts table
    $posts = $obj->display_post();

?>

<h2>Manage post page</h2>

<div class = "table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Thumb</th>
                <th>Author</th>
                <th>Date</th>
                <th>Category</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($postdata = mysqli_fetch_assoc($posts)) { ?>
                <tr>
                    <td><?php echo $postdata['post_id']; ?></td>
                    <td><?php echo $postdata['post_title']; ?></td>
                    <td><?php echo $postdata['post_content']; ?></td>
                    <td><img src="../upload/<?php echo $postdata['post_img']; ?>"
                        alt="post-pic" style = "width: 80px; height: 80px"><br>
                        <!-- image choosing option -->
                        <a href="edit_img.php?status=edit_img&&id=<?php echo $postdata['post_id']; ?>">Change</a>
                    </td>
                    <td><?php echo $postdata['post_author']; ?></td>
                    <td><?php echo $postdata['post_date']; ?></td>
                    <td><?php echo $postdata['cat_name']; ?></td>
                    <td>
                        <?php 
                            if($postdata['post_status'] == 1) {
                                echo "Published";
                            } else {
                                echo "Unpublished";
                            }
                        ?>
                        <?php //echo $postdata['post_status']; ?></td>
                    <td>
                        <a class = "btn btn-primary" href="./edit_post.php?status=edit&&id=<?php echo $postdata['post_id']; ?>">Edit</a>
                        <a class = "btn btn-danger" href="?status=delete&&id=<?php echo $postdata['post_id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>