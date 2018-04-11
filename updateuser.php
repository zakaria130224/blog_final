<?php include 'inc\header.php';?>
<?php
    if (isset($_GET['id'])) {
            $id=$_GET['id'];
    }
    ?>

        <div class="grid_10">
        
            <div class="box round first grid">
                <h2>Add New Category</h2>
                <div>
                   <?php
                       if ($_SERVER['REQUEST_METHOD']=='POST') {
                            $admin_name=$fm->validation($_POST['name']);
                            $email=$fm->validation($_POST['email']);
                            $username=$fm->validation($_POST['username']);
                            $password=$fm->validation(md5($_POST['password']));
                            $role_id=$fm->validation($_POST['role']);
                            
                            $admin_name=mysqli_real_escape_string($db->link,$admin_name);
                            $email=mysqli_real_escape_string($db->link,$email);
                            $username=mysqli_real_escape_string($db->link,$username);
                            $password=mysqli_real_escape_string($db->link,$password);
                            $role_id=mysqli_real_escape_string($db->link,$role_id);
                            if (empty( $admin_name)||empty( $email)||empty( $username)||empty( $password)||empty( $role_id)) {
                              echo "<div class='alert alert-warning'>
                                             <strong>Warning!</strong> Field must not be empty.
                                        </div>";
                            }else{
                                 $query="INSERT INTO tbl_admins (admin_name,email,username,password,role_id) VALUES('$admin_name','$email','$username','$password','$role_id')";
                                 $result=$db->insert($query);
                                 $query="DELETE FROM tbl_application WHERE id='$id'";
                                    $delmsg=$db->delete($query);
                                 if ($result&&$delmsg) {
                                     echo "<div class='alert alert-success'>
                                             <strong>Success!</strong> User inserted Successfully!.
                                        </div>";
                                     $admin_email="blog@gmail.com";
                                     $subj="Application Approved!!!";
                                     $msg="Hi!".$admin_name."we are satisfied with you Application. you can login now in our admin dashboard your username:".$username." and Password:". $password."link : ....link goes here... ";
                                        $to=$fm->validation($email);
                                        $from=$fm->validation($admin_email);
                                        $sbj=$fm->validation($subj);
                                        $msg=$fm->validation($msg);
                                        //$mail=mail($to,$sbj,$msg,$from);

                                    }else{
                                         echo "User Not Inserted!!";
                                }
                            }
                      }

               ?> 
                </div>
                
               <div class="block copyblock"> 

              
                 <form action="" method="post">
                  
                    <table class="form" >
                 <?php 
                    if (isset($_GET['id'])) {
                        $id=$_GET['id'];
                        $query="SELECT * FROM tbl_application Where id='$id'";
                        $app=$db->select($query);
                        if ($app) {
                            while ($result=$app->fetch_assoc()) {

                  ?>
                        <tr>
                            <td>Name:</td>
                            <td>
                            <input type="text" name="name"  value="<?php echo $result['fname']." ".$result['lname'];?>"/>
                            </td>
                        </tr>
                    
                        <tr>
                            <td>Email Address:</td>
                            <td>
                            <input type="email" name="email" value="<?php echo $result['email'];?>"/>
                            </td>
                        </tr>   
                        <?php }}}?>             
                        <tr>
                            <td>User Name:</td>
                            <td>
                                <input type="text" name="username" placeholder="Enter User Name..." class="medium" />
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Password:</td>
                            <td>
                                <input type="text" name="password" placeholder="Enter Password..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>User Role:</td>
                            <td>
                            <select id="select" name="role">
                             <option> Select Role </option>
                            <option value="1">Admin</option>
                            <option value="2">Author</option>
                            <option value="3">Editor</option>
                                </select>
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
            </div>
        </div>
        
<?php include 'inc\footer.php';?>