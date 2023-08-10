<?php

    Class  adminBlog {
        
        private $conn;

        public function __construct() {

            // database_host, database_user, database_pass, database_name
            $dbhost = "localhost";
            $dbuser = "root";
            $dbpass = "";
            $dbname = "blogproject";

            // create database connection
            $this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
            
            // checking connection
            if(!$this->conn) {
                die("Database Connection Error!!");
            }
        }

        // Admin Log In
        public function admin_login($data) {

            $admin_email = $data['admin_email'];
            $admin_pass = md5($data['admin_pass']);

            // query for login as admin
            $query = "SELECT * FROM admin_info WHERE 
            admin_email = '$admin_email' && admin_pass = '$admin_pass'";

            if(mysqli_query($this->conn, $query)) {
                $admin_info = mysqli_query($this->conn, $query);
                if($admin_info) {
                    header("location: dashboard.php");
                    session_start();
                    $admin_data = mysqli_fetch_assoc($admin_info);
                    $_SESSION['admin_id'] = $admin_data['id'];
                    $_SESSION['admin_name'] = $admin_data['admin_name'];
                }
            }
        }
        
        // Admin LogOut by setting unset on session
        public function admin_logout() {
            unset($_SESSION['admin_id']);
            unset($_SESSION['admin_name']);
            header("location: index.php");
        }

        // Add Category to Database
        public function add_category($data) {
            $cat_name = $data['cat_name'];
            $cat_des = $data['cat_des'];

            // making query for inserting category
            $query = "INSERT INTO category(cat_name, cat_des) VALUES
            ('$cat_name', '$cat_des')";

            // database connection
            if(mysqli_query($this->conn, $query)) {
                return "Category Added Successfully!";
            }
        }

        // Manage Category
        public function display_category() {
            $query = "SELECT * FROM category";

            if(mysqli_query($this->conn, $query)) {
                $category = mysqli_query($this->conn, $query);
                return $category;
            }
        }

        // Delete a Category with id
        public function delete_category($id) {
            $query = "DELETE  FROM category WHERE cat_id = $id";
            if(mysqli_query($this->conn, $query)) {
                return "Category Deleted Successfully";
            }
        }

        // Display data by id into category edit page
        public function display_data_by_id($id) {
            $query = "SELECT * FROM category WHERE cat_id = $id";
            if(mysqli_query($this->conn, $query)) {
                $data = mysqli_query($this->conn, $query);
                $data_cat = mysqli_fetch_assoc($data);
                return $data_cat;
            }
        }

        // Edit Category by specific id
        public function edit_cat_by_id($data) {
            $id = $data['cat_id'];
            $name = $data['cat_name'];
            $des = $data['cat_des'];

            $query = "UPDATE category SET cat_name = '$name', cat_des = '$des' WHERE cat_id = $id";

            // UPDATE `category` SET `cat_id`='[value-1]',`cat_name`='[value-2]',`cat_des`='[value-3]' WHERE 1
            if(mysqli_query($this->conn, $query)) {
                // header("location: manage_category.php");
                return "Successfully Edited!!";
            }
        }

        // Adding Post to database
        public function add_post($data) {
            $post_title = $data['post_title'];
            $post_content = $data['post_content'];
            // post image
            $post_img = $_FILES['post_img']['name'];
            $post_img_tmp = $_FILES['post_img']['tmp_name'];

            $post_category = $data['post_ctg'];
            $post_summery = $data['post_summery'];
            $post_tag = $data['post_tag'];
            $post_status = $data['post_status'];

            // query
            $query = "INSERT INTO 
            posts(post_title, post_content, post_img, post_ctg, post_author, post_date,
            post_comment_count, post_summery, post_tag, post_status) 
            VALUES('$post_title', '$post_content', '$post_img', $post_category, 'Admin', now(),
            3, '$post_summery', '$post_tag', $post_status)";

            // requesting connection to database
            if(mysqli_query($this->conn, $query)) {
                move_uploaded_file($post_img_tmp, "../upload/".$post_img);
                return "Post Added Successfully";
            }
        }

        // Display All post in Admin Panel from database "post_with-ctg" table
        public function display_post() {
            $query = "SELECT * FROM post_with_ctg";
            if(mysqli_query($this->conn, $query)) {
                $data = mysqli_query($this->conn, $query);
                return $data;
            }
        }

        // Display all Post in BLOG from database "post_with-ctg" table
        public function display_published_post() {
            $query = "SELECT * FROM post_with_ctg WHERE post_status = 1";
            if(mysqli_query($this->conn, $query)) {
                $data = mysqli_query($this->conn, $query);
                return $data;
            }
        }
        
        // Thumbnail changing of Blog Post
        public function edit_img($data) {
            $id = $data['post_id'];
            $img_name = $_FILES['change_img']['name'];
            $tmp_img = $_FILES['change_img']['tmp_name'];
             
            // query
            $query = "UPDATE posts SET post_img = '$img_name' WHERE post_id = $id";

            if(mysqli_query($this->conn, $query)) {
                //unlink('upload/'.$delete_image_data);
                move_uploaded_file($tmp_img, "../upload/".$img_name);
                return "Changed image successfully!!!";
            }
        }

        // Display specific Post by ID in Admin Panel for Editing
        public function display_edit_post($id) {
            $query = "SELECT * FROM post_with_ctg WHERE post_id = $id";
            $data = mysqli_query($this->conn, $query);

            if(isset($data)) {
                return $data;
            }
        }

        // Edit the Blog Post form Admin Panel
        public function update_blog_post($data) {
            $post_id = $data['post_id'];
            $post_title = $data['post_title'];
            $post_content = $data['post_content'];
            
            $query = "UPDATE posts SET post_title = '$post_title', post_content = '$post_content'
            WHERE post_id = $post_id";
            
            if(mysqli_query($this->conn, $query)) {
                return "Post Successfully Updated";
            }
        }
    }
?>