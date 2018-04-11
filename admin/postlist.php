<?php include 'inc\header.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <?php
		            if(isset($_GET['delpostid'])){
		            	 $id=$_GET['delpostid'];
							$query="SELECT * FROM tbl_post WHERE id='$id'";
							$image=$db->select($query);
							if ($image) {
								while ($result=$image->fetch_assoc()) {
									$r=$result['image'];
								}
								$delresult=unlink($r);
							}
							
			                $query="DELETE FROM tbl_post WHERE id='$id'";
							$delpost=$db->delete($query);

							if ($delpost && $delresult) {
				                 echo "<div class='alert alert-success'>
				                         <strong>Success!</strong> Post delete Successfully!.
				                    </div>";
				             }else{
				                 echo "Post Not deleted!!";
				             }
				         }
       			 ?>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead style="padding_bottom:10px">

						<tr>
							<th width="5%">No.</th>
							<th width="10%">Post Title</th>
							<th width="15%">Body</th>
							<th width="5%">Category</th>
							<th width="10%">Image</th>
							<th width="10%">Author</th>
							<th width="5%">Tags</th>
							<th width="5%">Date</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$query="SELECT * ,tbl_category.cat_name,tbl_post.id as postid,tbl_admins.admin_name,tbl_admins.username
						FROM tbl_post 
						INNER JOIN tbl_category
						ON tbl_post.cat_id=tbl_category.cat_id
						INNER JOIN tbl_admins
						ON tbl_post.admin_id=tbl_admins.admin_id
						order by tbl_post.id desc";
						$post=$db->select($query);
						if ($post) {
							$i=1;
							while ($result=$post->fetch_assoc()) {
							
					?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['title'];?></td>
							<td><?php echo $fm->textShortent($result['body'],50);?></td>
							<td><?php echo $result['cat_name'];?></td>
							<td>
								<img src="<?php echo $result['image'];?>" hight="50px" width="80px" style="padding:10px"/>
								
							</td>
							
							<td><?php echo $result['admin_name'];?></td>
							<td><?php echo $result['tag'];?></td>
							<td><?php echo  $fm->format_date( $result['date']);?></td>
							<td>

							<a href="viewpost.php?viewpostid=<?php echo $result['postid'];?>">View</a>
							<?php
								if (Session::get("username")==$result['username'] || Session::get('role')==1) { ?>
									||
									<a href="editpost.php?editpostid=<?php echo $result['postid'];?>">Edit</a>
							 		|| <a onclick="return confirm('Are you Sure to Delete!');" href="?delpostid=<?php echo $result['postid'];
							 			?>">Delete</a>
							 <?php 
								}
							?>
							 

							 </td>
						</tr>
						<?php 
								$i++;
							}
						}
						?>
					</tbody>
				</table>
	
               </div>
            </div>
        </div>

	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
<?php include 'inc\footer.php';?>