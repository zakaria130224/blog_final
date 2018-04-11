	<?php include 'inc\header.php';?>
	<?php $id=null ?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Author Profile</h2>
				<div  style="    float: left;">
				<?php
					if (isset($_GET['id'])) {
						$id=$_GET['id'];
					}else{
						header("location:404.php");
					}
				?>
				<table class="form">
				<?php
					$query=("SELECT * ,tbl_role.role_name
					 FROM tbl_admins
					 inner join tbl_role
					 on tbl_admins.role_id=tbl_role.role_id  and admin_id=$id");
			$post=$db->select($query);
			if ($post) {
				while ($result=$post->fetch_assoc()){

				?>
				<tr>
					<th style="width: 130px;"><label>Author Name:</label></th>
					<td>
					<?php echo $result['admin_name'];?>
					</td>
				</tr>
				<tr>
					<th><label>Address:</label></th>
					<td>
					<?php echo $result['address'];?>
					</td>
				</tr>
				
				<tr>
					<th><label>Email Address</label></th>

					<td>
					<?php echo $result['email'];?>
					</td>
				</tr>
				<tr>
					<th><label>About Author:</label></th>
					<td>
					<?php echo $result['about'];?>
					</td>
				</tr>
				<tr>
				<th><label>Athour Role:</label></th>
					
					<td>
					<?php echo $result['role_name'];?>
					</td>
				</tr>
				
		</table>
		</div>
		<div style="float: right;">
			<img src="<?php 
                                if (empty($result['admin_image'])) {
                                   echo "admin/upload/profile/post1.jpg";
                                }
                                else{
                                    echo "admin/".$result['admin_image'];
                                }
                                
                                ?>"
       		 style="width: 200px; height: 150px;">
		</div>
				<?php }}?>
		</div>
			<div class="relatedpost clear" style="float: left;">
					<h2>Articles</h2>
					<?php
					$query=("SELECT * FROM tbl_post where admin_id='$id'");
					$post=$db->select($query);
					if ($post) {
					while ($result=$post->fetch_assoc()){
				?>
					<a href="post.php?id=<?php echo $result['id'] ?>"><img src="admin/<?php echo $result['image']?>" alt="post image"/></a>
					<?php
						}
					}else{
						echo "No related post!!";
					}
				?>
				</div>

		</div>


		<?php include 'inc\sidebar.php';?>
<?php include 'inc\footer.php';?>
