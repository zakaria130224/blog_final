<?php include 'inc\header.php';?>
<?php include 'inc\slider.php';?>

<div>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
		<!--Pagination-->
			<?php 
				$per_page=4;
				if (isset($_GET["page"])) {
					$page=$_GET["page"];
				}else{
					$page=1;
				}
				$start_page=($page-1)*$per_page;
			?>
		<!--Pagination-->

		<?php
			$query=("SELECT * ,tbl_admins.admin_name,tbl_admins.admin_id
					 FROM tbl_post 
					 inner join tbl_admins 
					 on tbl_admins.admin_id=tbl_post.admin_id 
					  inner join tbl_category
					 on tbl_category.cat_id=tbl_post.cat_id 
					 order by id desc
					 limit $start_page,$per_page
					 ");
			$post=$db->select($query);
			if ($post) {
				while ($result=$post->fetch_assoc()){
				
		?>
			<div class="samepost clear">
				<h2><a href="post.php?id=<?php echo $result['id'] ?>"><?php echo $result['title'] ?></a></h2>
				<h4><?php echo $fm->format_date($result['date'] )?>, By <a href="profile.php?id=<?php echo $result['admin_id'] ?>"><?php echo $result['admin_name'] ?></a></h4>
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
			?>

			<!--Pagination-->
			<div>
				<div style=" margin-left: 180px; float: left">
			<?php
				$query="SELECT * FROM tbl_post";
				$result=$db->select($query);
				$total_rows=mysqli_num_rows($result);
				$total_page=ceil($total_rows/$per_page);
				
				echo "<ul class='pagination'>";
				echo " <li><a href='index.php?page=1'>&laquo;</a></li>";

				for ($i=1; $i <$total_page ; $i++) { 
					if ($page==$i) {
						echo "<li><a class='active' href='index.php?page=$i'>$i</a></li>";
					}else{
						
						echo "<li><a href='index.php?page=$i'>$i</a></li>";
					}
					
				}

				echo " <li><a href='index.php?page=$total_page'>&raquo;</a></li>";
				echo "</ul>";
			?>
			<!--Pagination-->

			<?php
				}else{
					header("location:404.php");
				}
			?>
			</div>
			</div>
			</div>
		

<?php include 'inc\sidebar.php';?>

<?php include 'inc\footer.php';?>
