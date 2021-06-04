
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #bf7154;
  height:50px;
}

li {
  float: left;
  padding-left:220px;
  
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
li.name {
  display: block;
  color: #754C00;
  font-weight: bold;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
li a:hover {
  background-color:rgba(191,113,84,0.8);
}
</style>
</head>
<body>

<ul>
<li class="name">Welcome <?php echo $_SESSION['User']->name;?></li>
  <li><a href="menu.php">Menu</a></li>
  <li><a href="customizedrink.php">Customize drink</a></li>
  <li><a href="cart.php">Cart</a></li>
  <li><a href="signout.php">Signout</a></li>

</ul>
