<?php
$con = mysqli_connect("localhost","root","","form","3308") or die(mysqli_error($con));
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"></link>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row justify-content-between">
		<div class="col-xs-6">
			<div class="card card-primary  mt-3">
				<div class="card-title text-center h3  mt-2 text-primary">SIGN UP</div>
				<div class="card-body">
					<form method="post" action="submit.php" enctype="multipart/form-data">
						<div class="form-group">
							<label for="name">Full Name:</label>
							<input type="name" class="form-control" required="true" name="name" placeholder="Full Name">
						</div>	
						<div class="form-group">
						    <label for="email">Email address:</label>
						    <input type="email" class="form-control" required="true" name="email" placeholder="Email address">
						</div>
						<div class="form-group">
						    <label for="pwd">Password:</label>
						    <p>(uppercase, lowercase, number/specialchar and min 8 chars)</p>
						    <input type="password" class="form-control" required="true" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" name="pwd" placeholder="Password">
						</div>
						<div class="form-group">
							<label for="confirmPass">Confirm Passwword:</label>
							<input type="password" class="form-control" required="true" name="confirmPass" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" placeholder="Confirm Password">
						</div>
                        <div class="custom-file">
                            <label class="form-label" for="file">Default file input example</label>
                            <input type="file" required class="form-control" name="file" id="file" />
                        </div>	
						<div class="form-group mt-3">
							<label for="address">Address:</label>
							<textarea class="form-control" name="address" placeholder="Full Address"></textarea>
						</div>	
						  <button type="submit" class="btn btn-primary ">Submit</button>
					</form>	  
				</div>
			</div>
		</div>
        <div class="col-xs-5">
<?php
if(isset($_SESSION['name'])){
    $name = $_SESSION['name'];
    
    $query = "SELECT name,email,address,file FROM user WHERE (name = '$name')";
    $submit = mysqli_query($con,$query);
	$row = mysqli_fetch_array($submit);

	$email = $row['email'];
	$address = $row['address'];
	$file = $row['file'];
?>       
                <table class="table" id="tab">
                    <thead>
                    <tr>
                        <th>Category</th>
                        <th> </th>
						<th> </th>
                        <th> </th>
                        <th>Delete</th>
                    </tr>
                    </thead>
					<tr>
						<td><?php echo 'Name: '.$name ?></td>
						<td></td>
						<td></td>
						<td></td>
						<?php echo "<td><a href='delete.php?name={$name}' class='btn-block btn btn-primary'>Remove</a></td> " ?>

					</tr>
					<tr>
						<td><?php echo 'Address: '.$address ?></td>
						<td></td>
						<td></td>
						<td></td>
						<?php echo "<td><a href='delete.php?address={$address}' class='btn-block btn btn-primary'>Remove</a></td> " ?>
					</tr>
					<tr>
						<td><?php echo 'Email: '.$email ?></td>
						<td></td>
						<td></td>
						<td></td>
						<?php echo "<td><a href='delete.php?email={$email}' class='btn-block btn btn-primary'>Remove</a></td> " ?>
					</tr>
					<tr>
						<td><?php echo 'File: '.$file ?></td>
						<td></td>
						<td></td>
						<td></td>
						<?php echo "<td><a href='delete.php?file={$file}' class='btn-block btn btn-primary'>Remove</a></td> " ?>
					</tr>
                </table>
<?php
}
?>

        </div>
	</div>
</div>
</body>
</html>