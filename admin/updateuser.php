<?php include 'inc\header.php';?>
<?php
    if (isset($_GET['id'])) {
            $id=$_GET['id'];
    }
    ?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update User (Only Role)</h2>
                <div>
                   <?php
                       if ($_SERVER['REQUEST_METHOD']=='POST') {
                            $role=$fm->validation($_POST['role']);
                        
                            $role=mysqli_real_escape_string($db->link,$role);
                            if (empty( $role)) {
                              echo "<div class='alert alert-warning'>
                                             <strong>Warning!</strong> Field must not be empty.
                                        </div>";
                            }else{

                                $query="UPDATE tbl_admins SET role_id='$role' WHERE admin_id='$id'";
                                 $result=$db->update($query);
                                 if ($result) {
                                     echo "<div class='alert alert-success'>
                                             <strong>Success!</strong> User update Successfully!.
                                        </div>";
                                    }else{
                                         echo "User Not update!!";
                                }
                            }
                      }

               ?> 
                </div>
                
               <div class="block copyblock"> 

              
                 <form action="" method="post">
                  
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
                            <td style="width: 130px;"><label >Name:</label></td>
                           
                            <td>
                            <?php echo $userresult['admin_name'];?>
                            </td>
                        </tr>
                    
                        <tr>
                            <td><label>Email Address:</label></td>
                            <td>
                                <?php echo $userresult['email'];?>
                            </td>
                        </tr>	
                        		
                        <tr>
                            <td><label>User Name:</label></td>
                            <td>
                                <?php echo $userresult['username'];?>
                            </td>
                        </tr>
                            
                        
                          <tr>
                            <td>
                                <label>User Role:</label>
                            </td>

                            <td>
                                <select id="select" name="role">
                                    <option> Select Role </option>
                            <?php
                                $query="SELECT * FROM tbl_role";
                                $role=$db->select($query);
                                if ($role) {
                                while ($result=$role->fetch_assoc()) {


                            ?>

                                <option
                                     <?php
                                        if ($userresult['role_id']==$result['role_id']) { ?>
                                            selected='selected'
                                      <?php  }?>
                                     value="<?php echo $result['role_id']?>"><?php echo $result['role_name']?></option>
                                    <?php } }?>
                                </select>
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
        </div>
        
<?php include 'inc\footer.php';?>