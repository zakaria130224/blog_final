<?php include 'inc\header.php';?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>View Inbox Message</h2>
                <?php
                    if(isset($_GET['vid'])&&isset($_GET['email'])){
                         $id=$_GET['vid'];
                         $email=$_GET['vid'];
                         $admin_email="blog@gmail.com";
                         $subj="Application Not Approved!!!";
                         $msg="we are not satisfied with you Application Now... sorry try againe later with better personal Detailes ";
                            $to=$fm->validation($email);
                            $from=$fm->validation($admin_email);
                            $sbj=$fm->validation($subj);
                            $msg=$fm->validation($msg);
                            //$mail=mail($to,$sbj,$msg,$from);
                            if (true) {
                                 echo "<div class='alert alert-success'>
                                         <strong>Success!</strong> Message Send Successfully!.
                                    </div>";
                                        $query="DELETE FROM tbl_application WHERE id='$id'";
                                        $delmsg=$db->delete($query);
                                        if ($delmsg) {
                                             echo "<div class='alert alert-success'>
                                                     <strong>Success!</strong> Application delete Successfully!.
                                                </div>";
                                         }else{
                                             echo "Application Not deleted!!";
                                         }
                             }else{
                                 echo "Message Not Send!!";
                             }
                         }
                 ?>
                <?php
                    
                 ?>
               <div class="block copyblock">    
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
                    <input type="text" name="firstname"  value="<?php echo $result['fname']." ".$result['lname'];?>"/>
                    </td>
                </tr>
                
                <tr>
                    <td>Email Address:</td>
                    <td>
                    <input type="email" name="email" value="<?php echo $result['email'];?>"/>
                    </td>
                </tr>
                <tr>
                    <td>About:</td>
                    <td>
                    <textarea name="about" ><?php echo $result['about'];?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Message:</td>
                    <td>
                    <textarea name="msg" ><?php echo $result['msg'];?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Attached Your CV:</td>
                    <td>
                    <input type="file" name="file_cv" >
                    </td>
                </tr>
                        <tr>
                            <td></td>
                            <td>
                               <a href="adduser.php?id=<?php echo $result['id'];?>"> <input  style="margin-right:20px;" type="submit" name="" value="Approve">
                               </a>
                                   <a onclick="return confirm('Are you Sure to Send it Seen Box!!!');" href="?vid=<?php echo $result['id'];?>&email=<?php echo $result['email'];?>"><input  type="submit" value="Not Now">
                                </a>
                                
                            </td>
                        </tr>
                        <?php }}}?>
                    </table>

                </div>
            </div>
        </div>
        
<?php include 'inc\footer.php';?>