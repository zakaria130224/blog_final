<?php
ob_start();
 include 'inc\header.php';?>
<?php
    if (Session::get("admin_id")!=null) {
            $id=Session::get("admin_id");
    }  
    ?>
    <?php
    $admin_pp=null;
        $query="SELECT admin_image
         FROM tbl_admins
         WHERE admin_id=$id";
            $post=$db->select($query);
            if ($post) {
                while ($result=$post->fetch_assoc()){
                    $admin_pp=$result['admin_image'];
                }
            }

            
    ?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Profile Picture</h2>
                <div>
              <?php
                    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {

                        $permited = array('jpg', 'jpeg', 'png', 'gif');
                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_temp = $_FILES['image']['tmp_name'];
                        
                        $div = explode('.', $file_name);
                        $file_ext = strtolower(end($div));
                        $uploaded_image=null;
                       
                         $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
                         $uploaded_image = "upload/profile/".$unique_image;

                        

                        if (empty( $file_name)) {
                            echo "<div class='alert alert-warning'>
                                             <strong>Warning!</strong> Field must not be empty.
                                   </div>";
                        } elseif ($file_size > 1048567) {
                            echo "<span class='error'>Image Size should be less then 1MB!</span>";
                        } elseif (in_array($file_ext, $permited) === false) {
                            echo "<span class='error'>You can upload only:-"
                                . implode(', ', $permited) . "</span>";
                        } else {
                            move_uploaded_file($file_temp, $uploaded_image);
                            if (!empty($admin_pp)) {
                               unlink($admin_pp);
                            }
                            $query="UPDATE tbl_admins SET admin_image='$uploaded_image' WHERE admin_id='$id'";
                            $inserted_rows = $db->update($query);
                            if ($inserted_rows) {
                                echo "<span class='success'>Image Inserted Successfully !!!</span>";
                                $page = $_SERVER['PHP_SELF'];
                                $sec = ".5";
                                header("Refresh: $sec; url=$page");
                            } else {
                                echo "<span class='error'>Image Not Inserted !</span>";
                            }
                        }
                    }
                    ?>
                </div>
                
               <div class="block copyblock"> 

              
                 <form action="" method="post" enctype="multipart/form-data">
                  
                    <table class="form" >
                        <tr>
                            <td>Current Picture:</td>
                            <td>
                                <img height="200px" width="200px" 
                                src="<?php 
                                if (empty($admin_pp)) {
                                   echo "upload/profile/post1.jpg";
                                }
                                else{
                                    echo $admin_pp;

                                }
                                
                                ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Browse New Picture:</td>
                            <td>
                               <input type="file" name="image">
                            </td>
                        </tr>
                        <tr> 
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Change image" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
            </div>
        </div>
        
<?php include 'inc\footer.php';?>