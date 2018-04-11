<?php include 'inc\header.php';?>
<?php
    if (Session::get("admin_id")!=null) {
            $id=Session::get("admin_id");
    }

    $pass;
    $query="SELECT password FROM tbl_admins WHERE admin_id='$id'  ";
    $result=$db->select($query);
    if ($result) {
        while ($userresult=$result->fetch_assoc()) {
            $pass=$userresult['password'];
        }
    }
          
    ?>

        <div class="grid_10">
		
            <div class="box round first grid" style="float:left;width: 502px;">
                <h2>Update User</h2>
                <div>
                   <?php
                        $name=false;
                        $username=false;
                        $email=false;
                        $address=false;
                        $about=false;
                       if (isset($_GET['submit'])) {
                        if (isset( $_GET['name'])) {
                            $name=$fm->validation($_GET['name']);   
                        }
                        if (isset( $_GET['username'])) {
                            $username=$fm->validation($_GET['username']);
                        }
                        if (isset($_GET['email'])) {
                            $email=$fm->validation($_GET['email']);
                        }
                        if (isset($_GET['address'])) {
                            $address=$fm->validation($_GET['address']);
                        }
                        if (isset($_GET['about'])) {
                            $about=$fm->validation($_GET['about']);
                        }

                            
                           
                            $name=mysqli_real_escape_string($db->link,$name);
                            $username=mysqli_real_escape_string($db->link,$username);
                            $email=mysqli_real_escape_string($db->link,$email);
                            $address=mysqli_real_escape_string($db->link,$address);
                            $about=mysqli_real_escape_string($db->link,$about);
                            if (empty( $name)||empty( $username)||empty( $email)|| empty( $address)) {
                              echo "<div class='alert alert-warning'>
                                             <strong>Warning!</strong> Field must not be empty.
                                        </div>";
                            }else{

                                 $query="UPDATE tbl_admins
                                    SET
                                    admin_name='$name',
                                    username='$username',
                                    email='$email',
                                    address='$address',
                                    about='$about'
                                    Where admin_id='$id'";
                                $result = $db->update($query);
                                 if ($result) {
                                     echo "<div class='alert alert-success'>
                                             <strong>Success!</strong> User Profile update Successfully!.
                                        </div>";
                                    }else{
                                         echo "User Profile Not update!!";
                                }
                            }
                      }

               ?> 
                </div>
                
               <div class="block copyblock" style="width: 400px;margin-left: 20px;"> 

              
                 <form action="" method="get">
                  
                    <table class="form" >
                 <?php 
                        $query="SELECT * ,tbl_role.role_name
                        FROM tbl_admins
                        Inner join tbl_role
                        on tbl_admins.role_id=tbl_role.role_id and admin_id=$id";
                        $user=$db->select($query);
                        if ($user) {
                            while ($userresult=$user->fetch_assoc()) {

                  ?>
                        <tr>
                            <td>Name:</td>
                            <td>
                            <input type="text" name="name"  value="<?php echo $userresult['admin_name'];?>"/>
                            </td>
                        </tr>
                    
                        <tr>
                            <td>Email Address:</td>
                            <td>
                            <input type="email"  name="email" value="<?php echo $userresult['email'];?>"/>
                            </td>
                        </tr>	
                        		
                        <tr>
                            <td>User Name:</td>
                            <td>
                                <input type="text"  name="username" value="<?php echo $userresult['username'];?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>Address:</td>
                            <td>
                                <textarea name="address"><?php echo $userresult['address'];?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>About Me:</td>
                            <td>
                                <textarea name="about"><?php echo $userresult['about'];?></textarea>
                            </td>
                        </tr>
                        
                          <tr>
                            <td>
                                <label>User Role:</label>
                            </td>

                            <td>
                                <?php echo $userresult['role_name'];?>
                            </td>

                        </tr>
                        <?php }}?> 
						<tr> 
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>

            <div class="box round first grid" style="float:right;width: 550px;padding-bottom: 0px;margin-bottom: 0px;">
                <h2>Update Password</h2>
                <div>
                   <?php
                       if ($_SERVER['REQUEST_METHOD']=='POST') {
                            $old_pass=$fm->validation($_POST['old_pass']);
                            $new_pass=$fm->validation($_POST['new_pass']);
                            $new_pass2=$fm->validation($_POST['new_pass2']);
                            $ch_pass=$pass;
                        

                            if (empty( $old_pass)||empty( $new_pass)||empty( $new_pass2)) {
                              echo "<div class='alert alert-warning'>
                                             <strong>Warning!</strong> Field must not be empty.
                                        </div>";
                            }
                            elseif ($new_pass!=$new_pass2){
                                echo "<div class='alert alert-warning'>
                                             <strong>Warning!</strong> New Password Not Match!!!.
                                        </div>";
                            }else{

                                $old_pass=md5($_POST['old_pass']);
                                $new_pass=md5($_POST['new_pass']);
                                
                                if ($ch_pass==$old_pass) {
                                   

                                    $query="UPDATE tbl_admins 
                                    SET password='$new_pass' 
                                    WHERE admin_id='$id'";
                                     $result=$db->update($query);
                                     if ($result) {
                                         echo "<div class='alert alert-success'>
                                                 <strong>Success!</strong> User Password updated Successfully!.
                                            </div>";
                                        }else{
                                             echo "User Password not updated !!";
                                    }
                                }else{
                                     echo "<div class='alert alert-warning'>
                                                 <strong>Warning!</strong> Old Password Not Match!!!.
                                            </div>";
                                }
                            }
                        }

               ?> 
                </div>
                
               <div class="block copyblock" style="width: 400px;margin-left: 20px; margin-top: 2px;"> 

              
                 <form action="" method="post">
                  
                    <table class="form" >
                
                        <tr>
                            <td>Old Password:</td>
                            <td>
                            <input type="password" name="old_pass"  />
                            </td>
                        </tr>
                    
                        <tr>
                            <td>New Password:</td>
                            <td>
                            <input type="password"  name="new_pass" />
                            </td>
                        </tr>   
                                
                        <tr>
                            <td>Confirm Password:</td>
                            <td>
                                <input type="password"  name="new_pass2"/>
                            </td>
                        </tr>
                        <tr> 
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
                <h2>Update Profile Picture</h2>
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
                 <div class="block copyblock" style="width: 400px;margin-left: 20px; margin-top: 2px;"> 
                    
                    <table class="form" style=" margin-bottom: 0px;">
                        <tr>
                            <td>Current Picture:</td>
                            <td>
                                <img height="100px" width="100px" 
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
                            <td></td>
                            <td>
                                <a href="img_update.php"><input type="submit" name="submit" Value="Change image" /></a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        
<?php include 'inc\footer.php';?>