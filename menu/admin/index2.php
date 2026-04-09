<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../../styles/navbar_main.css"> <!-- Top Menu -->
    <link rel="stylesheet" href="../../styles/container_admin.css"> <!-- Side Menu -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" sizes="192x192" href="../../images/logo_agila.png">


    <!-- data table link -->
    <link rel="stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href = "https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">

    <script src="http://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdn.datatables.net/2.0.8/js/jquery.dataTables.min.js"></script> 

    <title>AGILA</title>

    <!-- data table script -->
    <script defer src = "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script defer src = "https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script defer src = "https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <!-- graph script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.0/papaparse.min.js"></script>

    <style>
      /* Ensure the canvas fits within the container dimensions */
      #chartContainer {
        width: 99%;
        height: 100%;
        position: relative;
        text-align: center;
      }
      #crimeChart {
        width: 100% !important;
        height: 100% !important;
      }
    </style>

  </head>

  <body>
    <div class="pwet">
      <nav class="navbar navbar-expand-lg"> <!-- Navbar (START) -->
        <div class="container-fluid">
          <a class="navbar-brand me-auto" href="#"><img src="../../images/logo-full_agila.png" class="logo"></a>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">AGILA</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                  <a class="nav-link mx-lg-2 text-white fw-semibold" href="about.php">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mx-lg-2 text-white fw-semibold" href="contact.php">Contact Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mx-lg-2 text-white fw-semibold" href="profile.php">Account</a>
                </li>
              </ul>
            </div>
          </div>
          <a class="logout-btn" href="../../index.php">Logout</a>
          <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" 
                  data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </nav> <!-- Navbar (END) -->

      <section class="hero-section"> <!-- Main Menu Container (START) -->

        <div class="left-menu"> <!-- Side Menu (START) --> 
          <div class="side-btns dropup">
            <a class="s-btn" href="hist.php"><i class='bx bx-book-content'></i>Contents</a>
            <a class="s-btn" href="user.php"><i class='bx bx-user' ></i>User</a>
            <a class="s-btn" href="crime.php"><i class='bx bxs-report'></i>Crime</a>
            <a class="s-btn" href="dist.php"><i class='bx bx-map-alt'></i>District</a>
            <a class="s-btn" href="audit.php"><i class='bx bx-history'></i>Audit Log</a>
            <a class="s-btn" href="ps.php"><span class="material-symbols-outlined">local_police</span>Stations</a>

          </div>
          <div class = "sidenav-footer">
            <div class="text-center ps-3">Logged In as:
              <?php
              // Check if admin is logged in
              if(isset($_SESSION['name'])) {
                // Display the admin's name
                echo "<p class='text-start fs-6'>" . $_SESSION['name'] . "</p>";
              } else {
                // If no admin is logged in, display default message
                echo "<p class='text-start m-0'>Not logged in</p>";
              }
              ?>
            </div>
          </div>

        </div> <!-- Side Menu (END) -->

        <div class="right-menu"> <!-- Right Canvas (START) -->
          <div class="patterns">
            <svg width="300%" height="120%">
              <defs>
                <style>
                  @import url("https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i");
                </style>
              </defs>
              <text x="72%" y="35%" text-anchor="middle">Dashboard</text>
            </svg>
          </div>
          <div class="container row1">
            <div class = "row justify-content-center">
              <div class = "col">
                <div class="container_db1">
                  <div class="flip-card">
                    <div class="flip-card-inner">
                      <div class="flip-card-front">
                        <h1 class="text-shadow" style="margin-top:20px;";>Forecasting</h1>
                        <button type="button" onclick="runArimaModel()" class="button submit-button" style="margin-left:10px; margin-right: 10px;";>Run Analysis</button>
                        <p id="warningMessage" class="warning-message"></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div> <!-- col 2 row 1 -->

            </div>
          </div>

          <div class = "container row2">
            <div class="row"> <!-- row 3 -->
              <div class="col">
                <div class="container_db3">
                  <div class="flip-card2">
                    <div class="flip-card-inner">
                      <div class="flip-card-front">
                        <h1 class="text-shadow">User Account Overview</h1>

                        <div class = "m-3">
                          <table id = "table1" class=" table table-striped table-hover text-center" style="margin-bottom: 0rem; ">
                            <thead class="table-light">
                              <tr>
                                <th>Name</th>
                                <th>E-mail</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $mysqli = require __DIR__ . "../../../scripts/con_db.php";
                              $sql = "SELECT id, name, email FROM user WHERE user_type = 'user'";
                              $result = $mysqli->query($sql);

                              if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                  echo "<tr>";
                                  echo "<td>" . $row["name"] . "</td>";
                                  echo "<td>" . $row["email"] . "</td>";
                                  //  echo "<td>" . $row["station"] . "</td>";
                                  echo "</tr>";
                                }
                              } else {
                                echo "<td>No admin users found</td>";
                              }
                              $mysqli->close();
                              ?>   
                            </tbody>
                          </table>
                        </div>

                        <div class="tags"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> <!--col1r3-->

              <div class="col">
                <div class="container_db3">
                  <div class="flip-card3">
                    <div class="flip-card-inner">
                      <div class="flip-card-front">
                        <h1 class="text-shadow">Graph of Crimes (from Q1-Q2)</h1>
                        <div id="chartContainer">
                          <canvas id="crimeChart"></canvas>
                        </div>
                        <script>
                          (async function() {
                            // Function to fetch and parse the JSON data from the PHP script
                            async function fetchData() {
                              const response = await fetch('../user/fetch_monthly_stats.php'); // Path to your PHP file
                              const jsonData = await response.json();

                              if (jsonData.message) {
                                console.error(jsonData.message);
                                return { labels: [], datasets: [] };
                              }

                              const data = {
                                labels: [],
                                datasets: []
                              };

                              const crimeTypes = {};

                              const monthMapping = {
                                1: 'January',
                                2: 'February',
                                3: 'March',
                                4: 'April',
                                5: 'May',
                                6: 'June',
                                7: 'July',
                                8: 'August',
                                9: 'September',
                                10: 'October',
                                11: 'November',
                                12: 'December',
                              };


                              const filteredData = jsonData.filter(row => parseInt(row.YEAR) === 2024 && [1,2,3,4, 5, 6].includes(parseInt(row.MONTH)));
                              console.log("Filtered data (2024):", filteredData); // Log filtered data

                              filteredData.forEach(row => {
                                const month = row.MONTH;
                                const typeName = row.TYPE_NAME; // Use the new TYPE_NAME field
                                const count = row.COUNT;
                                const monthLabel = `${monthMapping[month]}`;

                                if (!data.labels.includes(monthLabel)) {
                                  data.labels.push(monthLabel);
                                }

                                if (!crimeTypes[typeName]) {
                                  crimeTypes[typeName] = {
                                    label: typeName, // Use the type name directly
                                    data: [],
                                    backgroundColor: getRandomColor(),
                                    borderColor: getRandomColor(),
                                    borderWidth: 1,
                                    fill: false, // Don't fill area under the line
                                    tension: 0.4 // Adjust curve of the line
                                  };
                                }
                                crimeTypes[typeName].data.push({ x: monthLabel, y: count });
                              });

                              data.datasets = Object.values(crimeTypes);

                              console.log("Final data for the chart:", data); // Log final data for the chart

                              return data;
                            }

                            // Function to generate random colors
                            function getRandomColor() {
                              const letters = '0123456789ABCDEF';
                              let color = '#';
                              for (let i = 0; i < 6; i++) {
                                color += letters[Math.floor(Math.random() * 16)];
                              }
                              return color;
                            }

                            // Main function to draw the chart
                            async function drawChart() {
                              const data = await fetchData();

                              const ctx = document.getElementById('crimeChart').getContext('2d');
                              const crimeChart = new Chart(ctx, {
                                type: 'line', // You can change this to 'line', 'pie', etc.
                                data: {
                                  labels: data.labels,
                                  datasets: data.datasets
                                },
                                options: {
                                  responsive: true,
                                  plugins: {
                                    legend: {
                                      labels: {
                                        font: {
                                          size:12 // Adjust font size here
                                        },
                                        color: '#232c33'
                                      }
                                    }
                                  },
                                  scales: {
                                    y: {
                                      beginAtZero: true,
                                      ticks: {
                                        font: {
                                          size: 11
                                        },
                                        color: '#232c33'
                                      }
                                    },
                                    x: {
                                      ticks: {
                                        font: {
                                          size: 12
                                        },
                                        color: '#232c33'
                                      }
                                    }
                                  }
                                }
                              });
                            }

                            drawChart();
                          })();
                        </script>


                        <div class="tags"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> <!-- col2r3-->

              <div class="col">
                <div class="container_db3">
                  <div class="flip-card2">
                    <div class="flip-card-inner">
                      <div class="flip-card-front ">
                        <h1 class="text-shadow mt-4">Crime Incident Reports</h1>

                        <div class = "m-3">
                          <table id="table2" class="table table-striped table-hover text-center mt-0">
                            <thead class="table-light">
                              <tr>
                                <th>Month</th>
                                <th>Type ID</th>
                                <th>Count</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              // Database connection
                              $conn = require __DIR__ . "../../../scripts/con_db.php";

                              $sql = "SELECT MONTH, id_type, COUNT FROM reduced_monthly_data";
                              $result = $conn->query($sql);

                              if ($result->num_rows > 0) {
                                // Output data of each row
                                while ($row = $result->fetch_assoc()) {
                                  echo "<tr data-id='{$row['MONTH']}'>";
                                  echo "<td>{$row['MONTH']}</td>";
                                  echo "<td>{$row['id_type']}</td>";
                                  echo "<td>{$row['COUNT']}</td>";
                                  echo "</tr>";
                                }
                              } else {
                                echo "<tr><td colspan='3'>0 results</td></tr>";
                              }

                              $conn->close();
                              ?>
                            </tbody>
                          </table>

                        </div>

                        <div class="tags"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> <!--col3r3 -->

            </div> <!--row3-->
          </div> <!--container 2 end -->

        </div> <!-- Right Canvas (END) -->

      </section> <!-- Main Menu Container (END) -->
    </div>


    <!-- Bootstrap Javascript-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" 
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" 
            integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    <script type = "text/javascript">
      $(document).ready(
        function() {
          var table1 = $('#table1').DataTable({
            "scrollY": "180px",
            "scrollX": false,
            "scrollCollapse": true,
            "paging": false,
            "searching": false,
            "lengthChange": false,
            "info": false
          });
          var table2 = $('#table2').DataTable({
            "scrollY": "180px",
            "sScrollX": "100%",
            "scrollCollapse": true,
            "paging": false,
            "searching": false,
            "lengthChange": false,
            "info": false
          });
        });

      let uploadedFilePath = '';

      function triggerFileInput() {
        document.getElementById('fileToUpload').click();
      }

      function validateAndShowFileName() {
        const fileInput = document.getElementById('fileToUpload');
        const filePath = fileInput.value;
        const allowedExtensions = /(\.csv)$/i;
        const buttonText = document.getElementById('buttonText');

        if (!allowedExtensions.exec(filePath)) {
          alert('Please upload a CSV file.');
          fileInput.value = '';
          buttonText.innerText = 'Choose File';
          return false;
        } else {
          // Display the selected file name
          const fileName = fileInput.files[0].name;
          buttonText.innerText = fileName;
          return true;
        }
      }

      document.getElementById('uploadForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        const formData = new FormData(this);
        const xhr = new XMLHttpRequest();
        xhr.open('POST', this.action, true);

        xhr.onload = function() {
          const messageDiv = document.getElementById('message');
          if (xhr.status === 200) {
            messageDiv.innerHTML = `<p>${xhr.responseText}</p>`;
            messageDiv.style.color = 'green';
          } else {
            messageDiv.innerHTML = `<p>File upload failed. Please try again.</p>`;
            messageDiv.style.color = 'red';
          }
        };

        xhr.onerror = function() {
          const messageDiv = document.getElementById('message');
          messageDiv.innerHTML = `<p>File upload failed. Please try again.</p>`;
          messageDiv.style.color = 'red';
        };

        xhr.send(formData);
      });

      var intervalId = null;

      function runArimaModel() {
        var warningMessageElem = document.getElementById('warningMessage');
        warningMessageElem.innerText = "The forecasting is currently happening...";
        warningMessageElem.className = "warning-message warning-running";

        // Make an AJAX call to run the PHP script
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "run_arima.php", true);
        xhr.onreadystatechange = function () {
          if (xhr.readyState === 4 && xhr.status === 200) {
            var responseText = xhr.responseText;
            warningMessageElem.innerText = responseText;

            if (responseText.includes("completed successfully")) {
              warningMessageElem.className = "warning-message warning-completed";
            } else if (responseText.includes("error")) {
              warningMessageElem.className = "warning-message warning-error";
            }

            // Stop checking the status after completion
            if (intervalId) {
              clearInterval(intervalId);
              intervalId = null;
            }
          }
        };
        xhr.send();

        // Start checking the script status after the button is clicked
        if (!intervalId) {
          intervalId = setInterval(checkScriptStatus, 5000); // Check every 5 seconds
        }
      }

      function checkScriptStatus() {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "check_status.php", true);
        xhr.onreadystatechange = function () {
          if (xhr.readyState === 4 && xhr.status === 200) {
            var status = xhr.responseText;
            var message = '';
            var warningMessageElem = document.getElementById('warningMessage');

            if (status === 'running') {
              message = "The forecasting is currently happening...";
              warningMessageElem.className = "warning-message warning-running";
            } else if (status === 'completed') {
              message = "The forecasting has been completed successfully.";
              warningMessageElem.className = "warning-message warning-completed";
            } else if (status === 'error') {
              message = "There was an error running the forecast. Please try again.";
              warningMessageElem.className = "warning-message warning-error";
            }
            warningMessageElem.innerText = message;

            // Stop checking the status if the script is not running
            if (status === 'completed' || status === 'error') {
              if (intervalId) {
                clearInterval(intervalId);
                intervalId = null;
              }
            }
          }
        };
        xhr.send();
      }

    </script>

  </body>
</html>