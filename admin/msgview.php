<?php include 'inc\header.php';?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>View Inbox Message</h2>
                <?php
                    if(isset($_GET['vid'])){
                         $id=$_GET['vid'];
                            $query="UPDATE tbl_contact
                            SET flag='1'
                         WHERE id='$id'";
                            $delmsg=$db->update($query);
                            if ($delmsg) {
                                 echo "<div class='alert alert-success'>
                                         <strong>Success!</strong> Message Seen Successfully!.
                                    </div>";
                             }else{
                                 echo "Message Not Seen!!";
                             }
                         }
                 ?>
                
               <div class="block copyblock"> 
              
               <table class="form" >      
                  <?php 
                    if (isset($_GET['id'])) {
                        $id=$_GET['id'];
                        $query="SELECT * FROM tbl_contact Where id='$id'";
                        $contact=$db->select($query);
                        if ($contact) {
                            while ($result=$contact->fetch_assoc()) {

                  ?>
                    				
                        <tr>
                            <td style="width: 130px;">
                               <label> From:</label>
                            </td>
                            <td>
                                <?php echo $result['email'] ;?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                               <label> Sender Name:</label>
                            </td>
                            <td>
                                 <?php echo $result['fname']." ".$result['lname'] ;?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                               <label> Message:</label>
                            </td>
                            <td>
                                <?php echo $result['msg'] ;?>
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td>
                               <a href="reply.php?id=<?php echo $result['id'];?>"> <input  style="margin-right:20px;" type="submit" name="" value="Reply">
                               </a>
                               <?php 
                               if ($_GET['flag']==0) { ?>
                                   <a onclick="return confirm('Are you Sure to Send it Seen Box!!!');" href="?vid=<?php echo $result['id'];?>"><input  type="submit" value="OK">
                                </a>
                             <?php  }?>
                                
                            </td>
                        </tr>
                        <?php }}}?>
                    </table>

                </div>
            </div>
        </div>
        
<?php include 'inc\footer.php';?>