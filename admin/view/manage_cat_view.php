<?php
    // display all data form database
    $catdata = $obj->display_category();

    // delete requst with specific id
    if(isset($_GET['status'])) {
        if($_GET['status'] == 'delete') {
            $id = $_GET['id'];
            $return_msg = $obj->delete_category($id);
        }
    }
?>

<h2>Manage Category page</h2>
<?php if(isset($return_msg)) { echo $return_msg; } ?>
<!-- Table for displaying data from database -->
<table class = "table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Category Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while($cat = mysqli_fetch_assoc($catdata)) { ?>
        <tr>
            <td><?php echo $cat['cat_id']; ?></td>
            <td><?php echo $cat['cat_name']; ?></td>
            <td><?php echo $cat['cat_des']; ?></td>
            <td>
                <a class = "btn btn-primary" href="./edit_cat.php?status=edit&&id=<?php echo $cat['cat_id']; ?>">Edit</a>
                <a class = "btn btn-danger" href="?status=delete&&id=<?php echo $cat['cat_id']; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>