<?php include 'inc\header.php';?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <?php
		            if(isset($_GET['delid'])){
		            	 $id=$_GET['delid'];
			                $query="DELETE FROM tbl_contact WHERE id='$id'";
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

							<th width="10%">Serial No.</th>
							<th width="15%">Name</th>
							<th width="20%">Email</th>
							<th width="40%">Message</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$query="SELECT * FROM tbl_contact WHERE flag='0' order by id desc";
						$contact=$db->select($query);
						if ($contact) {
							$i=1;
							while ($result=$contact->fetch_assoc()) {
							

					?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['fname']." ".$result['lname'];?></td>
							<td><?php echo $result['email'];?></td>
							<td><?php echo $fm->textShortent($result['msg'],80);?></td>
							<td><a href="reply.php?id=<?php echo $result['id'];?>">Reply</a> || <a onclick="return confirm('Are you Sure to Delete!');" href="?delid=<?php echo $result['id'];?>">Delete</a>|| <a href="msgview.php?id=<?php echo $result['id'];?>&flag=0">View</a></td>
						</tr>
						<?php $i++;}}?>
						
					</tbody>
				</table>

               </div>
            </div>

            <div class="box round first grid">
                <h2>Seen Box</h2>
                 <?php
		            if(isset($_GET['delsid'])){
		            	 $id=$_GET['delsid'];
			                $query="DELETE FROM tbl_contact WHERE id='$id'";
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

							<th width="10%">Serial No.</th>
							<th width="15%">Name</th>
							<th width="20%">Email</th>
							<th width="40%">Message</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$query="SELECT * FROM tbl_contact WHERE flag='1' order by id desc";
						$contact=$db->select($query);
						if ($contact) {
							$i=1;
							while ($result=$contact->fetch_assoc()) {
							

					?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['fname']." ".$result['lname'];?></td>
							<td><?php echo $result['email'];?></td>
							<td><?php echo $fm->textShortent($result['msg'],80);?></td>
							<td><a href="reply.php?id=<?php echo $result['id'];?>">Reply</a> || <a onclick="return confirm('Are you Sure to Delete!');" href="?delsid=<?php echo $result['id'];?>">Delete</a>|| <a href="msgview.php?id=<?php echo $result['id'];?>&flag=1">View</a></td>
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