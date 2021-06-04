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
    padding: 80px 0;
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
?>
<div class="online py-100">
		<div class="container pos">
			<div class="row">
				<div class="col-lg">
          <form action="" method = "post">
          <h1 class="head">Signup</h1>
          <input type="text"class="forms form-control mb-4 border-0 py-4 "id="fname" name="Name" placeholder="Your name.."><br> 
          <input type="text"class="forms form-control mb-4 border-0 py-4 " id="mail" name="Email" placeholder="Your Email.."><br>
          <input type="Password"class="forms form-control mb-4 border-0 py-4 " id="Password" name="Password"placeholder="Your Password.."><br>
          <input type="Age" class="forms form-control mb-4 border-0 py-4 "name="Mobile" id="Mobile" placeholder="Your Mobile Number.."><br>
          <input type="text" class="forms form-control mb-4 border-0 py-4 " id="Address" name="Address"placeholder="Your Address.."><br>
          <input type="submit"class="inputfile btn w-100 py-3" value="Submit" name="Submit">
          </form>                   
          </div>
			</div>	
		</div>
	</div>
<?php

if(isset($_POST["Submit"]))
{

  $invalid=true;
  if(strlen($_POST["Password"])<8)
  {
    $invalid=false;
  }
  else 
  {
    $checkUpper=true;
    for($i=0;$i<strlen($_POST["Password"]);$i++)
    {
      if(ctype_upper($_POST['Password'][$i]))
      {
        $checkUpper=false;
      }   
    }
  
    $checkNumeric=true;
    for($i=0;$i<strlen($_POST["Password"]);$i++)
    {
      if(is_numeric($_POST['Password'][$i]))
      {
        $checkNumeric=false;
      }
    }
  
    $checkSpecial=true;
    if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["Password"]))
    {
      $checkSpecial=false;
    }
    if($checkSpecial==true||$checkNumeric==true||$checkUpper==true)
    {
      $invalid=false;
    }
  }
  
  if(empty($_POST['Email'])||empty($_POST['Password'])||empty($_POST['Name']))
  {
   echo "<h5>*Missing fields</h5>";
  }
  else
  {
   
     if(filter_var($_POST["Email"],FILTER_VALIDATE_EMAIL))
    {
      if($invalid==true)
      {
       
      
          $role=1;
         $account=new accounts();
         $result= $account->register($_POST['Name'],$_POST['Mobile'],$_POST['Address'],$_POST['Email'],$_POST['Password']);
        
        }
       
       
       
      else 
      {
        echo "<h5>*Password should be atleast 8 chars in length & should contain <br> atleast 1 uppercase letter , 1 number , and one special char </h5>";
      }
    }
    else
    {
      echo "<h5>*Email isn't in the correct format</h5>";
    } 
  }
}
?>