<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<style>
  body{
    overflow-x: hidden;
    overflow-y: hidden;
}
.py-100{
    padding: 180px 0;
}
.online{
    background-color:rgba(191,113,84,0.1);
}
.online h1{
    font-size: 48px;
    color:black;
}

.inputfile{
    position: relative;
    bottom: 35px;
    font-size: 1.25em;
    font-weight: 700;
    color: black;
    background-color: transparent;
    display: inline-block;
    cursor: pointer;
    border: 1px solid #433520;
}
.inputfile:focus,
.inputfile:hover {
    background-color: #bf7154;;
}
h5{
    position: relative;
    bottom:220px;
    left:530px;
    color : red;
}
a{
color:black;	
}
.forget{
	text-decoration:none;
	font-weight:bold;
    position: relative;
    bottom:30px;
    color:black;
}
.forget:hover{
	text-decoration:none;
    color: #bf7154;
    }

.pos{
	width:500px;
}
.head{
	text-align:center;
	position:relative;	
}
.forms{
    border:1px solid #433520;
    background-color: white;
}
</style>
<?php
include 'classes.php';
 session_start();


?>
    <div class="online py-100">
		<div class="container pos">
			<div class="row">
				<div class="col-lg">
					<form action="" method = "post">
						<div class="form">	
							<h1 class="head">Login</h1>
							<input type="text"class="forms form-control mb-4 py-4 " name="Email"placeholder="Your email.."><br>
							<input type="password"class="forms form-control mb-4  py-4 "id="fname" name="Password" placeholder="Your password.."><br>
							<input type="submit"class="inputfile btn w-100 py-3" value="Submit" name="Submit">
							<a href="signup.php" class="forget">  Haven't got an account?</a>
						</div>
					</form>
				</div>
			</div>	
		</div>
	</div>
<?php
if(isset($_POST["Submit"]))
{ 
    
       $_SESSION['User']=new accounts();
    $result=   $_SESSION['User']->login($_POST['Email'],$_POST['Password']);
    if($row=mysqli_fetch_array($result))	
	{
           $_SESSION['User']->id=$row[0];
		   $_SESSION['User']->name=$row[1];
	       $_SESSION['User']->mobileno=$row[2];
           $_SESSION['User']->address=$row[3];
           $_SESSION['User']->email=$row[4];
           $_SESSION['User']->password=$row[5];
           $_SESSION['User']->role=$row[6];
      
        $_SESSION['cart']=array();
        header("location:menu.php");
         
        
	}
    else	
	{
		echo "<h5>*Incorrect E-Mail or Password.</h5>";
	}


	

}
?>