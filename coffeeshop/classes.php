<?php

class DB_Handler{
    public $conn;
    function create_connection(){
        $this->conn = new mysqli("localhost", "root", "", "coffeshop");
        return $this->conn;
    }

}

class accounts extends DB_Handler{
   public $name;
   public $mobileno;
   public $role;
   public $address;
   public $email;
   public $password;
  

function login($email,$password){

$conn=$this->create_connection();
$sql="SELECT * from accounts where '$email'=Email AND '$password'=Password";
$result = mysqli_query($conn,$sql);	 
return $result;


}
function register($name,$mobileno,$address,$email,$password){

    $conn=$this->create_connection();
   $sql= "SELECT * FROM accounts where Email='$email'";
    $result=mysqli_query($conn,$sql);
    $num_rows = mysqli_num_rows($result);
    if($num_rows >= 1)
    {
      echo "<h5>*Email already exists</h5>"; 
    }
    else{
   
$role=1;
$sql="INSERT INTO accounts (Name,Email,Password,Role,Mobile,Address) values('$name','$email','$password','$role' ,'$mobileno','$address')";
$result = mysqli_query($conn,$sql);	 
return $result;
    }

}
function signout(){

    session_destroy();
    
header("Location:login.php");
}



}
class menu extends DB_Handler{

public $id;
public $name;
public $description;
public $price;
public $image;

function showMenu(){
    
    $conn=$this->create_connection();
    $sql="SELECT * from drinks";
    $result = mysqli_query($conn,$sql);	 
    return $result;

}
function viewDetails($id){
    $conn=$this->create_connection();
    $sql="SELECT * from drinks WHERE ID='$id'";
    $result = mysqli_query($conn,$sql);	 
    return $result;
}


}
class orders extends DB_Handler{
  
function checkout($CID,$total){
    $conn=$this->create_connection();
    $sql="INSERT INTO orders (CID,Total) values ('$CID','$total')";
    $result = mysqli_query($conn,$sql);	
    $newest_id = mysqli_insert_id($conn);
    return $newest_id;
  

}
function checkout2($oid,$name,$quantity,$size,$price){
    $conn=$this->create_connection();
    $sql="INSERT INTO orderedproducts(OID,Product,Size,Quantity,Price) values ('$oid','$name','$size','$quantity','$price')";
    $result=mysqli_query($conn,$sql);
    header("Location:menu.php");

}
function addItem($name,$price,$quantity,$size,$id){

    array_push($_SESSION['cart'],array("Product"=>$name,"Price"=>$price,"Quantity"=>$quantity,"Size"=>$size,"ID"=>$id));
    header("Location:cart.php");



}

}
class customize extends menu{


    function showBeverages(){
$conn=$this->create_connection();
$sql="SELECT * from beverages";
return $result = mysqli_query($conn,$sql);	 

    }
    function showAdditions(){
        $conn=$this->create_connection();
        $sql="SELECT * from additions";
        return $result = mysqli_query($conn,$sql);	 
    }
    function getBeverage($id){
        $conn=$this->create_connection();
        $sql="SELECT * from Beverages where ID='$id'";
        $result = mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result);
       
            $fields = [
                "name" => $row[1],
                "price" => $row[2]
              ];
              return $fields;
    }


}


?>