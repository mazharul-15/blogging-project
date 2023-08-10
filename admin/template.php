<?php

    // include the "function.php" file
    include_once("class/function.php");
    
    // creating object
    $obj = new adminBlog();
    
    // start a session using "session_start()" function
    session_start();
    $id = $_SESSION['admin_id'];
    if($id == null) {
        header("location: index.php");
    }

    // admin logout request
    if(isset($_GET['adminlogout'])) {
        if($_GET['adminlogout'] == 'logout') {
            $obj->admin_logout();
        }
    }
?>


<?php
    
    // Include the head file
    include_once("includes/head.php");
?>
    <body class="sb-nav-fixed">
        <!-- Include the "TOP NAV" file -->
        <?php include_once("includes/topnav.php"); ?>

        <div id="layoutSidenav">

            <!-- Include the "SIDE NAV" file -->
            <?php include_once("includes/sidenav.php"); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <?php 
                            // Including php file form "VIEW" folder
                            if(isset($view)) {
                                if($view == "dashboard") {

                                    include("view/dash_view.php"); // dash_view
                                
                                }elseif($view == "add_category") {
                                    
                                    include_once("view/add_cat_view.php"); // add_cat_view
                                
                                }elseif($view == "add_post") {
                                    
                                    include_once("view/add_post_view.php"); // add_post_view
                                
                                }elseif($view == "manage_category") {
                                    
                                    include_once("view/manage_cat_view.php"); // manage_cat_view
                                
                                }elseif($view == "manage_post") {
                                    
                                    include_once("view/manage_post_view.php"); // manage_post_view
                               
                                }elseif($view == "editcat") {
                                    
                                    include_once("view/edit_cat_view.php"); // edit_cat_view
                                
                                }elseif($view == "edit_img") {
                                    
                                    include_once("view/edit_img_view.php"); // edit_img_view
                                
                                }elseif($view == "edit_post") {
                                    
                                    include_once("view/edit_post_view.php"); // edit_post_view
                                
                                }
                            }
                        ?>
                    </div>
                </main>

                <!-- Include the "FOOTER" file -->
                <?php include_once("includes/footer.php"); ?>
            </div>
        </div>

        <!-- Include the "SCRIPT" file -->
        <?php include_once("includes/script.php"); ?>
    </body>
</html>
