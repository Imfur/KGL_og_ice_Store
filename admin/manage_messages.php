<?php
require('top.inc1.php');
$name='';
$msg='';
$email='';
$message='';

if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from messages where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$name=$row['name'];
		$email=$row['email'];
		$message=$row['message'];
	}else{
		header('location:messages.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$name=get_safe_value($con,$_POST['name']);
	$email=get_safe_value($con,$_POST['email']);
	$message=get_safe_value($con,$_POST['message']);
	$res=mysqli_query($con,"select * from messages where id='$id'");
	$check=mysqli_num_rows($res);

	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			mysqli_query($con,"update messages set (name='$name' where id='$id'");
			mysqli_query($con,"update messages set (email='$email' where id='$id'");
			mysqli_query($con,"update messages set (message='$message' where id='$id'");
		}else{
			mysqli_query($con,"insert into messages(name,email,message,status) values('$name','$email','$message','1')");
		}
		header('location:message.php');
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
									<label for="messages" class=" form-control-label">Name</label>
									<input type="text" name="name" placeholder="ENTER NAME" class="form-control" required value="<?php echo $name?>">
									<label for="messages" class=" form-control-label">Email</label>
									<input type="text" name="email" placeholder="ENTER EMAIL" class="form-control" required value="<?php echo $email?>">
									<label for="messages" class=" form-control-label">Message</label>
									<input type="text" name="message" placeholder="ENTER MESSAGE" class="form-control" required value="<?php echo $message?>">
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
