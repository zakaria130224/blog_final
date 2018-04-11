<?php include 'inc\header.php';?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>User Application</h2>
                <?php
		            if(isset($_GET['delid'])){
		            	 $id=$_GET['delid'];
			                $query="DELETE FROM tbl_application WHERE id='$id'";
							$delmsg=$db->delete($query);
							if ($delmsg) {
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
							<th>Name</th>
							<th>Email</th>
							<th>About</th>
							<th>Message</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$query="SELECT * FROM tbl_application order by id desc";
						$application=$db->select($query);
						if ($application) {
							$i=1;
							while ($result=$application->fetch_assoc()) {
							

					?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['fname']." ".$result['lname'];?></td>
							<td><?php echo $result['email'];?></td>
							<td><?php echo $result['about'];?></td>
							<td><?php echo $result['msg'];?></td>
							<td><a href="view_app.php?id=<?php echo $result['id'];?>">View</a> || <a onclick="return confirm('Are you Sure to Delete!');" href="?delid=<?php echo $result['id'];?>">Delete</a></td>
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