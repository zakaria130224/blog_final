<?php include 'inc\header.php';?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <?php
		            if(isset($_GET['catid'])){
		            	 $id=$_GET['catid'];
			                $query="DELETE FROM tbl_category WHERE cat_id='$id'";
							$category=$db->delete($query);
							$query1="DELETE FROM tbl_post WHERE cat_id='$id'";
							$post=$db->delete($query1);
							if ($category&&$post) {
				                 echo "<div class='alert alert-success'>
				                         <strong>Success!</strong> Category delete Successfully!.
				                    </div>";
				             }else{
				                 echo "Category Not deleted!!";
				             }
				         }
       			 ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$query="SELECT * FROM tbl_category order by cat_id desc";
						$category=$db->select($query);
						if ($category) {
							$i=1;
							while ($result=$category->fetch_assoc()) {
							

					?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['cat_name'];?></td>
							<td><a href="editcat.php?catid=<?php echo $result['cat_id'];?>">Edit</a> || <a onclick="return confirm('Are you Sure to Delete This Category and Related Post???');" href="?catid=<?php echo $result['cat_id'];?>">Delete</a></td>
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
        <div class="clear">
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