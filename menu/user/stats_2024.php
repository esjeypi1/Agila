<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- jquery -->
    <script src="http://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

    <!-- Google Fonts/Logo -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../../styles/navbar_main.css"> <!-- Top Menu -->
    <link rel="stylesheet" href="../../styles/container_main.css"> <!-- Side Menu -->
    <link rel="icon" sizes="192x192" href="../../images/logo_agila.png">

    <!-- graph script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.0/papaparse.min.js"></script>

    <title>AGILA</title>

    <style>
      /* Ensure the canvas fits within the container dimensions */
      #chartContainer {
        width: 110%;
        height: 90%;
        position: relative;
        display: flex;


      }
      #crimeChart1 {
        width: 90% !important;
        height: 97% !important;
        display: flex;

      }
      #crimeChart2 {
        width: 90% !important;
        height: 99% !important;
        display: flex;

      }
      #crimeChart3 {
        width: 90% !important;
        height: 97% !important;
        display: flex;

      }
      #crimeChart4 {
        width: 90% !important;
        height: 97% !important;
        display: flex;

      }
    </style>

  </head>

  <body>
    <div class="box-out">
      <nav class="navbar navbar-expand-lg"> <!-- Navbar (START) -->
        <div class="container-fluid">
          <a class="navbar-brand me-auto" href="../user/index.php"><img src="../../images/logo-full_agila.png" class="logo"></a>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">AGILA</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                  <a class="nav-link mx-lg-2" href="about.php">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mx-lg-2" href="contact.php">Contact Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mx-lg-2" href="user_prof.php">Account</a>
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

        <div class="side-menu"> <!-- Side Menu (START) -->
          <div class="side-title">
            <h1 class="place">MANILA</h1>
            <h2 class="coor">14.5995, 120.9842</h2>

          </div>
          <div class="side-btn-grp">
            <form class="form-btn" action="info.php" method="post">
              <button class="side-btn" type="submit" name="submit" value="0"><i class='btn-logo bx bxs-info-square'></i>Information</button><br>
            </form>
            <form class="form-btn" action="2023_stats.php" method="post">
              <button class="side-btn" type="submit" name="submit" value="0"><i class='btn-logo bx bxs-bar-chart-alt-2'></i>Statistics</button><br>
            </form>
            <form class="form-btn" action="fcast.php" method="post">
              <button class="side-btn" type="submit" name="submit" value="0"><i class='btn-logo bx bxs-timer' ></i>Forecasting</button><br>
            </form>
          </div>

          <div class="h-btn">
            <a type="button" class="btn btn-primary" href="index.php"><span class="h-btn-logo material-symbols-outlined">arrow_back_ios_new</span></a>
          </div>

          <p class="side-tips">Need some tips on navigating the dashboard? Visit the Contact Us tab </p>
        </div> <!-- Side Menu (END) -->

        <div class="right-menu" style="overflow-y: auto; overflow-x: hidden;"> <!-- Right Canvas (START) -->
          <div class="patterns">
            <svg width="400%" height="150%">
              <defs>
                <style>
                  @import url("https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i");
                </style>
              </defs>
              <text x="54%" y="17%" text-anchor="middle" style="font-size: 40px;">Year 2024</text>
              <text x="54%" y="27%" text-anchor="middle" style="font-size: 15px;">Statistical Representation</text>
            </svg>
          </div>


          <div class="container row1-stats" id="#disp-item-1">
            <div class="row"> <!--row 1 -->
              <div class="col"> <!-- col 1 -->
                <div class="flip-cardstats mb-5">
                  <div class="flip-card-inner">
                    <div class="flip-card-front">
                      <h1 class="text-shadow mt-1">By Months</h1>
                      <div id="chartContainer">
                        <canvas id="crimeChart1"></canvas>
                      </div>
                      <script>
                        (async function() {
                          // Function to fetch and parse the JSON data from the PHP script
                          async function fetchData() {
                            const response = await fetch('fetch_monthly_stats.php'); // Path to your PHP file
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


                            const filteredData = jsonData.filter(row => parseInt(row.YEAR) === 2024);
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

                            const ctx = document.getElementById('crimeChart1').getContext('2d');
                            const crimeChart1 = new Chart(ctx, {
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
                                      color: '#000000'
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
                                      color: '#000000'
                                    }
                                  },
                                  x: {
                                    ticks: {
                                      font: {
                                        size: 12
                                      },
                                      color: '#000000'
                                    }
                                  }
                                }
                              }
                            });
                          }

                          drawChart();
                        })();
                      </script>


                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="container row2-stats" id="#disp-item-2">
            <div class="row"> <!--row 1 -->
              <div class="col"> <!-- col 1 -->
                <div class="flip-cardstats">
                  <div class="flip-card-inner">
                    <div class="flip-card-front">
                      <h1 class="text-shadow mt-1">By Time of Day</h1>
                      <div id="chartContainer">
                        <canvas id="crimeChart2"></canvas>
                      </div>
                      <script>
                        (async function() {
                          // Function to fetch and parse the JSON data from the PHP script
                          async function fetchData() {
                            const response = await fetch('fetch_hourly_stats.php'); // Path to your PHP file
                            const jsonData = await response.json();

                            if (jsonData.message) {
                              console.error(jsonData.message);
                              return { labels: [], datasets: [] };
                            }

                            const data = {
                              labels: Array.from({ length: 24 }, (_, i) => i.toString()), // Hours 0-23
                              datasets: []
                            };

                            const crimeTypes = {};

                            const filteredData1 = jsonData.filter(row => parseInt(row.YEAR) === 2024);
                            console.log("Filtered data (2020):", filteredData1); // Log filtered data

                            filteredData1.forEach(row => {
                              const hour = parseInt(row.HOUR);
                              const typeName = row.TYPE_NAME;
                              const count = parseInt(row.COUNT);


                              if (!crimeTypes[typeName]) {
                                crimeTypes[typeName] = {
                                  label: typeName, // Use the type name directly
                                  data: Array(24).fill(0),
                                  backgroundColor: getRandomColor(),
                                  borderColor: getRandomColor(),
                                  borderWidth: 1,
                                  fill: false, // Don't fill area under the line
                                  tension: 0.4 // Adjust curve of the line
                                };
                              }
                              crimeTypes[typeName].data[hour] += count;
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
                          async function drawChart2() {
                            const data = await fetchData();

                            const ctx = document.getElementById('crimeChart2').getContext('2d');
                            const crimeChart2 = new Chart(ctx, {
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
                                      color: '#000000'
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
                                      color: '#000000'
                                    }
                                  },
                                  x: {
                                    title: {
                                      display: true,
                                      text: 'Hour',
                                      font: {
                                        size: 10 
                                      },
                                      color: '#000000'
                                    },
                                    ticks: {
                                      font: {
                                        size: 12
                                      },
                                      color: '#000000'
                                    }
                                  }
                                }
                              }
                            });
                          }

                          drawChart2();
                        })();
                      </script>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="container_left btn-conteiner">
            <a href ="stats_2023.php" class = "btn-content">
              <span class="icon-arrow">
                <svg
                     xmlns:xlink="http://www.w3.org/1999/xlink"
                     xmlns="http://www.w3.org/2000/svg"
                     version="1.1"
                     viewBox="0 0 66 43"
                     height="30px"
                     width="30px"
                     >
                  <g
                     fill-rule="evenodd"
                     fill="none"
                     stroke-width="1"
                     stroke="none"
                     id="arrow"
                     >
                    <path
                          fill="#9ee5fa"
                          d="M40.1543933,3.89485454 L43.9763149,0.139296592 C44.1708311,-0.0518420739 44.4826329,-0.0518571125 44.6771675,0.139262789 L65.6916134,20.7848311 C66.0855801,21.1718824 66.0911863,21.8050225 65.704135,22.1989893 C65.7000188,22.2031791 65.6958657,22.2073326 65.6916762,22.2114492 L44.677098,42.8607841 C44.4825957,43.0519059 44.1708242,43.0519358 43.9762853,42.8608513 L40.1545186,39.1069479 C39.9575152,38.9134427 39.9546793,38.5968729 40.1481845,38.3998695 C40.1502893,38.3977268 40.1524132,38.395603 40.1545562,38.3934985 L56.9937789,21.8567812 C57.1908028,21.6632968 57.193672,21.3467273 57.0001876,21.1497035 C56.9980647,21.1475418 56.9959223,21.1453995 56.9937605,21.1432767 L40.1545208,4.60825197 C39.9574869,4.41477773 39.9546013,4.09820839 40.1480756,3.90117456 C40.1501626,3.89904911 40.1522686,3.89694235 40.1543933,3.89485454 Z"
                          id="arrow-icon-one"
                          ></path>
                    <path
                          fill="#9ee5fa"
                          d="M20.1543933,3.89485454 L23.9763149,0.139296592 C24.1708311,-0.0518420739 24.4826329,-0.0518571125 24.6771675,0.139262789 L45.6916134,20.7848311 C46.0855801,21.1718824 46.0911863,21.8050225 45.704135,22.1989893 C45.7000188,22.2031791 45.6958657,22.2073326 45.6916762,22.2114492 L24.677098,42.8607841 C24.4825957,43.0519059 24.1708242,43.0519358 23.9762853,42.8608513 L20.1545186,39.1069479 C19.9575152,38.9134427 19.9546793,38.5968729 20.1481845,38.3998695 C20.1502893,38.3977268 20.1524132,38.395603 20.1545562,38.3934985 L36.9937789,21.8567812 C37.1908028,21.6632968 37.193672,21.3467273 37.0001876,21.1497035 C36.9980647,21.1475418 36.9959223,21.1453995 36.9937605,21.1432767 L20.1545208,4.60825197 C19.9574869,4.41477773 19.9546013,4.09820839 20.1480756,3.90117456 C20.1501626,3.89904911 20.1522686,3.89694235 20.1543933,3.89485454 Z"
                          id="arrow-icon-two"
                          ></path>
                    <path
                          fill="#9ee5fa"
                          d="M0.154393339,3.89485454 L3.97631488,0.139296592 C4.17083111,-0.0518420739 4.48263286,-0.0518571125 4.67716753,0.139262789 L25.6916134,20.7848311 C26.0855801,21.1718824 26.0911863,21.8050225 25.704135,22.1989893 C25.7000188,22.2031791 25.6958657,22.2073326 25.6916762,22.2114492 L4.67709797,42.8607841 C4.48259567,43.0519059 4.17082418,43.0519358 3.97628526,42.8608513 L0.154518591,39.1069479 C-0.0424848215,38.9134427 -0.0453206733,38.5968729 0.148184538,38.3998695 C0.150289256,38.3977268 0.152413239,38.395603 0.154556228,38.3934985 L16.9937789,21.8567812 C17.1908028,21.6632968 17.193672,21.3467273 17.0001876,21.1497035 C16.9980647,21.1475418 16.9959223,21.1453995 16.9937605,21.1432767 L0.15452076,4.60825197 C-0.0425130651,4.41477773 -0.0453986756,4.09820839 0.148075568,3.90117456 C0.150162624,3.89904911 0.152268631,3.89694235 0.154393339,3.89485454 Z"
                          id="arrow-icon-three"
                          ></path>
                  </g>
                </svg>
              </span>
            </a>
          </div>
          <div class="container_right btn-conteiner">
            <a href ="stats.php" class = "btn-content">
              <span class="icon-arrow">
                <svg
                     xmlns:xlink="http://www.w3.org/1999/xlink"
                     xmlns="http://www.w3.org/2000/svg"
                     version="1.1"
                     viewBox="0 0 66 43"
                     height="30px"
                     width="30px"
                     >
                  <g
                     fill-rule="evenodd"
                     fill="none"
                     stroke-width="1"
                     stroke="none"
                     id="arrow"
                     >
                    <path
                          fill="#9ee5fa"
                          d="M40.1543933,3.89485454 L43.9763149,0.139296592 C44.1708311,-0.0518420739 44.4826329,-0.0518571125 44.6771675,0.139262789 L65.6916134,20.7848311 C66.0855801,21.1718824 66.0911863,21.8050225 65.704135,22.1989893 C65.7000188,22.2031791 65.6958657,22.2073326 65.6916762,22.2114492 L44.677098,42.8607841 C44.4825957,43.0519059 44.1708242,43.0519358 43.9762853,42.8608513 L40.1545186,39.1069479 C39.9575152,38.9134427 39.9546793,38.5968729 40.1481845,38.3998695 C40.1502893,38.3977268 40.1524132,38.395603 40.1545562,38.3934985 L56.9937789,21.8567812 C57.1908028,21.6632968 57.193672,21.3467273 57.0001876,21.1497035 C56.9980647,21.1475418 56.9959223,21.1453995 56.9937605,21.1432767 L40.1545208,4.60825197 C39.9574869,4.41477773 39.9546013,4.09820839 40.1480756,3.90117456 C40.1501626,3.89904911 40.1522686,3.89694235 40.1543933,3.89485454 Z"
                          id="arrow-icon-one"
                          ></path>
                    <path
                          fill="#9ee5fa"
                          d="M20.1543933,3.89485454 L23.9763149,0.139296592 C24.1708311,-0.0518420739 24.4826329,-0.0518571125 24.6771675,0.139262789 L45.6916134,20.7848311 C46.0855801,21.1718824 46.0911863,21.8050225 45.704135,22.1989893 C45.7000188,22.2031791 45.6958657,22.2073326 45.6916762,22.2114492 L24.677098,42.8607841 C24.4825957,43.0519059 24.1708242,43.0519358 23.9762853,42.8608513 L20.1545186,39.1069479 C19.9575152,38.9134427 19.9546793,38.5968729 20.1481845,38.3998695 C20.1502893,38.3977268 20.1524132,38.395603 20.1545562,38.3934985 L36.9937789,21.8567812 C37.1908028,21.6632968 37.193672,21.3467273 37.0001876,21.1497035 C36.9980647,21.1475418 36.9959223,21.1453995 36.9937605,21.1432767 L20.1545208,4.60825197 C19.9574869,4.41477773 19.9546013,4.09820839 20.1480756,3.90117456 C20.1501626,3.89904911 20.1522686,3.89694235 20.1543933,3.89485454 Z"
                          id="arrow-icon-two"
                          ></path>
                    <path
                          fill="#9ee5fa"
                          d="M0.154393339,3.89485454 L3.97631488,0.139296592 C4.17083111,-0.0518420739 4.48263286,-0.0518571125 4.67716753,0.139262789 L25.6916134,20.7848311 C26.0855801,21.1718824 26.0911863,21.8050225 25.704135,22.1989893 C25.7000188,22.2031791 25.6958657,22.2073326 25.6916762,22.2114492 L4.67709797,42.8607841 C4.48259567,43.0519059 4.17082418,43.0519358 3.97628526,42.8608513 L0.154518591,39.1069479 C-0.0424848215,38.9134427 -0.0453206733,38.5968729 0.148184538,38.3998695 C0.150289256,38.3977268 0.152413239,38.395603 0.154556228,38.3934985 L16.9937789,21.8567812 C17.1908028,21.6632968 17.193672,21.3467273 17.0001876,21.1497035 C16.9980647,21.1475418 16.9959223,21.1453995 16.9937605,21.1432767 L0.15452076,4.60825197 C-0.0425130651,4.41477773 -0.0453986756,4.09820839 0.148075568,3.90117456 C0.150162624,3.89904911 0.152268631,3.89694235 0.154393339,3.89485454 Z"
                          id="arrow-icon-three"
                          ></path>
                  </g>
                </svg>
              </span>
            </a>
          </div>

        </div> <!-- Right Canvas (END) -->
      </section> <!-- Main Menu Container (END) -->
    </div>
    <?php
    $mysqli = require __DIR__ . "../../../scripts/con_db.php";

    $action = 'view';
    $item_type = 'stats';
    $item_id = 1;
    $details = 'The user viewed the year 2019 statistics';

    // Prepare the SQL statement
    $stmt = $mysqli->prepare("INSERT INTO audit_trail (action, item_type, item_id, details) VALUES (?, ?, ?, ?)");
    if ($stmt) {
      // Bind parameters
      $stmt->bind_param('ssis', $action, $item_type, $item_id, $details);

      // Execute the statement
      if ($stmt->execute()) {

      } else {
        echo "Error: " . $stmt->error;
      }

      // Close the statement
      $stmt->close();
    } else {
      echo "Error: " . $mysqli->error;
    }

    // Close the connection
    $mysqli->close();
    ?>
  </body>
</html>