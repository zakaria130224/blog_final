	<?php include 'inc\header.php';?>
	<div class="contentsection contemplete clear">
	<?php
	$catid=0;
		if (isset($_GET['id'])) {
			$id=$_GET['id'];
		}else{
			header("location:404.php");
		}
	?>
		<div class="maincontent clear">
		<?php
		$query=("SELECT * ,tbl_admins.admin_name
					 FROM tbl_post 
					 inner join tbl_admins 
					 on tbl_admins.admin_id=tbl_post.admin_id  and id=$id");
			$post=$db->select($query);
			if ($post) {
				while ($result=$post->fetch_assoc()){
		?>
			<div class="about">
				<h2><?php echo$result['title']?></h2>
				<h4><?php echo $fm->format_date($result['date'])?>, By  <a href="profile.php?id=<?php echo $result['admin_id'] ?>"><?php echo $result['admin_name'] ?></a></h4>
				<img src="admin/<?php echo$result['image']?>" alt="MyImage"/>
				<p>
				<?php  echo $result['body'] ?>
				</p>
				<?php $catid=$result['cat_id'];?>
				<?php
						}
					}else{
						header("location:404.php");
					}
				?>

				<div id="disqus_thread"></div>
<script>

/**
 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables */
/*
var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = '//techblog-2.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
				
				<div class="relatedpost clear">
					<h2>Related articles</h2>
					<?php
					$query=("SELECT * FROM tbl_post where cat_id=$catid");
					$post=$db->select($query);
					if ($post) {
					while ($result=$post->fetch_assoc()){
				?>
					<a href="post.php?id=<?php echo $result['id'] ?>"><img src="admin/<?php echo$result['image']?>" alt="post image"/></a>
					<?php
						}
					}else{
						echo "No related post!!";
					}
				?>
				</div>
				
	</div>

		</div>
<?php include 'inc\sidebar.php';?>
<?php include 'inc\footer.php';?>
