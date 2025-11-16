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
      class="navbar navbar-expand-lg navbar-light fixed-top py-1 bg-light opacity-85" data-navbar-on-scroll="data-navbar-on-scroll">
      <div class="container"><a class="navbar-brand" href="#"><img class="d-inline-block align-top img-fluid" src="../assets/img/sfa-logo.png" alt="" width="70" /><span class="text-theme font-monospace fs-5 ps-2"></span></a>
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
         <div class="navbar-collapse collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">

         <ul class="navbar-nav align-items-lg-center ml-auto topnav" id="nav">

          <li class="nav-item px-2" id="prediction"><div class="dropdown show ">
		  <a class="nav-link dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		                  <span class="nav-link-inner--text"
                  ><i class="fas fa-magic"></i> Prediction</span
                >
		  </a>

		   <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
		   <a class="dropdown-item" href="fcrop_prediction.php">Crop Prediction​</a>
			<a class="dropdown-item" href="frainfall_prediction.php">Rainfall Prediction​</a>
		  </div>
		</div>
			</li>
			
			
			
			 <li class="nav-item px-2" id="recommendation">
			   <div class="dropdown show ">
		  <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		                  <span class="nav-link-inner--text"
                  ><i class="fas fa-gavel"></i> Recommendation</span
                >
		  </a>

		   <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
			<a class="dropdown-item" href="fcrop_recommendation.php">Crop Recommendation​</a>
			<a class="dropdown-item" href="ffertilizer_recommendation.php">Fertilizer Recommendation​</a>
		  </div>
		</div>
			</li>
			

		  
			 <li class="nav-item px-2" id="trade">
			   <div class="dropdown show">
		  <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		                  <span class="nav-link-inner--text"
                  ><i class="fas fa-shopping-cart"></i> Trade</span
                >
		  </a>

		   <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
			<a class="dropdown-item" href="ftradecrops.php">Trade Crops​</a>
			<a class="dropdown-item" href="fstock_crop.php">Crop Stocks​</a>
			<a class="dropdown-item" href="fmy_crop.php">My crops​</a>
			<!-- <a class="dropdown-item" href="fselling_history.php">Selling History​</a> -->
		  </div>
		</div>
			</li>
			

			 
			
						 <li class="nav-item px-2" id="tools">
			   <div class="dropdown show ">
		  <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		                  <span class="nav-link-inner--text"
                  ><i class="fas fa-gear"></i> Tools</span
                >
		  </a>

		   <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
		   <!-- <a class="dropdown-item" href="fchatgpt.php"> <i class="text-dark fad fa-robot"></i>Chat Bot​</a> -->
			<a class="dropdown-item" href="fweather_prediction.php"><i class="text-dark fas fa-cloud"></i> Weather Monitoring</a>
			<a class="dropdown-item" href="fnewsfeed.php"> <i class="text-dark fas fa-newspaper"></i>News Feed​</a>
		  </div>
		</div>
			</li>
			
		
		
		   <li class="nav-item px-2" id="profile">
              <a href="fprofile.php" class="nav-link">
                <span class="nav-link-inner--text font-weight-bold"
                  ><i class="fas fa-user"></i> <?php echo isset($para2) ? $para2 : (isset($login_session) ? $login_session : 'Profile'); ?> </span
                >
              </a>
            </li>
			
			
		  
		   <li class="nav-item px-2">
              <a href="flogout.php" class="nav-link">
                <span class="nav-link-inner--text font-weight-bold"
                  ><i class="text-danger fas fa-power-off"></i> Logout </span
                >
              </a>
</li>
          </ul>
          
        </div>
      </div>
    </nav>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Chivo:wght@300;400;700;900&amp;display=swap" rel="stylesheet"> -->
    
  </body>
</html>
