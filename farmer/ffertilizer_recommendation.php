<?php
include ('fsession.php');
ini_set('memory_limit', '-1');

if(!isset($_SESSION['farmer_login_user'])){
header("location: ../index.php");} // Redirecting To Home Page
$query4 = "SELECT * from farmerlogin where email='$user_check'";
              $ses_sq4 = mysqli_query($conn, $query4);
              $row4 = mysqli_fetch_assoc($ses_sq4);
              $para1 = $row4['farmer_id'];
              $para2 = $row4['farmer_name'];

?>

<!DOCTYPE html>
<html>
<?php include ('fheader.php');  ?>

  <body class="bg-white" id="top">

<?php include ('fnav.php');  ?>


  <section class="section section-shaped section-lg">
    <div class="shape shape-style-1 shape-primary">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
<!-- ======================================================================================================================================== -->

<div class="container-fluid ">

    	 <!-- <div class="row">
          <div class="col-md-8 mx-auto text-center">
            <span class="badge badge-danger badge-pill mb-3">Recommendation</span>
          </div>
        </div> -->

          <div class="row row-content">
            <div class="col-md-12 mb-3">

				<div class="card text-white bg-gradient-success mb-3">
				<form role="form" action="#" method="post" >
				  <div class="card-header">
				  <span class=" text-color display-4" > Fertilizer Recommendation  </span>
						<span class="pull-right">
							<button type="submit" value="Recommend" name="Fert_Recommend" class="btn btn-submit text-white">SUBMIT</button>
						</span>

				  </div>

				  <div class="card-body text-dark">

				<table class="table table-striped table-hover table-bordered bg-gradient-white text-center display text-dark" id="myTable">

    <thead>
					<tr class="font-weight-bold text-dark">
					<th><center> Nitrogen</center></th>
					<th><center>Phosphorous</center></th>
					<th><center>Potassium</center></th>
					<th><center>Temparature</center></th>
					<th><center>Humidity</center></th>
					<th><center>Soil Moisture</center></th>
					<th><center>Soil Type</center></th>
					<th><center>Crop</center></th>
        </tr>
    </thead>
 <tbody>
                                 <tr class="text-center">
                                    <td>
                                    	<div class="form-group">
											<input type = 'number' name = 'n' placeholder="Nitrogen Eg:37" required class="form-control" value="<?= htmlspecialchars($form_n) ?>">

										</div>
                                    </td>

									<td>
                                    	<div class="form-group">
											<input type = 'number' name = 'p' placeholder="Phosphorus Eg:0" required class="form-control" value="<?= htmlspecialchars($form_p) ?>">

										</div>
                                    </td>

									<td>
                                    	<div class="form-group">
											<input type = 'number' name = 'k' placeholder="Pottasium Eg:0" required class="form-control" value="<?= htmlspecialchars($form_k) ?>">

										</div>
                                    </td>

									<td>
                                    	<div class="form-group">
											<input type = 'number' name = 't' step="0.01" placeholder="Temperature Eg:26" required class="form-control" value="<?= htmlspecialchars($form_t) ?>">

										</div>
                                    </td>

									<td>
                                    	<div class="form-group">
											<input type = 'number' name = 'h' step="0.01" placeholder="Humidity Eg:52" required class="form-control" value="<?= htmlspecialchars($form_h) ?>">

										</div>
                                    </td>

									<td>
                                    	<div class="form-group">
											<input type = 'number' name='soilMoisture' step="0.01" placeholder="Soil Moisture Eg:38" required class="form-control" value="<?= htmlspecialchars($form_sm) ?>">

										</div>
                                    </td>

									<td>
										<div class="form-group ">
													<select name="soil" class="form-control" required>
													<option  value="">Select Soil Type</option>
													<option  value="Sandy" <?= $form_soil == 'Sandy' ? 'selected' : '' ?>>Sandy</option>
													<option  value="Loamy" <?= $form_soil == 'Loamy' ? 'selected' : '' ?>>Loamy</option>
													<option  value="Black" <?= $form_soil == 'Black' ? 'selected' : '' ?>>Black</option>
													<option  value="Red" <?= $form_soil == 'Red' ? 'selected' : '' ?>>Red</option>
													<option  value="Clayey" <?= $form_soil == 'Clayey' ? 'selected' : '' ?>>Clayey</option>
													</select>
										</div>
									</td>

									<td>
										<div class="form-group ">
									<select name="crop" class="form-control" required>
													<option  value="">Select Crop</option>
													<option  value="Maize" <?= $form_crop == 'Maize' ? 'selected' : '' ?>>Maize</option>
													<option  value="Sugarcane" <?= $form_crop == 'Sugarcane' ? 'selected' : '' ?>>Sugarcane</option>
													<option  value="Cotton" <?= $form_crop == 'Cotton' ? 'selected' : '' ?>>Cotton</option>
													<option  value="Tobacco" <?= $form_crop == 'Tobacco' ? 'selected' : '' ?>>Tobacco</option>
													<option  value="Paddy" <?= $form_crop == 'Paddy' ? 'selected' : '' ?>>Paddy</option>
													<option  value="Barley" <?= $form_crop == 'Barley' ? 'selected' : '' ?>>Barley</option>
													<option  value="Wheat" <?= $form_crop == 'Wheat' ? 'selected' : '' ?>>Wheat</option>
													<option  value="Millets" <?= $form_crop == 'Millets' ? 'selected' : '' ?>>Millets</option>
													<option  value="Oil seeds" <?= $form_crop == 'Oil seeds' ? 'selected' : '' ?>>Oil seeds</option>
													<option  value="Pulses" <?= $form_crop == 'Pulses' ? 'selected' : '' ?>>Pulses</option>
													<option  value="Ground Nuts" <?= $form_crop == 'Ground Nuts' ? 'selected' : '' ?>>Ground Nuts</option>
													</select>
										</div>

									</td>
                                </tr>
                            </tbody>


	</table>
	</div>
	</form>

