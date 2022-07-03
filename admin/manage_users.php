<?php
require('top.inc.php');
isAdmin();
$username='';
$msg='';
$password='';
$email='';
$msg='';

if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from admin_users where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$username=$row['username'];
		$password=$row['password'];
		$email=$row['email'];
	}else{
		header('location:users.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$username=get_safe_value($con,$_POST['username']);
	$password=get_safe_value($con,$_POST['password']);
	$email=get_safe_value($con,$_POST['email']);
	$res=mysqli_query($con,"select * from admin_users where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){

			}else{
				$msg="USER ALREADY EXIST";
			}
		}else{
			$msg="USER ALREADY EXIST";
		}
	}

	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			mysqli_query($con,"update admin_users set username='$username', email='$email', password='$password' where id='$id'");
		}else{
			mysqli_query($con,"insert into admin_users(username,password,email,status) values('$username','$password','$email','1')");
		}
		header('location:users.php');
		die();
	}
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header" style="padding-left:80px;"><strong>ADDING FORM</strong> </div>
                        <form method="post">
							<div class="card-body card-block">
							   <div class="form-group">
									<label for="users" class=" form-control-label">Username</label>
									<input type="text" name="username" placeholder="ENTER USERNAME" class="form-control" required value="<?php echo $username?>">
									<label for="users" class=" form-control-label">PASSWORD</label>
									<input type="text" name="password" placeholder="ENTER PASSWORD" class="form-control" required value="<?php echo $password?>">
									<label for="users" class=" form-control-label">EMAIL</label>
									<input type="text" name="email" placeholder="ENTER EMAIL" class="form-control" required value="<?php echo $email?>">
								</div>
							   <button style="background-color:#008080" id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">SUBMIT</span>
							   </button>
							   <div class="field_error"><?php echo $msg?></div>
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>

<?php
require('footer.inc.php');
?>
