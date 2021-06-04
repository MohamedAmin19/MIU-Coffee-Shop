<style>
body{
       overflow-x:hidden;
       overflow-y:hidden;
}
.product-item {
       float:left;	
       background-color:rgba(191,113,84,0.1);
       margin:40px 21px;	
       padding:5px;
       border:#85603f 1px solid;
       border-radius:4px;
}
.product-item div{
       text-align:center;	
       margin:10px;
}
.product-price{
       color: #005dbb;    
       font-weight: 600;
}
.image{
       width:320px;
       height:300px;
}
.price{
       position:relative;
       left:270px;
       bottom:77px;
}
.details{
       width:320px;
       height:50px;
       border:1px solid #e3d18a;
       cursor: pointer;
       background-color: #bf7154;
}
.details:hover{
       background-color:rgba(191,113,84,0.8);
}
.drink{
       color:black;
}
.customize{
       text-decoration:none;
       color:black;      
}
.new{
       width:320px;
       height:50px;
       border:1px solid #e3d18a;
       background-color: #bf7154;
       cursor: pointer;
       position:relative;
       left:580px;
       bottom:30px;
}
.new:hover{
       background-color:rgba(191,113,84,0.8);
   
}
</style>
<?php
ob_start();
include 'classes.php'; 
session_start();

include "nav.php";

$_SESSION['menu']=new customize();
$result =$_SESSION['menu']->showBeverages();
$_SESSION['custom']=array();
while($row=mysqli_fetch_array($result))	
{
       
          $_SESSION['menu']->id=$row[0];
          $_SESSION['menu']->name=$row[1];
          $_SESSION['menu']->price=$row[2];
    
          $_SESSION['menu']->image=$row[3];
?>
<div class="product-item" width="200px">
              <img src=<?php echo ($_SESSION['menu']->image);?> class="image">
              <form method="post" action="">
                     <span><h4 class="drink">Beverage Name:</h4> <h5 class="sub"><?php echo ($_SESSION['menu']->name);?></span></h5>
                     <span class="price"><h4 class="drink">Price</h4><h5 ><?php echo ($_SESSION['menu']->price);?> EGP</h5></span>
                     <span><button class="details" value=<?php echo $row[0];?> name="submit" type="submit">Add</button></span>
              </form>

</div>
<?php }
$_SESSION['drinkname']="";
$_SESSION['price']=0;
if (isset($_POST["submit"])) {
       $array=$_SESSION['menu']->getBeverage($_POST['submit']);
       $name= $array['name'];
       $price=$array['price'];
       array_push($_SESSION['custom'],$name,$price);
       $_SESSION['drinkname']=$_SESSION['drinkname']." " .$name;
       $_SESSION['price']=$_SESSION['price']+$price;
       header("location:additions.php");
    
}
 


?>
<?php
ob_end_flush();
?>