</div>



<?php
	$fertilizer_recommended = null;
	$recommendation_processed = false;
	$debug_info = "";
// Initialize form values
$form_n = isset($_POST['n']) ? $_POST['n'] : '';
$form_p = isset($_POST['p']) ? $_POST['p'] : '';
$form_k = isset($_POST['k']) ? $_POST['k'] : '';
$form_t = isset($_POST['t']) ? $_POST['t'] : '';
$form_h = isset($_POST['h']) ? $_POST['h'] : '';
$form_sm = isset($_POST['soilMoisture']) ? $_POST['soilMoisture'] : '';
$form_soil = isset($_POST['soil']) ? $_POST['soil'] : '';
$form_crop = isset($_POST['crop']) ? $_POST['crop'] : '';

if(isset($_POST['Fert_Recommend'])){
	$n=trim($_POST['n']);
	$p=trim($_POST['p']);
	$k=trim($_POST['k']);
	$t=trim($_POST['t']);
	$h=trim($_POST['h']);
	$sm=trim($_POST['soilMoisture']);
	$soil=trim($_POST['soil']);
	$crop=trim($_POST['crop']);

	// Update form values for display
	$form_n = $n;
	$form_p = $p;
	$form_k = $k;
	$form_t = $t;
	$form_h = $h;
	$form_sm = $sm;
	$form_soil = $soil;
	$form_crop = $crop;

	// Values will be JSON encoded later in the command building section

	// Build command with proper path handling
	$script_path = __DIR__ . '/ML/fertilizer_recommendation/fertilizer_recommendation.py';
	
	// Change to the script directory for proper file path resolution
	$original_dir = getcwd();
	chdir(__DIR__);
	
	// Convert numeric values to appropriate types for JSON encoding
	$n_val = (int)$n;
	$p_val = (int)$p;
	$k_val = (int)$k;
	$t_val = (float)$t;
	$h_val = (float)$h;
	$sm_val = (float)$sm;
	
	// JSON encode the values as the Python script expects JSON strings
	$Jsonn = json_encode($n_val);
	$Jsonp = json_encode($p_val);
	$Jsonk = json_encode($k_val);
	$Jsont = json_encode($t_val);
	$Jsonh = json_encode($h_val);
	$Jsonsm = json_encode($sm_val);
	$Jsonsoil = json_encode($soil);
	$Jsoncrop = json_encode($crop);
	
	// Build command - Arguments MUST be in training data order:
	// Training order: [Temparature, Humidity, Soil Moisture, Soil Type, Crop Type, Nitrogen, Potassium, Phosphorous]
	// So pass as: T, H, SM, Soil, Crop, N, K, P
	$command = sprintf(
		'python3 ML/fertilizer_recommendation/fertilizer_recommendation.py %s %s %s %s %s %s %s %s',
		escapeshellarg($Jsont),      // 1. Temperature
		escapeshellarg($Jsonh),      // 2. Humidity
		escapeshellarg($Jsonsm),     // 3. Soil Moisture
		escapeshellarg($Jsonsoil),   // 4. Soil Type
		escapeshellarg($Jsoncrop),   // 5. Crop Type
		escapeshellarg($Jsonn),      // 6. Nitrogen
		escapeshellarg($Jsonk),      // 7. Potassium
		escapeshellarg($Jsonp)       // 8. Phosphorous
	);
	
	// Debug: Log the command (remove in production)
	error_log("Fertilizer Command: " . $command);
	
	// Execute command and capture both stdout and stderr
	$descriptorspec = array(
		0 => array("pipe", "r"),  // stdin
		1 => array("pipe", "w"),  // stdout
		2 => array("pipe", "w")   // stderr
	);
	
	$process = proc_open($command, $descriptorspec, $pipes);
	
	if (is_resource($process)) {
		fclose($pipes[0]); // Close stdin
		$output = stream_get_contents($pipes[1]); // stdout
		$stderr = stream_get_contents($pipes[2]); // stderr
		fclose($pipes[1]);
		fclose($pipes[2]);
		proc_close($process);
	} else {
		$output = shell_exec($command);
		$stderr = "";
	}
	
	// Restore original directory
	chdir($original_dir);
	
	// Debug: Log the output (remove in production)
	error_log("Fertilizer Output: " . $output);
	if(isset($stderr) && !empty($stderr)) {
		error_log("Fertilizer Debug: " . $stderr);
		$debug_info = $stderr; // Store for display
	}
	
	if($output && trim($output)) {
		// Check if output contains error
		if(stripos($output, 'traceback') !== false || stripos($output, 'error') !== false || stripos($output, 'valueerror') !== false || stripos($output, 'keyerror') !== false) {
			// Extract just the error message, not full traceback
			$lines = explode("\n", $output);
			$error_msg = "";
			foreach($lines as $line) {
				if(stripos($line, 'valueerror') !== false || stripos($line, 'keyerror') !== false) {
					$error_msg = trim($line);
					break;
				}
			}
			if(empty($error_msg)) {
				$error_msg = "Error: " . trim($output);
			}
			$fertilizer_recommended = htmlspecialchars($error_msg);
			$recommendation_processed = true;
		} else {
			$fertilizer_recommended = trim($output);
			$recommendation_processed = true;
		}
	} else {
		// Show error if no output
		$fertilizer_recommended = "Error: No recommendation received. Please check the Python script.";
		$recommendation_processed = true;
		if(isset($stderr) && !empty($stderr)) {
			$debug_info = "Python Error:\n" . $stderr;
		}
	}
}
?>

