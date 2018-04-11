<?php
// Session::init();
// $email=Session::get("email");
?>
<?php include 'inc\header.php';?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>View Inbox Message</h2>
                <?php
                    if ($_SERVER['REQUEST_METHOD']=='POST') {

                         $to=$fm->validation($_POST['to']);
                         $from=$fm->validation($_POST['from']);
                         $sbj=$fm->validation($_POST['sbj']);
                         $msg=$fm->validation($_POST['msgtxt']);
                        $from="From: ".$from;

                         if ($to!=""&&$from!=""&&$msg!=""&&$sbj!="") {
                         $query="INSERT INTO tbl_message (send_to,sender,subject,msg) VALUES('$to','$from','$sbj','$msg')";
                        $result=$db->insert($query);

                            $mail=mail($to,$sbj,$msg,$from);
                                 if ($mail||$result) {
                                     echo "<div class='alert alert-success'>
                                             <strong>Success!</strong> Message Send Successfully!.
                                        </div>";
                                        
                                 }else{
                                     echo "Message not Send!!";
                                 }
                         }
                    }
                                
                ?>
                
               <div class="block copyblock"> 
               <form action="" method="post">   
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
                            <td >
                               <label>To:</label>
                            </td>
                            <td>
                            <?php echo $result['email'];?>
                               
                            </td>
                        </tr>
                        <tr>
                            <td>
                                 <label>From:</label>
                            </td>
                            <td>
                                <input type="text" name="from" value=" <?php echo Session::get("email");?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                 <label>Subject:</label>
                            </td>
                            <td>
                                <input type="text" name="sbj">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label> Message:</label>
                            </td>
                            <td>
                                <textarea name="msgtxt"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td>
                                <input  type="submit" name="" value="Send">
                            </td>
                        </tr>
                        <?php }}}?>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        
<?php include 'inc\footer.php';?>