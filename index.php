<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

  <div class="navbar">
    <a href="include/config.php">DB Connection</a>
    <div class="dropdown">
      <button class="dropbtn">Customer
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="customer/custForm.php">Create Customer</a>
        <a href="customer/custList.php">Manage Customer</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn">Product
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="product/productForm.php">Create Product</a>
        <a href="#">Manage Product</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn">Order
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="order/orderForm.php">Create Order</a>
        <a href="order/orderList.php">Manage Order</a>
      </div>
    </div>
  </div>


</body>

</html>