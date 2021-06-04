<style>
body{
       overflow-x:hidden;
       overflow-y:hidden;
       background-color:rgba(191,113,84,0.1);
}
.product-item {
       background-color:rgba(191,113,84,0.1);      
        margin:20px 21px;	
       padding:5px;
       border:#85603f 1px solid;
       border-radius:4px;
       width:320px;
       position:relative;
       left:580px;
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
       background-color:#4a3933;
       color:white;
}
.drink{
       color:black;
}
.customize{
       text-decoration:none;
       color:black;      
}
.customize:hover{
       color:white;
}
.new{
       width:320px;
       height:50px;
       border:1px solid #e3d18a;
       background-color: #bf7154;
       cursor: pointer;
       position:relative;
       top:10px;
       }
.new:hover{
       background-color:rgba(191,113,84,0.8);
       color:white;
   
}
</style>
<?php
ob_start();

include 'classes.php'; 
session_start();

include "nav.php";


$result = $_SESSION['menu']->viewDetails($_GET['X']);
$_SESSION['orders']=new orders();

while($row=mysqli_fetch_array($result))	
{
  $_SESSION['menu']->id=$row[0];
  $_SESSION['menu']->name=$row[1];
  $_SESSION['menu']->description=$row[3];
  $_SESSION['menu']->price=$row[2];
  $_SESSION['menu']->image=$row[4];
 
}
?> 
<div class="product-item">
          <img src=<?php echo ( $_SESSION['menu']->image); ?> class="image">
          <span><h2 class="drink"><?php echo(  $_SESSION['menu']->name);?> </h2></span>
          <span><h2 class="drink"><?php echo( $_SESSION['menu']->price);?> EGP</h2></span>      
          <form action="" method="post">
            <span><h5><?php echo($_SESSION['menu']->description);?> </h5></span>
            <span><label class="drink" for="Choose size"><h5>Pick a cup size</h5></label></span>
            <span><select name="size" id="size"></span>
              <option hidden disabled selected value> Choose cup size </option>
              <option value="Small">Small</option>
              <option value="Medium">Medium</option>
              <option value="Large">Large</option>
            </select>
            <button type="button" class="px-3 py-2 border-right" onClick="dec();">-</button>
            <input type="text"class="counter"size="1" name="quantity" id="counter" readonly value=1></input>
            <button type="button" class="px-3 py-2 border-left" onClick="inc();">+</button>
            <span><input type="submit" class="new" value="Add to cart" class="home-addtocart" name="addtocart" id="addtocart"></button></span><br>
          </form>
</div>          
            
<script>
  function inc(){
  var counter=document.getElementById("counter").value;
  counter++;
  document.getElementById("counter").value=counter;

  }
  function dec(){
    var counter=document.getElementById("counter").value;
    if(counter>1){
  counter--;
    }
  document.getElementById("counter").value=counter;



  }
</script>

  <?php
  if(isset($_POST["addtocart"])){

$quantity=$_POST['quantity'];
$size=$_POST['size'];
   
    $_SESSION['orders']->addItem($_SESSION['menu']->name,$_SESSION['menu']->price,$quantity,$size,$_SESSION['menu']->id);
    
  }
  ?>

<?php
 ob_end_flush(); 
 
?>
<?php
ob_end_flush();
?>