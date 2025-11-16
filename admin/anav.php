<style>
.topnav a {
  border-bottom: 3px solid transparent;
}

.topnav a:hover {
  border-bottom: 3px solid red;
}

.topnav a.activa {
  border-bottom: 3px solid red;
}

</style>	
	
  <script>
$("#nav li a").each(function() {   
    if (this.href == window.location.href) {
        $(this).addClass("activaa");
    }
});
  </script>

<!-- check -->
  <nav
  id="navbar-main"
      class="navbar bg-success navbar-expand-lg navbar-light fixed-top py-3 bg-success opacity-85" data-navbar-on-scroll="data-navbar-on-scroll">
      <div class="container"><a class="navbar-brand" href="#"><img class="d-inline-block align-top img-fluid" src="../assets/img/sfa-logo.png" alt="" width="100" /><span class="text-theme font-monospace fs-4 ps-2"></span></a>
      <button 
        class="navbar-toggler collapsed" 
        type="button" 
        data-bs-toggle="collapse" 
        data-bs-target="#navbarSupportedContent" 
        aria-controls="navbarSupportedContent" 
        aria-expanded="false" 
        aria-label="Toggle navigation"
        >
        <span class="navbar-toggler-icon"></span>
      </button>
         <div class="navbar-collapse collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
         <ul class="navbar-nav align-items-lg-center ml-auto topnav" id="nav">
		
         <li class="nav-item px-2">
              <a href="afarmers.php" class="nav-link">
                <span class="text-dark nav-link-inner--text font-weight-bold"
                  ><i class="text-dark fas fa-users"></i> Farmers</span
                >
              </a>
            </li>

            <li class="nav-item px-2">
              <a href="acustomers.php" class="nav-link">
                <span class="text-dark nav-link-inner--text font-weight-bold"
                  ><i class="text-dark fas fa-users"></i> Customers</span
                >
              </a>
            </li>
            <li class="nav-item px-2">
              <a href="aproducedcrop.php" class="nav-link">
                <span class="text-dark nav-link-inner--text font-weight-bold"
                  ><i class="text-dark fad fa-store-alt"></i> Crop Stock</span
                >
              </a>
            </li>     
            <div class="navbar-collapse collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
              <ul class="navbar-nav align-items-lg-center ml-auto topnav" id="nav">
                <li class="nav-item px-2" id="prediction"><div class="dropdown show ">
                  <a class="nav-link dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="text-dark nav-link-inner--text font-weight-bold"
                ><i class="fa fa-shopping-bag" aria-hidden="true"></i> Orders</span>
                  </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="orders.php">Customers​</a>
                    <a class="dropdown-item" href="farmerhistory.php">Farmers</a> 
                    </div>
                    </div>  
            <li class="nav-item px-2">
              <a href="aviewmsg.php" class="nav-link">
                <span class="text-dark nav-link-inner--text font-weight-bold"
                  ><i class="text-dark fas fa-address-card"></i> Queries</span
                >
              </a>
            </li>
		
		   <li class="nav-item px-2" id="profile">
              <a href="aprofile.php" class="nav-link">
                <span class="nav-link-inner--text font-weight-bold"
                  ><i class="fas fa-user"></i> <?php echo $para2 ?> </span
                >
              </a>
            </li>
			
			
		  
		   <li class="nav-item px-2">
              <a href="alogout.php" class="nav-link">
                <span class="nav-link-inner--text font-weight-bold"
                  ><i class="text-danger fas fa-power-off"></i> Logout </span
                >
              </a>
</li>
          </ul>
          
        </div>
      </div>
    </nav>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Chivo:wght@300;400;700;900&amp;display=swap" rel="stylesheet"> -->
    
  </body>
</html>
<!-- <nav
      id="navbar-main"
      class="
        navbar navbar-main navbar-expand-lg
        bg-default
        navbar-light
        position-sticky
        top-0
        shadow
        py-0
      "
    >
      <div class="container-fluid">
        <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
          <li class="nav-item dropdown">
            <a href="../index.php" class="navbar-brand mr-lg-5 text-white">
                               <img src="../assets/img/nav.png" />
            </a>
          </li>
        </ul>

        <button
          class="navbar-toggler bg-white"
          type="button"
          data-toggle="collapse"
          data-target="#navbar_global"
          aria-controls="navbar_global"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon text-white"></span>
        </button>
        <div class="navbar-collapse collapse bg-default" id="navbar_global">
          <div class="navbar-collapse-header">
            <div class="row">
              <div class="col-10 collapse-brand">
                <a href="../index.html">
                  <img src="../assets/img/nav.png" />
                </a>
              </div>
              <div class="col-2 collapse-close bg-danger">
                <button
                  type="button"
                  class="navbar-toggler"
                  data-toggle="collapse"
                  data-target="#navbar_global"
                  aria-controls="navbar_global"
                  aria-expanded="false"
                  aria-label="Toggle navigation"
                >
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>

          <ul class="navbar-nav align-items-lg-center ml-auto topnav">
		  
		  	 
		  
			 <li class="nav-item">
              <a href="afarmers.php" class="nav-link">
                <span class="text-white nav-link-inner--text font-weight-bold"
                  ><i class="text-white fas fa-users"></i> Farmers</span
                >
              </a>
            </li>
			
			<li class="nav-item">
              <a href="acustomers.php" class="nav-link">
                <span class="text-white nav-link-inner--text font-weight-bold"
                  ><i class="text-white fas fa-users"></i> Customers</span
                >
              </a>
            </li>
		
		
		      
		  
			<li class="nav-item">
              <a href="aproducedcrop.php" class="nav-link">
                <span class="text-white nav-link-inner--text font-weight-bold"
                  ><i class="text-white fad fa-store-alt"></i> Crop Stock</span
                >
              </a>
            </li>
			
	
			 			 		

			
			<li class="nav-item">
              <a href="aviewmsg.php" class="nav-link">
                <span class="text-white nav-link-inner--text font-weight-bold"
                  ><i class="text-white fas fa-address-card"></i> Queries</span
                >
              </a>
            </li>
			
			
		   <li class="nav-item">
              <a href="aprofile.php" class="nav-link">
                <span class="text-white nav-link-inner--text font-weight-bold"
                  ><i class="text-white fas fa-user"></i> <?php echo $para2 ?> </span
                >
              </a>
            </li>
			
			
		  
		   <li class="nav-item">
              <a href="alogout.php" class="nav-link">
                <span class="text-white nav-link-inner--text font-weight-bold"
                  ><i class="text-danger fas fa-power-off"></i> Logout </span
                >
              </a>
            </li>



          </ul>
        </div>
      </div>
    </nav>
	

<style>
.topnav a {
  border-bottom: 3px solid transparent;
}

.topnav a:hover {
  border-bottom: 3px solid red;
}

.topnav a.activa {
  border-bottom: 3px solid red;
}

</style>	
	
  <script>
$("#nav li a").each(function() {   
    if (this.href == window.location.href) {
        $(this).addClass("activaa");
    }
});
  </script> -->