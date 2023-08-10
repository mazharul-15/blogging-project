<?php
  // including function.php file form admin/class....
  // backend code in function.php
  include("admin/class/function.php");
  
  // creating an Object
  $obj = new adminBlog();

    // requesting category names from database for "header" navigation category name
  $getcat = $obj->display_category();
  
  // requesting category names from database for "side_bar" navigation category name
  $getcat1 = $obj->display_category();

  if(isset($_GET['view'])) {
    if($_GET['view'] == 'post_view') {
        $id = $_GET['id'];
        $data = mysqli_fetch_assoc($obj->display_edit_post($id));
    }
  }
  
?>
<?php
    //including head.php file form includes folder
    include_once("includes/head.php");

?>

  <body>

    <!-- Preloader including form includes folder -->
    <?php include_once("includes/preloader.php"); ?>

    <!-- Header including form includes folder -->
    <?php include_once("includes/header.php"); ?>

    <!-- Page Content -->

    <!-- Banner including from includes folder  -->
    <?php include_once("includes/banner.php") ?>
    
    <!-- including Call to action from includes folder -->
    <?php include_once("includes/call_to_action.php"); ?>

    <!-- Blog Posts Area -->
    
    <section class="blog-posts">
      <div class="container">
            <div class="row">
                <!-- Single Post Details -->
                <div class="col-lg-8">
                    <img src="upload/<?php echo $data['post_img']; ?>" alt="">
                    <h2><?php echo $data['post_title']; ?></h2>
                    <p>
                        <?php echo $data['post_title']; ?>
                    </p>
                </div>

                <!-- including side_bar form includes folder -->
                <?php include_once("includes/side_bar.php"); ?>
            </div>
      </div>
    </section>

    
    <!-- including footer from includes folder -->
    <?php include_once("includes/footer.php"); ?>

    <!-- including script from includes folder -->
    <?php include_once("includes/script.php"); ?>