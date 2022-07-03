<?php
require('top.inc1.php');
if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from messages where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select * from messages order by id asc";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body" style="padding-left:80px;">
				   <h4 class="box-title">Messages Table </h4>
				   <h4 class="box-link"><a href="manage_messages.php">ADD </a> </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <!--<th class="serial">#</th>-->
							   <th>ID</th>
							   <th>Name</th>
							   <th>Email</th>
							   <th>Message</th>

							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							<?php
							//$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <!--<td class="serial"></td>-->
							   <td><?php echo $row['id']?></td>
							   <td><?php echo $row['name']?></td>
							   <td><?php echo $row['email']?></td>
							   <td><?php echo $row['message']?></td>
							   <td>
								<?php
								/*if($row['status']==1){
									echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;";
								}else{
									echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;";
								}*/
								echo "<span class='badge badge-edit'><a href='manage_messages.php?id=".$row['id']."'>Edit</a></span>&nbsp;";

								echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";

								?>
							   </td>
							</tr>
							<?php } ?>
						 </tbody>
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<?php
require('footer.inc.php');
?>
