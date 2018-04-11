	<?php include 'inc\header.php';?>


	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Writer Form... </h2>
				<?php
					if ($_SERVER['REQUEST_METHOD']=='POST') {

						 $fname=$fm->validation($_POST['firstname']);
						 $lname=$fm->validation($_POST['lastname']);
						 $email=$fm->validation($_POST['email']);
						 $about=$fm->validation($_POST['about']);
						 $msg=$fm->validation($_POST['msg']);
						 //file 'll be coded later'
						

                         $fname=mysqli_real_escape_string($db->link,$fname);
                         $lname=mysqli_real_escape_string($db->link,$lname);
                         $email=mysqli_real_escape_string($db->link,$email);
                         $about=mysqli_real_escape_string($db->link,$about);
                         $msg=mysqli_real_escape_string($db->link,$msg);
                         
                         if (empty($fname) || empty($lname) || empty($email) || empty($msg)||empty($about)) {
                            echo "<div class='alert alert-warning'>
                                             <strong>Warning!</strong> Field must not be empty.
                                   </div>";
                        } 
                         else{
                         	$query="INSERT INTO tbl_application (fname,lname,email,about,msg) VALUES('$fname','$lname','$email','$about','$msg')";
                                 $result=$db->insert($query);
                                 if ($result) {
                                     echo "<div class='alert alert-success'>
                                             <strong>Success!</strong> Message Send Successfully!!! we'll infrom you soon....
                                        </div>";
                                 }else{
                                     echo "Message not Send!!";
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
					<td>Write about you (30 words):</td>
					<td>
					<textarea name="about" required="1"></textarea>
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
					<td style="padding:20px">
					<input type="submit" name="submit" value="Send"/>
					</td>
				</tr>
		</table>
	<form>				
 </div>
</div>
<?php include 'inc\sidebar.php';?>
<?php include 'inc\footer.php';?>
