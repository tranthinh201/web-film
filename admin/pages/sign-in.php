<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng nhập</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../assets/css/main.css">

</head>
<body>

<?php
	  session_start();
			if (isset($_SESSION['thongbao'])) {
				
				echo '<script type="text/javascript">alert("'. $_SESSION['thongbao'].'")</script>'; 
				session_unset();
			}
    
		if (isset($_SESSION['thongbaoo'])) {
			echo '<script type="text/javascript">alert("'. $_SESSION['thongbaoo'].'")</script>'; 
			session_unset();
		}
      ?>
<form class="form-structor" action="./si_submit.php" method="POST">
	<div class="signup">
		<h2 class="form-title" id="signup">Đăng nhập</h2>
		<div class="form-holder">
			<input type="text" class="input" placeholder="Username" name="username"/>
			<input type="password" class="input" placeholder="Password" name="password" />
		</div>
		<button class="submit-btn" type="submit" name="submit">Đăng nhập</button>
	</div>
	<div class="login slide-up">
		<div class="center">
			<!-- <h2 class="form-title" id="login"><span>or</span>Log in</h2> -->
			<div class="form-holder">
				<input type="email" class="input" placeholder="Email" />
				<input type="password" class="input" placeholder="Password" />
			</div>
			
		</div>
	</div>
</form>
</body>
</html>


