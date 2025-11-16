<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="assets/img/sfa-logo.png" />
    <title>Smart Farming Advisor</title>

    <!--     Fonts and icons     -->

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css "/>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

    <!-- Nucleo Icons-->
    <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />

    <link rel="stylesheet" href="assets/css/theme.css" type="text/css">

    <style>
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            min-height: 100vh;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><pattern id="grid" width="50" height="50" patternUnits="userSpaceOnUse"><path d="M 50 0 L 0 0 0 50" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="1"/></pattern></defs><rect width="100%" height="100%" fill="url(%23grid)"/></svg>');
            opacity: 0.3;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .feature-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            border-radius: 15px;
            overflow: hidden;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 2rem;
        }

        .smart-feature {
            background: linear-gradient(45deg, #4CAF50, #2E7D32);
            color: white;
        }

        .ai-feature {
            background: linear-gradient(45deg, #2196F3, #1565C0);
            color: white;
        }

        .analytics-feature {
            background: linear-gradient(45deg, #FF9800, #F57C00);
            color: white;
        }

        .section-title {
            position: relative;
            margin-bottom: 3rem;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: linear-gradient(45deg, #4CAF50, #2196F3);
            border-radius: 2px;
        }

        .stats-section {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }

        .stat-card {
            text-align: center;
            padding: 2rem;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: bold;
            color: #4CAF50;
        }

        .btn-smart {
            background: linear-gradient(45deg, #4CAF50, #2E7D32);
            border: none;
            border-radius: 25px;
            padding: 12px 30px;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-smart:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(76, 175, 80, 0.3);
            color: white;
        }

        .service-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.8;
        }

        .floating-element {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        /* Smaller navbar styling for index page */
        #navbar-main.index-navbar {
            padding-top: 0.25rem;
            padding-bottom: 0.25rem;
        }

        #navbar-main.index-navbar .navbar-brand img {
            height: auto;
        }

        #navbar-main.index-navbar .navbar-nav .nav-link {
            font-size: 0.9rem;
            padding: 0.4rem 0.5rem;
        }

        #navbar-main.index-navbar .nav-item {
            margin: 0 0.2rem;
        }

        body.index-page {
            padding-top: 70px;
        }

        @media (max-width: 991.98px) {
            body.index-page {
                padding-top: 60px;
            }
        }
    </style>
</head>

<body class="bg-white index-page" id="top">
<main class="main" id="top">
    <!-- Navbar -->
    <nav
            id="navbar-main"
            class="navbar bg-success navbar-expand-lg navbar-light fixed-top py-1 opacity-85 index-navbar" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="index.php"><img class="d-inline-block align-top img-fluid" src="assets/img/sfa-logo.png" alt="" width="60" /><span class="text-theme font-monospace fs-5 ps-2"></span></a>
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="navbar-collapse collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
                <ul class="navbar-nav align-items-lg-center ml-auto topnav" id="nav">
                    <li class="nav-item px-2"><a class="nav-link fw-medium active" aria-current="page" href="index.php">Home</a></li>
                    <li class="nav-item px-2"><a class="nav-link fw-medium" aria-current="page" href="contact.php">Contact</a></li>
                    <li class="nav-item px-2"><a class="nav-link fw-medium" href="#Opportuanities">Opportunities</a></li>
                    <li class="nav-item px-2"><div class="dropdown show">
                            <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		                  <span class="nav-link-inner--text"
                          ><i class="fas fa-user-plus"></i> Sign Up</span
                          >
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="farmer/fregister.php">Farmer</a>
                                <a class="dropdown-item" href="customer/cregister.php">Customer</a>
                            </div>
                        </div>
                    </li>


                    <li class="nav-item px-2">
                        <div class="dropdown show ">
                            <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		                  <span class="nav-link-inner--text"
                          ><i class="fas fa-sign-in-alt"></i> Login</span
                          >
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="farmer/flogin.php">Farmer</a>
                                <a class="dropdown-item" href="customer/clogin.php">Customer</a>
                                <a class="dropdown-item" href="admin/alogin.php">Admin </a>
                            </div>
                        </div>
                    </li>


                </ul>

            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Hero Section -->
    <section class="hero-section d-flex align-items-center" id="header" style="margin-top: 0; padding-top: 80px;">
        <div class="container hero-content">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="floating-element">
                        <h1 class="display-4 font-weight-bold mb-4">
                            Smart Farming Advisor
                            <span class="d-block text-warning">Powered by AI</span>
                        </h1>
                        <p class="lead mb-4">
                            Revolutionize your farming with intelligent crop recommendations, real-time weather monitoring,
                            precision agriculture insights, and data-driven decision making for maximum yield and sustainability.
                        </p>
                        <div class="d-flex flex-wrap gap-3">
                            <a href="#services" class="btn btn-smart btn-lg mr-3">
                                <i class="fas fa-seedling mr-2"></i>Get Started
                            </a>
                            <a href="#Opportuanities" class="btn btn-outline-light btn-lg">
                                <i class="fas fa-play mr-2"></i>Learn More
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-center floating-element">
                        <i class="fas fa-tractor service-icon text-warning mb-4" style="font-size: 8rem;"></i>
                        <div class="row mt-4">
                            <div class="col-4 text-center">
                                <i class="fas fa-satellite service-icon text-info"></i>
                                <small class="d-block">Satellite Monitoring</small>
                            </div>
                            <div class="col-4 text-center">
                                <i class="fas fa-chart-line service-icon text-success"></i>
                                <small class="d-block">Yield Analytics</small>
                            </div>
                            <div class="col-4 text-center">
                                <i class="fas fa-cloud-sun service-icon text-primary"></i>
                                <small class="d-block">Weather AI</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card">
                        <div class="stat-number">98%</div>
                        <h6>Accuracy Rate</h6>
                        <p class="text-muted">AI-powered predictions</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card">
                        <div class="stat-number">15K+</div>
                        <h6>Active Farmers</h6>
                        <p class="text-muted">Trust our platform</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card">
                        <div class="stat-number">35%</div>
                        <h6>Yield Increase</h6>
                        <p class="text-muted">Average improvement</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-card">
                        <div class="stat-number">24/7</div>
                        <h6>Monitoring</h6>
                        <p class="text-muted">Real-time insights</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Smart Features Section -->
    <div class="section features-6 text-dark bg-white py-5" id="services">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto text-center">
                    <h3 class="display-4 section-title">Smart Farming Solutions</h3>
                    <p class="lead text-muted">Advanced technology meets traditional farming wisdom</p>
                </div>
            </div>
            <br>

            <!-- Farmers Section -->
            <div class="row align-items-center mb-5">
                <div class="col-lg-6">
                    <div class="feature-card card h-100 p-4">
                        <div class="feature-icon smart-feature">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <h3 class="text-center mb-4">For Smart Farmers</h3>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-brain text-success mr-3"></i>
                                    <div>
                                        <h6 class="mb-1">AI Crop Recommendations</h6>
                                        <small class="text-muted">Personalized crop selection based on soil analysis and market trends</small>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-satellite-dish text-primary mr-3"></i>
                                    <div>
                                        <h6 class="mb-1">Precision Weather</h6>
                                        <small class="text-muted">Hyper-local weather forecasting with 7-day accuracy</small>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-flask text-warning mr-3"></i>
                                    <div>
                                        <h6 class="mb-1">Smart Fertilizer Calc</h6>
                                        <small class="text-muted">Optimize nutrient application with soil sensor data</small>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-mobile-alt text-info mr-3"></i>
                                    <div>
                                        <h6 class="mb-1">Mobile Marketplace</h6>
                                        <small class="text-muted">Direct-to-consumer sales with real-time pricing</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="text-center">
                        <i class="fas fa-tractor text-success" style="font-size: 10rem; opacity: 0.8;"></i>
                        <div class="mt-4">
                            <div class="row">
                                <div class="col-4">
                                    <i class="fas fa-thermometer-half text-danger" style="font-size: 2rem;"></i>
                                    <p class="small mt-2">Temperature Monitoring</p>
                                </div>
                                <div class="col-4">
                                    <i class="fas fa-tint text-primary" style="font-size: 2rem;"></i>
                                    <p class="small mt-2">Irrigation Control</p>
                                </div>
                                <div class="col-4">
                                    <i class="fas fa-bug text-warning" style="font-size: 2rem;"></i>
                                    <p class="small mt-2">Pest Detection</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Customers Section -->
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="feature-card card h-100 p-4">
                        <div class="feature-icon ai-feature">
                            <i class="fas fa-shopping-basket"></i>
                        </div>
                        <h3 class="text-center mb-4">For Smart Consumers</h3>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-qrcode text-success mr-3"></i>
                                    <div>
                                        <h6 class="mb-1">Farm-to-Table Tracing</h6>
                                        <small class="text-muted">Complete transparency from seed to plate with blockchain</small>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-leaf text-success mr-3"></i>
                                    <div>
                                        <h6 class="mb-1">Organic Certification</h6>
                                        <small class="text-muted">Verified organic and sustainable farming practices</small>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-truck text-primary mr-3"></i>
                                    <div>
                                        <h6 class="mb-1">Smart Delivery</h6>
                                        <small class="text-muted">AI-optimized delivery routes for maximum freshness</small>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-star text-warning mr-3"></i>
                                    <div>
                                        <h6 class="mb-1">Quality Guarantee</h6>
                                        <small class="text-muted">AI-powered quality assessment and freshness scoring</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 order-lg-1">
                    <div class="text-center">
                        <i class="fas fa-shopping-cart text-primary" style="font-size: 10rem; opacity: 0.8;"></i>
                        <div class="mt-4">
                            <div class="row">
                                <div class="col-4">
                                    <i class="fas fa-mobile text-success" style="font-size: 2rem;"></i>
                                    <p class="small mt-2">Mobile Access</p>
                                </div>
                                <div class="col-4">
                                    <i class="fas fa-credit-card text-info" style="font-size: 2rem;"></i>
                                    <p class="small mt-2">Secure Payments</p>
                                </div>
                                <div class="col-4">
                                    <i class="fas fa-heart text-danger" style="font-size: 2rem;"></i>
                                    <p class="small mt-2">Wishlist</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Smart Opportunities Section -->
    <section class="py-5 bg-light" id="Opportuanities">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 mx-auto text-center mb-5">
                    <h3 class="display-4 section-title">Smart Agriculture Opportunities</h3>
                    <p class="lead text-muted">Discover the future of farming with cutting-edge technology and sustainable practices</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="feature-card card h-100 shadow-lg">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon analytics-feature mb-3">
                                <i class="fas fa-robot"></i>
                            </div>
                            <h5 class="card-title font-weight-bold">AI-Powered Agriculture</h5>
                            <p class="card-text">
                                Leverage machine learning algorithms for crop prediction, disease detection, and yield optimization.
                                Our AI analyzes satellite imagery, soil data, and weather patterns to provide actionable insights.
                            </p>
                            <div class="mt-3">
                                <span class="badge badge-success mr-2">Machine Learning</span>
                                <span class="badge badge-primary mr-2">Computer Vision</span>
                                <span class="badge badge-warning">Predictive Analytics</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="feature-card card h-100 shadow-lg">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon smart-feature mb-3">
                                <i class="fas fa-satellite"></i>
                            </div>
                            <h5 class="card-title font-weight-bold">Precision Farming Technology</h5>
                            <p class="card-text">
                                Utilize IoT sensors, drones, and satellite monitoring for precision agriculture. Monitor soil moisture,
                                temperature, and nutrient levels in real-time to optimize resource usage and maximize crop health.
                            </p>
                            <div class="mt-3">
                                <span class="badge badge-info mr-2">IoT Sensors</span>
                                <span class="badge badge-success mr-2">Drone Technology</span>
                                <span class="badge badge-primary">GPS Mapping</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="feature-card card h-100 shadow-lg">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon ai-feature mb-3">
                                <i class="fas fa-leaf"></i>
                            </div>
                            <h5 class="card-title font-weight-bold">Sustainable Farming Practices</h5>
                            <p class="card-text">
                                Implement eco-friendly farming techniques with carbon footprint tracking, water conservation strategies,
                                and organic certification support. Build a sustainable future while maintaining profitability.
                            </p>
                            <div class="mt-3">
                                <span class="badge badge-success mr-2">Carbon Neutral</span>
                                <span class="badge badge-info mr-2">Water Smart</span>
                                <span class="badge badge-warning">Organic Certified</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Technology Integration Row -->
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <h4 class="mb-4">Integrated Technology Stack</h4>
                    <div class="row">
                        <div class="col-lg-2 col-md-4 col-6 mb-3">
                            <div class="tech-icon p-3">
                                <i class="fab fa-python text-warning" style="font-size: 2.5rem;"></i>
                                <p class="small mt-2">Machine Learning</p>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6 mb-3">
                            <div class="tech-icon p-3">
                                <i class="fas fa-cloud text-primary" style="font-size: 2.5rem;"></i>
                                <p class="small mt-2">Cloud Computing</p>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6 mb-3">
                            <div class="tech-icon p-3">
                                <i class="fas fa-database text-success" style="font-size: 2.5rem;"></i>
                                <p class="small mt-2">Big Data</p>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6 mb-3">
                            <div class="tech-icon p-3">
                                <i class="fas fa-wifi text-info" style="font-size: 2.5rem;"></i>
                                <p class="small mt-2">IoT Network</p>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6 mb-3">
                            <div class="tech-icon p-3">
                                <i class="fas fa-mobile-alt text-danger" style="font-size: 2.5rem;"></i>
                                <p class="small mt-2">Mobile First</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======================================================================================================================================== -->


</main>
<?php require("footer.php");?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<link href="https://fonts.googleapis.com/css2?family=Chivo:wght@300;400;700;900&amp;display=swap" rel="stylesheet">

</body>

</html>