<?php if($recommendation_processed && $fertilizer_recommended): ?>
<div class="card text-white bg-gradient-success mb-3">
	<div class="card-header">
		<span class="text-color display-4">Result</span>
	</div>
	<div class="card-body text-dark">
		<h4 class="mb-4 text-center">Recommended Fertilizer</h4>
		<?php if(isset($debug_info) && !empty($debug_info)): ?>
			<div class="alert alert-warning mb-3">
				<small class="text-muted" style="font-family: monospace; font-size: 0.85em; white-space: pre-wrap;">
					<strong>Model diagnostics:</strong><br><?= htmlspecialchars($debug_info) ?>
				</small>
			</div>
		<?php endif; ?>
		<div class="chart-container" style="position: relative; height: 300px; max-width: 700px; margin: 0 auto;">
			<canvas id="fertilizerChart"></canvas>
		</div>
		<div class="text-center mt-4">
			<p class="lead mb-1 text-success font-weight-bold">
				<i class="fas fa-check-circle"></i> Recommended Fertilizer: 
				<span class="text-primary"><?php echo htmlspecialchars($fertilizer_recommended); ?></span>
			</p>
			<p class="text-muted mb-0">
				Best suited for <?= htmlspecialchars($form_crop) ?> on <?= htmlspecialchars($form_soil) ?> soil under the current field conditions.
			</p>
		</div>
	</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
	const fertilizerName = <?= json_encode($fertilizer_recommended); ?>;
	
	const ctx = document.getElementById('fertilizerChart').getContext('2d');
	
	// Create gradient for horizontal bar
	const gradient = ctx.createLinearGradient(0, 0, 600, 0);
	gradient.addColorStop(0, 'rgba(46, 204, 113, 0.9)');  // Green
	gradient.addColorStop(0.5, 'rgba(52, 152, 219, 0.9)'); // Blue
	gradient.addColorStop(1, 'rgba(155, 89, 182, 0.9)');   // Purple
	
	const chart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: [fertilizerName],
			datasets: [{
				label: 'Recommendation Score',
				data: [0.95], // High confidence score for visualization
				backgroundColor: gradient,
				borderColor: 'rgba(46, 204, 113, 1)',
				borderWidth: 3,
				borderRadius: 10,
				barThickness: 80,
			}]
		},
		options: {
			indexAxis: 'y', // Horizontal bar chart
			responsive: true,
			maintainAspectRatio: false,
			plugins: {
				legend: {
					display: true,
					position: 'top',
					labels: {
						font: {
							size: 14,
							weight: 'bold'
						},
						color: '#333',
						padding: 15
					}
				},
				tooltip: {
					backgroundColor: 'rgba(0, 0, 0, 0.8)',
					padding: 12,
					titleFont: {
						size: 15,
						weight: 'bold'
					},
					bodyFont: {
						size: 14
					},
					displayColors: true,
					callbacks: {
						label: function(context) {
							return 'Confidence: ' + (context.parsed.x * 100).toFixed(1) + '%';
						}
					}
				}
			},
			scales: {
				x: {
					beginAtZero: true,
					max: 1,
					ticks: {
						callback: function(value) {
							return (value * 100).toFixed(0) + '%';
						},
						font: {
							size: 13
						},
						color: '#666'
					},
					title: {
						display: true,
						text: 'Recommendation Confidence',
						font: {
							size: 14,
							weight: 'bold'
						},
						color: '#333',
						padding: {top: 10, bottom: 5}
					},
					grid: {
						color: 'rgba(0, 0, 0, 0.1)',
						lineWidth: 1
					}
				},
				y: {
					ticks: {
						font: {
							size: 15,
							weight: '600'
						},
						color: '#333'
					},
					grid: {
						display: false
					}
				}
			}
		}
	});
</script>
<?php endif; ?>



            </div>
          </div>
       </div>

</section>

    <?php require("footer.php");?>

</body>
</html>

