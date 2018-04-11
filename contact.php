	<?php include 'inc\header.php';?>


	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Contact us</h2>
				<?php
					if ($_SERVER['REQUEST_METHOD']=='POST') {

						 $fname=$fm->validation($_POST['firstname']);
						 $lname=$fm->validation($_POST['lastname']);
						 $email=$fm->validation($_POST['email']);
						 $msg=$fm->validation($_POST['msg']);
						

                         $fname=mysqli_real_escape_string($db->link,$fname);
                         $lname=mysqli_real_escape_string($db->link,$lname);
                         $email=mysqli_real_escape_string($db->link,$email);
                         $msg=mysqli_real_escape_string($db->link,$msg);
                         
                         if ($fname!=""&&$lname!=""&&$email!=""&&$msg!="") {
                         	$query="INSERT INTO tbl_contact (fname,lname,email,msg) VALUES('$fname','$lname','$email','$msg')";
                                 $result=$db->insert($query);
                                 if ($result) {
                                     echo "<div class='alert alert-success'>
                                             <strong>Success!</strong> Message Send Successfully!.
                                        </div>";
                                 }else{
                                     echo "Message not Send";
                                 }
                         }
					}
                                
				?>
			<form action="" method="post">
				<table>
				<tr>
					<td>Your First Name:</td>
					<td>
					<input type="text" name="firstname" placeholder="Enter first name" required="1"/>
					</td>
				</tr>
				<tr>
					<td>Your Last Name:</td>
					<td>
					<input type="text" name="lastname" placeholder="Enter Last name" required="1"/>
					</td>
				</tr>
				
				<tr>
					<td>Your Email Address:</td>
					<td>
					<input type="email" name="email" placeholder="Enter Email Address" required="1"/>
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					<td>
					<textarea name="msg" required="1"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Send"/>
					</td>
				</tr>
		</table>
	<form>				
 </div>

		</div>
<?php include 'inc\sidebar.php';?>
<?php include 'inc\footer.php';?>
