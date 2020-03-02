
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */


/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 20% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
 /* border: 1px solid #888;*/
 /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
 

 <div class="container" >
	<div class="login-div">
		<form class="modal-content animate col-md-6 col-md-offset-3" action="#" id="login" method="">
			<div class="imgcontainer">
			 <h2>Task Manager - LOGIN</h2>
			   
			  <!-- <img src="https://www.w3schools.com/howto/img_avatar2.png" alt="Avatar" class="avatar"> -->
			</div> 
			<div class="login-message"></div>
			<div class="container">
			  <label for="uname"><b>Username</b></label>
			  <input type="text" placeholder="Enter Username" name="uname" required>

			  <label for="psw"><b>Password</b></label>
			  <input type="password" placeholder="Enter Password" name="psw" required>
				
			  <button class="btn-primary login-account" type="submit">Login</button>
			  <label class="pull-left">
				<input type="checkbox" checked="checked" name="remember"> Remember me
			  </label>
			  <span class="register btn btn-success btn-sm" style="float:right;"> Register</span>
			</div>

			<div class="container" style="background-color:#f1f1f1">
			  <!-- <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button> -->
			   
			  <span class="" style="text-align:center;">Forgot <a href="#">password?</a></span>
			</div>
		  </form>
	
	</div>
	
	
	<div class="register-div">
			<form class="modal-content animate col-md-6 col-md-offset-3" action="#" id="register">
			<div class="imgcontainer">
			 <h2>Task Manager - REGISTER</h2>
			  
			  <!-- <img src="https://www.w3schools.com/howto/img_avatar2.png" alt="Avatar" class="avatar"> -->
			</div> 
			<div class="message"></div>
			<div class="container">
			  <label for="uname"><b>Username <sup style="color:red;">*</sup></b></label>
			  <input type="text" placeholder="Enter Username" name="username" id="username" required>
			  
			    <label for="uname"><b>Full Name <sup style="color:red;">*</sup></b></label>
			  <input type="text" placeholder="Enter Full Name" name="name" id="name" required>
 
			  
			  <label for="email"><b>Email <sup style="color:red;">*</sup></b></label>
			  <input type="text" placeholder="Enter Email" name="email" id="email"  required>

			  <label for="psw"><b>Password <sup style="color:red;">*</sup></b></label>
			  <input type="password" placeholder="Enter Password" name="password" id="password" required>
			  
			  <label for="psw"><b>Confirm Password <sup style="color:red;">*</sup></b></label>
			  <input type="password" placeholder="Enter Confirm Password" name="confirm-password" id="confirm-password" required>
				
			  <button class="register-accout btn-primary" type="submit">Register</button>
			  <label class="pull-left">
				<input type="checkbox" checked="checked" name="remember"> Remember me
			  </label>
			  <span class="btn btn-success login btn-sm" style="float:right;">Login</span>
			</div>

			<div class="container" style="background-color:#f1f1f1">
			   
			   
			  <span class="" style="text-align:center;">Forgot <a href="#">password?</a></span>
			</div>
		  </form>
	
	</div>


<div>
<style>

.validation-error{
	color:red;
	
}

</style>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

$(document).ready(function(){
	 
		$('.register-div').hide();
	$('.register').on('click',function(){
	 $('.register-div').show();
		$('.login-div').hide();
	});
	$('.login').on('click',function(){
		$('.register-div').hide();
		$('.login-div').show();
	});
	
	
	$('.register-accout').on('click',function(e){
		e.preventDefault();
		
		var password = $('#password').val();
		var confirm_password = $('#confirm-password').val();
		if(password != confirm_password){
			$('#confirm-password').after('<p class="validation-error">Confirm Password is not same.</p>')
			return false;
			}
			$.ajax({
				url:'<?php echo site_url('user_account/register'); ?>',
				data: $('#register').serialize(),
				type:"POST",
				dataType:'json',
				success:function(response){
					console.log(response.success);
						$('.message').html('');
					if(response.success){
						var message =   response.message  ;
						 message +=   'Please check Email '+response.email  ;
						
						$('.message').html('<div class="alert alert-success">'+ message + '</div>');
						
						location.href = '<?php echo site_url('user_account'); ?>';
					}else{
						$('.message').html('<div class="alert  bg-warning">'+ response.message +'</div>');
					}
					
				}
			})
	});


$('.login-account').on('click',function(e){
		e.preventDefault();
		 $.ajax({
				url:'<?php echo site_url('user_account/login'); ?>',
				data: $('#login').serialize(),
				type:"POST",
				dataType:'json',
				success:function(response){
					console.log(response)
						$('.login-message').html('');
					if(response.success){
						var message =   response.message  ;
						$('.login-message').html('<div class="alert alert-success">'+ message + '</div>');
						
						location.href = '<?php echo site_url('task_manager/my_tasks'); ?>';
					}else{1
						$('.login-message').html('<div class="alert alert-danger">'+ response.message +'</div>');
					}
					
				}
			})
	});
});


</script>

</body>
</html>
