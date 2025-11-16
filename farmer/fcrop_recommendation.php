<?php
include('fsession.php');
ini_set('memory_limit', '-1');

if (!isset($_SESSION['farmer_login_user'])) {
    header("location: ../index.php");
    exit(); // Add exit to prevent further execution
}

$query4 = "SELECT * from farmerlogin where email='$user_check'";
$ses_sq4 = mysqli_query($conn, $query4);
$row4 = mysqli_fetch_assoc($ses_sq4);
$para1 = $row4['farmer_id'];
$para2 = $row4['farmer_name'];

// Initialize variables
$formatted_associative_array = [];
$recommendation_processed = false;

// Process form submission
if (isset($_POST['Crop_Recommend'])) {
    $n = (int)trim($_POST['n']);
    $p = (int)trim($_POST['p']);
    $k = (int)trim($_POST['k']);
    $t = (float)trim($_POST['t']);
    $h = (float)trim($_POST['h']);
    $ph = (float)trim($_POST['ph']);
    $r = (float)trim($_POST['r']);

    // Validate inputs
    if ($n >= 0 && $p >= 0 && $k >= 0 && $t > 0 && $h > 0 && $ph > 0 && $r >= 0) {
        // JSON encode arguments as the Python script expects JSON strings
        $jsonn = escapeshellarg(json_encode($n));
        $jsonp = escapeshellarg(json_encode($p));
        $jsonk = escapeshellarg(json_encode($k));
        $jsont = escapeshellarg(json_encode($t));
        $jsonh = escapeshellarg(json_encode($h));
        $jsonph = escapeshellarg(json_encode($ph));
        $jsonr = escapeshellarg(json_encode($r));
        
        // Build command with JSON-encoded arguments
        // Note: We redirect stderr to /dev/null to keep debug output separate from JSON output
        // Debug output will still go to PHP error log via Python's stderr
        $command = sprintf(
            "cd %s && python3 ML/crop_recommendation/recommend.py %s %s %s %s %s %s %s 2>/dev/null",
            escapeshellarg(__DIR__),
            $jsonn, $jsonp, $jsonk, $jsont, $jsonh, $jsonph, $jsonr
        );

        $output = shell_exec($command);

        if ($output) {
            // Clean the output - remove any non-JSON content that might have leaked through
            $output = trim($output);
            
            // Extract JSON array from output - find the last line that looks like JSON
            // Split by newlines and find the last line that starts with [ and ends with ]
            $lines = explode("\n", $output);
            $json_line = '';
            foreach (array_reverse($lines) as $line) {
                $line = trim($line);
                if (preg_match('/^\[.*\]$/', $line)) {
                    $json_line = $line;
                    break;
                }
            }
            
            // If we found a JSON line, use it; otherwise try the whole output
            $output = $json_line ? $json_line : $output;
            
            $decoded_output = json_decode($output, true);

            if ($decoded_output && is_array($decoded_output)) {
                // Sort by probability (second element) in descending order
                usort($decoded_output, function($a, $b) {
                    return $b[1] <=> $a[1]; // Descending order
                });
                
                // Show top crops with probability > 0.01 (1%) instead of just > 0
                // This will show more diverse recommendations
                $filtered_output = array_filter($decoded_output, function($item) {
                    return is_array($item) && count($item) >= 2 && $item[1] > 0.01;
                });
                
                // If no crops with > 1% probability, show top 3 crops regardless
                if (empty($filtered_output)) {
                    $filtered_output = array_slice($decoded_output, 0, 3);
                } else {
                    // Limit to top 10 crops to avoid cluttering the chart
                    $filtered_output = array_slice($filtered_output, 0, 10);
                }

                $formatted_associative_array = array_map(function($item) {
                    return [$item[0] => $item[1]];
                }, array_values($filtered_output));

                $recommendation_processed = true;
            } else {
                error_log("Failed to decode crop recommendation output. Raw output: " . $output);
            }
        } else {
            error_log("No output from crop recommendation script. Command: " . $command);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<?php include('fheader.php'); ?>

<body class="bg-white" id="top">

<?php include('fnav.php'); ?>

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

    <div class="container-fluid">
        <div class="row row-content">
            <div class="col-md-12 mb-3">

                <div class="card text-white bg-gradient-success mb-3">
                    <form role="form" action="#" method="post">
                        <div class="card-header">
                            <span class="text-color display-4">Crop Recommendation</span>
                            <span class="pull-right">
                                <button type="submit" value="Recommend" name="Crop_Recommend" class="btn text-white btn-submit">SUBMIT</button>
                            </span>
                        </div>

                        <div class="card-body text-dark">
                            <table class="table table-striped table-hover table-bordered bg-gradient-white text-center display text-dark" id="myTable">
                                <thead>
                                <tr class="font-weight-bold text-dark">
                                    <th><center>Nitrogen</center></th>
                                    <th><center>Phosphorous</center></th>
                                    <th><center>Potassium</center></th>
                                    <th><center>Temperature</center></th>
                                    <th><center>Humidity</center></th>
                                    <th><center>PH</center></th>
                                    <th><center>Rainfall</center></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="text-center">
                                    <td>
                                        <div class="form-group">
                                            <input type='number' name='n' placeholder="Nitrogen Eg:90" required min="0" class="form-control" value="<?= isset($_POST['n']) ? htmlspecialchars($_POST['n']) : '' ?>">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type='number' name='p' placeholder="Phosphorus Eg:42" required min="0" class="form-control" value="<?= isset($_POST['p']) ? htmlspecialchars($_POST['p']) : '' ?>">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type='number' name='k' placeholder="Potassium Eg:43" required min="0" class="form-control" value="<?= isset($_POST['k']) ? htmlspecialchars($_POST['k']) : '' ?>">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type='number' name='t' step="0.01" placeholder="Temperature Eg:21" required min="0" class="form-control" value="<?= isset($_POST['t']) ? htmlspecialchars($_POST['t']) : '' ?>">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type='number' name='h' step="0.01" placeholder="Humidity Eg:82" required min="0" max="100" class="form-control" value="<?= isset($_POST['h']) ? htmlspecialchars($_POST['h']) : '' ?>">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type='number' name='ph' step="0.01" placeholder="PH Eg:6.5" required min="0" max="14" class="form-control" value="<?= isset($_POST['ph']) ? htmlspecialchars($_POST['ph']) : '' ?>">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type='number' name='r' step="0.01" placeholder="Rainfall Eg:203" required min="0" class="form-control" value="<?= isset($_POST['r']) ? htmlspecialchars($_POST['r']) : '' ?>">
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>

                <?php if ($recommendation_processed): ?>
                    <div class="card text-white bg-gradient-success mb-3">
                        <div class="card-header">
                            <span class="text-color display-4">Result</span>
                        </div>
                        <div class="card-body text-dark">
                            <?php if (!empty($formatted_associative_array)): ?>
                                <h4 class="mb-4 text-center">Recommended Crops:</h4>
                                <div class="chart-container" style="position: relative; height: 450px; max-width: 800px; margin: 0 auto;">
                                    <canvas id="myChart"></canvas>
                                </div>
                            <?php else: ?>
                                <h4>No suitable crops found for the given parameters.</h4>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>

<?php if ($recommendation_processed && !empty($formatted_associative_array)): ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = <?= json_encode(array_map(function($item) { return array_keys($item)[0]; }, $formatted_associative_array)); ?>;
        const data = <?= json_encode(array_map(function($item) { return array_values($item)[0]; }, $formatted_associative_array)); ?>;

        const ctx = document.getElementById('myChart').getContext('2d');
        
        // Create gradient colors for bars
        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(30, 144, 255, 0.8)');
        gradient.addColorStop(1, 'rgba(0, 191, 255, 0.4)');
        
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Crop Suitability Score',
                    data: data,
                    backgroundColor: gradient,
                    borderColor: 'rgba(30, 144, 255, 1)',
                    borderWidth: 2,
                    borderRadius: 8,
                    borderSkipped: false,
                }]
            },
            options: {
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
                            color: '#333'
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        padding: 12,
                        titleFont: {
                            size: 14,
                            weight: 'bold'
                        },
                        bodyFont: {
                            size: 13
                        },
                        displayColors: true,
                        callbacks: {
                            label: function(context) {
                                return 'Score: ' + (context.parsed.y * 100).toFixed(2) + '%';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 1,
                        ticks: {
                            callback: function(value) {
                                return (value * 100).toFixed(0) + '%';
                            },
                            font: {
                                size: 12
                            },
                            color: '#666'
                        },
                        title: {
                            display: true,
                            text: 'Suitability Percentage',
                            font: {
                                size: 13,
                                weight: 'bold'
                            },
                            color: '#333'
                        },
                        grid: {
                            color: 'rgba(0, 0, 0, 0.1)',
                            lineWidth: 1
                        }
                    },
                    x: {
                        ticks: {
                            font: {
                                size: 13,
                                weight: '500'
                            },
                            color: '#333'
                        },
                        title: {
                            display: true,
                            text: 'Crop Types',
                            font: {
                                size: 13,
                                weight: 'bold'
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

<?php require("footer.php"); ?>

</body>
</html>