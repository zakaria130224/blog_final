<?php include 'inc\header.php';?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>User List</h2>
                <?php
		            if(isset($_GET['delid'])){
		            	 $id=$_GET['delid'];
			                $query="DELETE FROM tbl_admins WHERE admin_id='$id'";
							$delmsg=$db->delete($query);
							if ($delmsg) {
				                 echo "<div class='alert alert-success'>
				                         <strong>Success!</strong> User delete Successfully!.
				                    </div>";
				             }else{
				                 echo "User Not deleted!!";
				             }
				         }
       			 ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>

							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Image</th>
							<th>Role</th>
							<th>Address</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$query="SELECT * ,tbl_role.role_name
						FROM tbl_admins 
						Inner join tbl_role
						on tbl_role.role_id=tbl_admins.role_id
						order by admin_id desc
						";
						$admin=$db->select($query);
						if ($admin) {
							$i=1;
							while ($result=$admin->fetch_assoc()) {
							

					?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['admin_name'];?></td>
							<td><?php echo $result['email'];?></td>
							<td><img 
							src="<?php 
                                if (empty($result['admin_image'])) {
                                   echo "upload/profile/post1.jpg";
                                }
                                else{
                                    echo $result['admin_image'];

                                }
                                
                                ?>"
							hight="50px" width="80px"></td>
							<td><?php echo $result['role_name'];?></td>
							<td><?php echo $result['address'];?></td>
							<td><a href="updateuser.php?id=<?php echo $result['admin_id'];?>">Update</a>|| <a onclick="return confirm('Are you Sure to Delete!');" href="?delid=<?php echo $result['admin_id'];?>">Delete</a></td>
						</tr>
						<?php $i++;}}?>
						
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