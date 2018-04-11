<?php include 'inc\header.php';?>



	<div class="contentsection contemplete clear">
		<div class="maincontent clear">

		<?php
			if (isset($_GET['catid'])) {
			$id=$_GET['catid'];
			}else{
			header("location:404.php");
		}
			$query=("SELECT * ,tbl_admins.admin_name
					 FROM tbl_post 
					 inner join tbl_admins 
					 on tbl_admins.admin_id=tbl_post.admin_id  and cat_id=$id");
			$post=$db->select($query);
			if ($post) {
				while ($result=$post->fetch_assoc()){
				
		?>
			<div class="samepost clear">
				<h2><a href="post.php?id=<?php echo $result['id'] ?>"><?php echo $result['title'] ?></a></h2>
				<h4><?php echo $fm->format_date($result['date'] )?>, By <a href="#"><?php echo $result['admin_name'] ?></a></h4>
				 <a href="post.php?id=<?php echo $result['id'] ?>"><img src="admin/<?php echo$result['image']?>" alt="post image"/></a>
				<p>
					<?php echo $fm->textShortent($result['body'] )?>
				</p>
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $result['id'] ?>">Read More</a>
				</div>
			</div>

			<?php
				}
			}else{
				header("location:404.php");
			}
			?>
		</div>

<?php include 'inc\sidebar.php';?>
<?php include 'inc\footer.php';?>
