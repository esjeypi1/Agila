<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <!-- Google Fonts/Logo -->
      <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../../styles/navbar_main.css"> <!-- Top Menu -->
    <link rel="stylesheet" href="../../styles/container_main.css"> <!-- Side Menu -->
    <link rel="stylesheet" href="../../styles/fcast.css">
         <link rel="icon" sizes="192x192" href="../../images/logo_agila.png">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.0/papaparse.min.js"></script>

    <title>AGILA</title>
    
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
                <a class="logout-btn" href="#">Logout</a>
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
                        <form class="form-btn" action="stats.php" method="post">
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
            
            <div class="right-menu" style = "overflow-y: auto; max-height: 100vh; overflow-x: hidden;"> <!-- Right Canvas (START) -->
                <div class="patterns">
                    <svg width="400%" height="150%">
                        <defs>
                            <style>
                                @import url("https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i");
                            </style>
                        </defs>
                        <text x="55%" y="27%" text-anchor="middle" style="font-size: 65px;">Manila</text>
                        <text x="55%" y="36%" text-anchor="middle" style="font-size: 20px;">Forecast</text>                    </svg>
                </div>

                <div class = "container row1-fcast" >
                    <div class = "row"> <!--row 1 -->
                        <div class ="col"> <!-- col 1 row 1 -->
                            <div class="flip-card2-fcast">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                    <h1 class="text-shadow mt-2 mb-0">MURDER (Q2-2024)</h1>
                                        <div id="chartContainer1">
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

                                            const crimeType = 'Murder'; // Specify the crime type you want to filter for

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

                                            const filteredData = jsonData.filter(row => parseInt(row.YEAR) === 2024 && [4, 5, 6].includes(parseInt(row.MONTH)) && row.TYPE_NAME === crimeType);
                                            console.log(`Filtered data (2024, months 4, 5, 6, crime type ${crimeType}):`, filteredData); // Log filtered data

                                            filteredData.forEach(row => {
                                              const month = row.MONTH;
                                              const count = row.COUNT;
                                              const monthLabel = `${monthMapping[month]}`;

                                              if (!data.labels.includes(monthLabel)) {
                                                data.labels.push(monthLabel);
                                              }

                                              data.datasets.push({
                                                label: crimeType,
                                                data: [{ x: monthLabel, y: count }],
                                                backgroundColor: getRandomColor(),
                                                borderColor: getRandomColor(),
                                                borderWidth: 1,
                                                barThickness: 18,
                                                maxBarThickness: 20
                                              });
                                            });

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
                                              type: 'bar', // You can change this to 'line', 'pie', etc.
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
                            <div class ="col"> <!-- col 2 row 1 -->
                            <div class="flip-card2-fcast">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                    <h1 class="text-shadow mt-2 mb-0">MURDER (Forecasted)</h1>
                                        <div id="chartContainer2">
                                            <canvas id="crimeChart2"></canvas>
                                        </div>
                                        <script>
                                          (async function() {
                                            async function fetchData2() {
                                              const response = await fetch('fetch_fc.php'); // Path to your PHP file
                                              const jsonData = await response.json();

                                              if (jsonData.message) {
                                                console.error(jsonData.message);
                                                return { labels: [], datasets: [] };
                                              }
                                              
                                              const crimeType = 'Murder'; // Set the crime type to filter
                                              const month = 7; // July

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

                                              // Filter the data to include only rows where the TYPE_NAME is 'Murder' and MONTH is 7 (July)
                                              const filteredData = jsonData.filter(row => row.TYPE_NAME === crimeType && row.MONTH == month);

                                              const data = {
                                                labels: ['July'], // Only July as the label
                                                datasets: [{
                                                  label: crimeType, // Label for the dataset
                                                  data: [], // Initialize data array for July
                                                  backgroundColor: [],
                                                  borderColor: [],
                                                  borderWidth: 1,
                                                  barThickness: 20,
                                                  maxBarThickness: 20
                                                }]
                                              };

                                              filteredData.forEach(row => {
                                                const count = row.count;

                                                data.datasets[0].data.push(count);
                                                data.datasets[0].backgroundColor.push(getRandomColor());
                                                data.datasets[0].borderColor.push(getRandomColor());
                                              });

                                              console.log("Final data for the chart:", data); // Log final data for the chart

                                              return data;
                                            }

                                            function getRandomColor() {
                                              const letters = '0123456789ABCDEF';
                                              let color = '#';
                                              for (let i = 0; i < 6; i++) {
                                                color += letters[Math.floor(Math.random() * 16)];
                                              }
                                              return color;
                                            }

                                            async function drawChart2() {
                                              const data = await fetchData2();

                                              const ctx = document.getElementById('crimeChart2').getContext('2d');
                                              const crimeChart2 = new Chart(ctx, {
                                                type: 'bar', // You can change this to 'line', 'pie', etc.
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
                                                          size: 12 // Adjust font size here
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

                                            drawChart2();
                                          })();
                                      </script>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                </div>

                <div class = "container row2-fcast" >
                    <div class = "row"> <!--row 2 -->
                        <div class ="col"> <!-- col 1 row 2 -->
                            <div class="flip-card2-fcast">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                    <h1 class="text-shadow mt-2 mb-0">HOMICIDE (Q2-2024)</h1>
                                        <div id="chartContainer3">
                                            <canvas id="crimeChart3"></canvas>
                                        </div>
                                        <script>
                                            (async function() {
                                          // Function to fetch and parse the JSON data from the PHP script
                                          async function fetchData3() {
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

                                            const crimeType = 'Homicide'; // Specify the crime type you want to filter for
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

                                            const filteredData = jsonData.filter(row => parseInt(row.YEAR) === 2024 && [4, 5, 6].includes(parseInt(row.MONTH)) && row.TYPE_NAME === crimeType);
                                            console.log(`Filtered data (2024, months 4, 5, 6, crime type ${crimeType}):`, filteredData); // Log filtered data

                                            filteredData.forEach(row => {
                                              const month = row.MONTH;
                                              const count = row.COUNT;
                                              const monthLabel = `${monthMapping[month]}`;

                                              if (!data.labels.includes(monthLabel)) {
                                                data.labels.push(monthLabel);
                                              }

                                              data.datasets.push({
                                                label: crimeType,
                                                data: [{ x: monthLabel, y: count }],
                                                backgroundColor: getRandomColor(),
                                                borderColor: getRandomColor(),
                                                borderWidth: 1,
                                                barThickness: 18,
                                                maxBarThickness: 20
                                              });
                                            });

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
                                          async function drawChart3() {
                                            const data = await fetchData3();

                                            const ctx = document.getElementById('crimeChart3').getContext('2d');
                                            const crimeChart3 = new Chart(ctx, {
                                              type: 'bar', // You can change this to 'line', 'pie', etc.
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

                                          drawChart3();
                                        })();
                                        </script>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class ="col"> <!-- col 2 row 2 -->
                            <div class="flip-card2-fcast">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                    <h1 class="text-shadow mt-2 mb-0">HOMICIDE (Forecasted)</h1>
                                        <div id="chartContainer4">
                                            <canvas id="crimeChart4"></canvas>
                                        </div>
                                        <script>
                                          (async function() {
                                            async function fetchData4() {
                                              const response = await fetch('fetch_fc.php'); // Path to your PHP file
                                              const jsonData = await response.json();

                                              if (jsonData.message) {
                                                console.error(jsonData.message);
                                                return { labels: [], datasets: [] };
                                              }

                                              const crimeType = 'Homicide'; // Set the crime type to filter
                                              const month = 7; // July

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

                                              // Filter the data to include only rows where the TYPE_NAME is 'Murder' and MONTH is 7 (July)
                                              const filteredData = jsonData.filter(row => row.TYPE_NAME === crimeType && row.MONTH == month);

                                              const data = {
                                                labels: ['July'], // Only July as the label
                                                datasets: [{
                                                  label: crimeType, // Label for the dataset
                                                  data: [], // Initialize data array for July
                                                  backgroundColor: [],
                                                  borderColor: [],
                                                  borderWidth: 1,
                                                  barThickness: 20,
                                                  maxBarThickness: 20
                                                }]
                                              };

                                              filteredData.forEach(row => {
                                                const count = row.count;

                                                data.datasets[0].data.push(count);
                                                data.datasets[0].backgroundColor.push(getRandomColor());
                                                data.datasets[0].borderColor.push(getRandomColor());
                                              });

                                              console.log("Final data for the chart:", data); // Log final data for the chart

                                              return data;
                                            }

                                            function getRandomColor() {
                                              const letters = '0123456789ABCDEF';
                                              let color = '#';
                                              for (let i = 0; i < 6; i++) {
                                                color += letters[Math.floor(Math.random() * 16)];
                                              }
                                              return color;
                                            }

                                            async function drawChart4() {
                                              const data = await fetchData4();

                                              const ctx = document.getElementById('crimeChart4').getContext('2d');
                                              const crimeChart4 = new Chart(ctx, {
                                                type: 'bar', // You can change this to 'line', 'pie', etc.
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
                                                          size: 12 // Adjust font size here
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

                                            drawChart4();
                                          })();
                                      </script>

                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                </div>
                <div class = "container row2-fcast" >
                    <div class = "row"> <!--row 3 -->
                        <div class ="col"> <!-- col 1 row 3 -->
                            <div class="flip-card2-fcast">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                    <h1 class="text-shadow mt-2 mb-0">PHYSICAL INJURIES (Q2-2024)</h1>
                                        <div id="chartContainer5">
                                            <canvas id="crimeChart5"></canvas>
                                        </div>
                                        <script>
                                           (async function() {
                                          // Function to fetch and parse the JSON data from the PHP script
                                          async function fetchData5() {
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

                                            const crimeType = 'Physical Injury'; // Specify the crime type you want to filter for

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

                                            const filteredData = jsonData.filter(row => parseInt(row.YEAR) === 2024 && [4, 5, 6].includes(parseInt(row.MONTH)) && row.TYPE_NAME === crimeType);
                                            console.log(`Filtered data (2024, months 4, 5, 6, crime type ${crimeType}):`, filteredData); // Log filtered data

                                            filteredData.forEach(row => {
                                              const month = row.MONTH;
                                              const count = row.COUNT;
                                              const monthLabel = `${monthMapping[month]}`;

                                              if (!data.labels.includes(monthLabel)) {
                                                data.labels.push(monthLabel);
                                              }

                                              data.datasets.push({
                                                label: crimeType,
                                                data: [{ x: monthLabel, y: count }],
                                                backgroundColor: getRandomColor(),
                                                borderColor: getRandomColor(),
                                                borderWidth: 1,
                                                barThickness: 18,
                                                maxBarThickness: 20
                                              });
                                            });

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
                                          async function drawChart5() {
                                            const data = await fetchData5();

                                            const ctx = document.getElementById('crimeChart5').getContext('2d');
                                            const crimeChart5 = new Chart(ctx, {
                                              type: 'bar', // You can change this to 'line', 'pie', etc.
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

                                          drawChart5();
                                        })();
                                        </script>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class ="col"> <!-- col 2 row 3 -->
                            <div class="flip-card2-fcast">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                    <h1 class="text-shadow mt-2 mb-0">PHYSICAL INJURIES (Forecasted)</h1>
                                        <div id="chartContainer6">
                                            <canvas id="crimeChart6"></canvas>
                                        </div>
                                      <script>
                                        (async function() {
                                          async function fetchData6() {
                                            const response = await fetch('fetch_fc.php'); // Path to your PHP file
                                            const jsonData = await response.json();

                                            if (jsonData.message) {
                                              console.error(jsonData.message);
                                              return { labels: [], datasets: [] };
                                            }

                                            const crimeType = 'Physical Injury'; // Set the crime type to filter

                                            const month = 7; // July

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

                                            // Filter the data to include only rows where the TYPE_NAME is 'Murder' and MONTH is 7 (July)
                                            const filteredData = jsonData.filter(row => row.TYPE_NAME === crimeType && row.MONTH == month);

                                            const data = {
                                              labels: ['July'], // Only July as the label
                                              datasets: [{
                                                label: crimeType, // Label for the dataset
                                                data: [], // Initialize data array for July
                                                backgroundColor: [],
                                                borderColor: [],
                                                borderWidth: 1,
                                                barThickness: 20,
                                                maxBarThickness: 20
                                              }]
                                            };

                                            filteredData.forEach(row => {
                                              const count = row.count;

                                              data.datasets[0].data.push(count);
                                              data.datasets[0].backgroundColor.push(getRandomColor());
                                              data.datasets[0].borderColor.push(getRandomColor());
                                            });
                                            console.log("Final data for the chart:", data); // Log final data for the chart

                                            return data;
                                          }

                                          function getRandomColor() {
                                            const letters = '0123456789ABCDEF';
                                            let color = '#';
                                            for (let i = 0; i < 6; i++) {
                                              color += letters[Math.floor(Math.random() * 16)];
                                            }
                                            return color;
                                          }

                                          async function drawChart6() {
                                            const data = await fetchData6();

                                            const ctx = document.getElementById('crimeChart6').getContext('2d');
                                            const crimeChart6 = new Chart(ctx, {
                                              type: 'bar', // You can change this to 'line', 'pie', etc.
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
                                                        size: 12 // Adjust font size here
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

                                          drawChart6();
                                        })();
                                      </script>

                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                </div>
                <div class = "container row2-fcast" >
                    <div class = "row"> <!--row 4 -->
                        <div class ="col"> <!-- col 1 row 4 -->
                            <div class="flip-card2-fcast">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                    <h1 class="text-shadow mt-2 mb-0">RAPE (Q2-2024)</h1>
                                        <div id="chartContainer7">
                                            <canvas id="crimeChart7"></canvas>
                                        </div>
                                        <script>
                                            (async function() {
                                          // Function to fetch and parse the JSON data from the PHP script
                                          async function fetchData7() {
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

                                            const crimeType = 'Rape'; // Specify the crime type you want to filter for

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

                                            const filteredData = jsonData.filter(row => parseInt(row.YEAR) === 2024 && [4, 5, 6].includes(parseInt(row.MONTH)) && row.TYPE_NAME === crimeType);
                                            console.log(`Filtered data (2024, months 4, 5, 6, crime type ${crimeType}):`, filteredData); // Log filtered data

                                            filteredData.forEach(row => {
                                              const month = row.MONTH;
                                              const count = row.COUNT;
                                              const monthLabel = `${monthMapping[month]}`;

                                              if (!data.labels.includes(monthLabel)) {
                                                data.labels.push(monthLabel);
                                              }

                                              data.datasets.push({
                                                label: crimeType,
                                                data: [{ x: monthLabel, y: count }],
                                                backgroundColor: getRandomColor(),
                                                borderColor: getRandomColor(),
                                                borderWidth: 1,
                                                barThickness: 18,
                                                maxBarThickness: 20
                                              });
                                            });

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
                                          async function drawChart7() {
                                            const data = await fetchData7();

                                            const ctx = document.getElementById('crimeChart7').getContext('2d');
                                            const crimeChart7 = new Chart(ctx, {
                                              type: 'bar', // You can change this to 'line', 'pie', etc.
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

                                          drawChart7();
                                        })();
                                        </script>
                                     

                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class ="col"> <!-- col 2 row 4 -->
                            <div class="flip-card2-fcast">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                    <h1 class="text-shadow mt-2 mb-0">RAPE (Forecasted)</h1>
                                        <div id="chartContainer8">
                                            <canvas id="crimeChart8"></canvas>
                                        </div>
                                      <script>
                                        (async function() {
                                          async function fetchData8() {
                                            const response = await fetch('fetch_fc.php'); // Path to your PHP file
                                            const jsonData = await response.json();

                                            if (jsonData.message) {
                                              console.error(jsonData.message);
                                              return { labels: [], datasets: [] };
                                            }

                                            const crimeType = 'Rape'; // Set the crime type to filter

                                            const month = 7; // July

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

                                            // Filter the data to include only rows where the TYPE_NAME is 'Murder' and MONTH is 7 (July)
                                            const filteredData = jsonData.filter(row => row.TYPE_NAME === crimeType && row.MONTH == month);

                                            const data = {
                                              labels: ['July'], // Only July as the label
                                              datasets: [{
                                                label: crimeType, // Label for the dataset
                                                data: [], // Initialize data array for July
                                                backgroundColor: [],
                                                borderColor: [],
                                                borderWidth: 1,
                                                barThickness: 20,
                                                maxBarThickness: 20
                                              }]
                                            };

                                            filteredData.forEach(row => {
                                              const count = row.count;

                                              data.datasets[0].data.push(count);
                                              data.datasets[0].backgroundColor.push(getRandomColor());
                                              data.datasets[0].borderColor.push(getRandomColor());
                                            });

                                            console.log("Final data for the chart:", data); // Log final data for the chart

                                            return data;
                                          }

                                          function getRandomColor() {
                                            const letters = '0123456789ABCDEF';
                                            let color = '#';
                                            for (let i = 0; i < 6; i++) {
                                              color += letters[Math.floor(Math.random() * 16)];
                                            }
                                            return color;
                                          }

                                          async function drawChart8() {
                                            const data = await fetchData8();

                                            const ctx = document.getElementById('crimeChart8').getContext('2d');
                                            const crimeChart8 = new Chart(ctx, {
                                              type: 'bar', // You can change this to 'line', 'pie', etc.
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
                                                        size: 12 // Adjust font size here
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

                                          drawChart8();
                                        })();
                                      </script>

                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                </div>
                <div class = "container row2-fcast" >
                    <div class = "row"> <!--row 5 -->
                        <div class ="col"> <!-- col 1 row 5 -->
                            <div class="flip-card2-fcast">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                    <h1 class="text-shadow mt-2 mb-0">ROBBERY (Q2-2024)</h1>
                                        <div id="chartContainer9">
                                            <canvas id="crimeChart9"></canvas>
                                        </div>
                                        <script>
                                            (async function() {
                                          // Function to fetch and parse the JSON data from the PHP script
                                          async function fetchData9() {
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

                                            const crimeType = 'Robbery'; // Specify the crime type you want to filter for

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

                                            const filteredData = jsonData.filter(row => parseInt(row.YEAR) === 2024 && [4, 5, 6].includes(parseInt(row.MONTH)) && row.TYPE_NAME === crimeType);
                                            console.log(`Filtered data (2024, months 4, 5, 6, crime type ${crimeType}):`, filteredData); // Log filtered data

                                            filteredData.forEach(row => {
                                              const month = row.MONTH;
                                              const count = row.COUNT;
                                              const monthLabel = `${monthMapping[month]}`;

                                              if (!data.labels.includes(monthLabel)) {
                                                data.labels.push(monthLabel);
                                              }

                                              data.datasets.push({
                                                label: crimeType,
                                                data: [{ x: monthLabel, y: count }],
                                                backgroundColor: getRandomColor(),
                                                borderColor: getRandomColor(),
                                                borderWidth: 1,
                                                barThickness: 18,
                                                maxBarThickness: 20
                                              });
                                            });

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
                                          async function drawChart9() {
                                            const data = await fetchData9();

                                            const ctx = document.getElementById('crimeChart9').getContext('2d');
                                            const crimeChart9 = new Chart(ctx, {
                                              type: 'bar', // You can change this to 'line', 'pie', etc.
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

                                          drawChart9();
                                        })();
                                        </script>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class ="col"> <!-- col 2 row 5 -->
                            <div class="flip-card2-fcast">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                    <h1 class="text-shadow mt-2 mb-0">ROBBERY (Forecasted)</h1>
                                        <div id="chartContainer10">
                                            <canvas id="crimeChart10"></canvas>
                                        </div>
                                      <script>
                                        (async function() {
                                          async function fetchData10() {
                                            const response = await fetch('fetch_fc.php'); // Path to your PHP file
                                            const jsonData = await response.json();

                                            if (jsonData.message) {
                                              console.error(jsonData.message);
                                              return { labels: [], datasets: [] };
                                            }

                                            const crimeType = 'Robbery'; // Set the crime type to filter

                                            const month = 7; // July

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

                                            // Filter the data to include only rows where the TYPE_NAME is 'Murder' and MONTH is 7 (July)
                                            const filteredData = jsonData.filter(row => row.TYPE_NAME === crimeType && row.MONTH == month);

                                            const data = {
                                              labels: ['July'], // Only July as the label
                                              datasets: [{
                                                label: crimeType, // Label for the dataset
                                                data: [], // Initialize data array for July
                                                backgroundColor: [],
                                                borderColor: [],
                                                borderWidth: 1,
                                                barThickness: 20,
                                                maxBarThickness: 20
                                              }]
                                            };

                                            filteredData.forEach(row => {
                                              const count = row.count;

                                              data.datasets[0].data.push(count);
                                              data.datasets[0].backgroundColor.push(getRandomColor());
                                              data.datasets[0].borderColor.push(getRandomColor());
                                            });

                                            console.log("Final data for the chart:", data); // Log final data for the chart

                                            return data;
                                          }

                                          function getRandomColor() {
                                            const letters = '0123456789ABCDEF';
                                            let color = '#';
                                            for (let i = 0; i < 6; i++) {
                                              color += letters[Math.floor(Math.random() * 16)];
                                            }
                                            return color;
                                          }

                                          async function drawChart10() {
                                            const data = await fetchData10();

                                            const ctx = document.getElementById('crimeChart10').getContext('2d');
                                            const crimeChart10 = new Chart(ctx, {
                                              type: 'bar', // You can change this to 'line', 'pie', etc.
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
                                                        size: 12 // Adjust font size here
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

                                          drawChart10();
                                        })();
                                      </script>

                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                </div>
                <div class = "container row2-fcast" >
                    <div class = "row"> <!--row 6 -->
                        <div class ="col"> <!-- col 1 row 6 -->
                            <div class="flip-card2-fcast">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                    <h1 class="text-shadow mt-2 mb-0">THEFT (Q2-2024)</h1>
                                        <div id="chartContainer11">
                                            <canvas id="crimeChart11"></canvas>
                                        </div>
                                        <script>
                                           (async function() {
                                          // Function to fetch and parse the JSON data from the PHP script
                                          async function fetchData11() {
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

                                            const crimeType = 'Theft'; // Specify the crime type you want to filter for

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

                                            const filteredData = jsonData.filter(row => parseInt(row.YEAR) === 2024 && [4, 5, 6].includes(parseInt(row.MONTH)) && row.TYPE_NAME === crimeType);
                                            console.log(`Filtered data (2024, months 4, 5, 6, crime type ${crimeType}):`, filteredData); // Log filtered data

                                            filteredData.forEach(row => {
                                              const month = row.MONTH;
                                              const count = row.COUNT;
                                              const monthLabel = `${monthMapping[month]}`;

                                              if (!data.labels.includes(monthLabel)) {
                                                data.labels.push(monthLabel);
                                              }

                                              data.datasets.push({
                                                label: crimeType,
                                                data: [{ x: monthLabel, y: count }],
                                                backgroundColor: getRandomColor(),
                                                borderColor: getRandomColor(),
                                                borderWidth: 1,
                                                barThickness: 18,
                                                maxBarThickness: 20
                                              });
                                            });

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
                                          async function drawChart11() {
                                            const data = await fetchData11();

                                            const ctx = document.getElementById('crimeChart11').getContext('2d');
                                            const crimeChart11 = new Chart(ctx, {
                                              type: 'bar', // You can change this to 'line', 'pie', etc.
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

                                          drawChart11();
                                        })();
                                        </script>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class ="col"> <!-- col 2 row 6 -->
                            <div class="flip-card2-fcast">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                    <h1 class="text-shadow mt-2 mb-0">THEFT (Forecasted)</h1>
                                        <div id="chartContainer12">
                                            <canvas id="crimeChart12"></canvas>
                                        </div>
                                      <script>
                                        (async function() {
                                          async function fetchData12() {
                                            const response = await fetch('fetch_fc.php'); // Path to your PHP file
                                            const jsonData = await response.json();

                                            if (jsonData.message) {
                                              console.error(jsonData.message);
                                              return { labels: [], datasets: [] };
                                            }

                                            const crimeType = 'Theft'; // Set the crime type to filter

                                            const month = 7; // July

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

                                            // Filter the data to include only rows where the TYPE_NAME is 'Murder' and MONTH is 7 (July)
                                            const filteredData = jsonData.filter(row => row.TYPE_NAME === crimeType && row.MONTH == month);

                                            const data = {
                                              labels: ['July'], // Only July as the label
                                              datasets: [{
                                                label: crimeType, // Label for the dataset
                                                data: [], // Initialize data array for July
                                                backgroundColor: [],
                                                borderColor: [],
                                                borderWidth: 1,
                                                barThickness: 20,
                                                maxBarThickness: 20
                                              }]
                                            };

                                            filteredData.forEach(row => {
                                              const count = row.count;

                                              data.datasets[0].data.push(count);
                                              data.datasets[0].backgroundColor.push(getRandomColor());
                                              data.datasets[0].borderColor.push(getRandomColor());
                                            });

                                            console.log("Final data for the chart:", data); // Log final data for the chart

                                            return data;
                                          }

                                          function getRandomColor() {
                                            const letters = '0123456789ABCDEF';
                                            let color = '#';
                                            for (let i = 0; i < 6; i++) {
                                              color += letters[Math.floor(Math.random() * 16)];
                                            }
                                            return color;
                                          }

                                          async function drawChart12() {
                                            const data = await fetchData12();

                                            const ctx = document.getElementById('crimeChart12').getContext('2d');
                                            const crimeChart12 = new Chart(ctx, {
                                              type: 'bar', // You can change this to 'line', 'pie', etc.
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
                                                        size: 12 // Adjust font size here
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

                                          drawChart12();
                                        })();
                                      </script>

                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                </div>
                <div class = "container row2-fcast" >
                    <div class = "row"> <!--row 7 -->
                        <div class ="col"> <!-- col 1 row 7 -->
                            <div class="flip-card2-fcast">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                    <h1 class="text-shadow mt-2 mb-0">CARNAPPING-MV (Q2-2024)</h1>
                                        <div id="chartContainer13">
                                            <canvas id="crimeChart13"></canvas>
                                        </div>
                                        <script>
                                            (async function() {
                                          // Function to fetch and parse the JSON data from the PHP script
                                          async function fetchData13() {
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

                                            const crimeType = 'Carnapping (Vehicle)'; // Specify the crime type you want to filter for

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

                                            const filteredData = jsonData.filter(row => parseInt(row.YEAR) === 2024 && [4, 5, 6].includes(parseInt(row.MONTH)) && row.TYPE_NAME === crimeType);
                                            console.log(`Filtered data (2024, months 4, 5, 6, crime type ${crimeType}):`, filteredData); // Log filtered data

                                            filteredData.forEach(row => {
                                              const month = row.MONTH;
                                              const count = row.COUNT;
                                              const monthLabel = `${monthMapping[month]}`;

                                              if (!data.labels.includes(monthLabel)) {
                                                data.labels.push(monthLabel);
                                              }

                                              data.datasets.push({
                                                label: crimeType,
                                                data: [{ x: monthLabel, y: count }],
                                                backgroundColor: getRandomColor(),
                                                borderColor: getRandomColor(),
                                                borderWidth: 1,
                                                barThickness: 18,
                                                maxBarThickness: 20
                                              });
                                            });

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
                                          async function drawChart13() {
                                            const data = await fetchData13();

                                            const ctx = document.getElementById('crimeChart13').getContext('2d');
                                            const crimeChart13 = new Chart(ctx, {
                                              type: 'bar', // You can change this to 'line', 'pie', etc.
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

                                          drawChart13();
                                        })();
                                        </script>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class ="col"> <!-- col 2 row 7 -->
                            <div class="flip-card2-fcast">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                    <h1 class="text-shadow mt-2 mb-0">CARNAPPING-MV (Forecasted)</h1>
                                        <div id="chartContainer14">
                                            <canvas id="crimeChart14"></canvas>
                                        </div>
                                      <script>
                                        (async function() {
                                          async function fetchData14() {
                                            const response = await fetch('fetch_fc.php'); // Path to your PHP file
                                            const jsonData = await response.json();

                                            if (jsonData.message) {
                                              console.error(jsonData.message);
                                              return { labels: [], datasets: [] };
                                            }

                                            const crimeType = 'Carnapping (Vehicle)'; // Set the crime type to filter

                                            const month = 7; // July

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

                                            // Filter the data to include only rows where the TYPE_NAME is 'Murder' and MONTH is 7 (July)
                                            const filteredData = jsonData.filter(row => row.TYPE_NAME === crimeType && row.MONTH == month);

                                            const data = {
                                              labels: ['July'], // Only July as the label
                                              datasets: [{
                                                label: crimeType, // Label for the dataset
                                                data: [], // Initialize data array for July
                                                backgroundColor: [],
                                                borderColor: [],
                                                borderWidth: 1,
                                                barThickness: 20,
                                                maxBarThickness: 20
                                              }]
                                            };

                                            filteredData.forEach(row => {
                                              const count = row.count;

                                              data.datasets[0].data.push(count);
                                              data.datasets[0].backgroundColor.push(getRandomColor());
                                              data.datasets[0].borderColor.push(getRandomColor());
                                            });

                                            console.log("Final data for the chart:", data); // Log final data for the chart

                                            return data;
                                          }

                                          function getRandomColor() {
                                            const letters = '0123456789ABCDEF';
                                            let color = '#';
                                            for (let i = 0; i < 6; i++) {
                                              color += letters[Math.floor(Math.random() * 16)];
                                            }
                                            return color;
                                          }

                                          async function drawChart14() {
                                            const data = await fetchData14();

                                            const ctx = document.getElementById('crimeChart14').getContext('2d');
                                            const crimeChart14 = new Chart(ctx, {
                                              type: 'bar', // You can change this to 'line', 'pie', etc.
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
                                                        size: 12 // Adjust font size here
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

                                          drawChart14();
                                        })();
                                      </script>

                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                </div>
                <div class = "container row2-fcast" >
                    <div class = "row"> <!--row 8 -->
                        <div class ="col"> <!-- col 1 row 8 -->
                            <div class="flip-card2-fcast">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                    <h1 class="text-shadow mt-2 mb-0">CARNAPPING-MC (Q2-2024)</h1>
                                        <div id="chartContainer15">
                                            <canvas id="crimeChart15"></canvas>
                                        </div>
                                        <script>
                                            (async function() {
                                          // Function to fetch and parse the JSON data from the PHP script
                                          async function fetchData15() {
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

                                            const crimeType = 'Carnapping (Motorcycle)'; // Specify the crime type you want to filter for

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

                                            const filteredData = jsonData.filter(row => parseInt(row.YEAR) === 2024 && [4, 5, 6].includes(parseInt(row.MONTH)) && row.TYPE_NAME === crimeType);
                                            console.log(`Filtered data (2024, months 4, 5, 6, crime type ${crimeType}):`, filteredData); // Log filtered data

                                            filteredData.forEach(row => {
                                              const month = row.MONTH;
                                              const count = row.COUNT;
                                              const monthLabel = `${monthMapping[month]}`;

                                              if (!data.labels.includes(monthLabel)) {
                                                data.labels.push(monthLabel);
                                              }

                                              data.datasets.push({
                                                label: crimeType,
                                                data: [{ x: monthLabel, y: count }],
                                                backgroundColor: getRandomColor(),
                                                borderColor: getRandomColor(),
                                                borderWidth: 1,
                                                barThickness: 18,
                                                maxBarThickness: 20
                                              });
                                            });

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
                                          async function drawChart15() {
                                            const data = await fetchData15();

                                            const ctx = document.getElementById('crimeChart15').getContext('2d');
                                            const crimeChart15 = new Chart(ctx, {
                                              type: 'bar', // You can change this to 'line', 'pie', etc.
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

                                          drawChart15();
                                        })();
                                        </script>
                                     

                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class ="col"> <!-- col 2 row 8 -->
                            <div class="flip-card2-fcast">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                    <h1 class="text-shadow mt-2 mb-0">CARNAPPING-MC (Forecasted)</h1>
                                        <div id="chartContainer16">
                                            <canvas id="crimeChart16"></canvas>
                                        </div>
                                      <script>
                                        (async function() {
                                          async function fetchData16() {
                                            const response = await fetch('fetch_fc.php'); // Path to your PHP file
                                            const jsonData = await response.json();

                                            if (jsonData.message) {
                                              console.error(jsonData.message);
                                              return { labels: [], datasets: [] };
                                            }

                                            const crimeType = 'Carnapping (Motorcycle)'; // Set the crime type to filter

                                            const month = 7; // July

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

                                            // Filter the data to include only rows where the TYPE_NAME is 'Murder' and MONTH is 7 (July)
                                            const filteredData = jsonData.filter(row => row.TYPE_NAME === crimeType && row.MONTH == month);

                                            const data = {
                                              labels: ['July'], // Only July as the label
                                              datasets: [{
                                                label: crimeType, // Label for the dataset
                                                data: [], // Initialize data array for July
                                                backgroundColor: [],
                                                borderColor: [],
                                                borderWidth: 1,
                                                barThickness: 20,
                                                maxBarThickness: 20
                                              }]
                                            };

                                            filteredData.forEach(row => {
                                              const count = row.count;

                                              data.datasets[0].data.push(count);
                                              data.datasets[0].backgroundColor.push(getRandomColor());
                                              data.datasets[0].borderColor.push(getRandomColor());
                                            });
                                            console.log("Final data for the chart:", data); // Log final data for the chart

                                            return data;
                                          }

                                          function getRandomColor() {
                                            const letters = '0123456789ABCDEF';
                                            let color = '#';
                                            for (let i = 0; i < 6; i++) {
                                              color += letters[Math.floor(Math.random() * 16)];
                                            }
                                            return color;
                                          }

                                          async function drawChart16() {
                                            const data = await fetchData16();

                                            const ctx = document.getElementById('crimeChart16').getContext('2d');
                                            const crimeChart16 = new Chart(ctx, {
                                              type: 'bar', // You can change this to 'line', 'pie', etc.
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
                                                        size: 12 // Adjust font size here
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

                                          drawChart16();
                                        })();
                                      </script>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                </div>
            </div> <!-- Right Canvas (END) -->
        </section> <!-- Main Menu Container (END) -->
    </div>
  <?php
        $mysqli = require __DIR__ . "../../../scripts/con_db.php";
  
        $action = 'view';
        $item_type = 'forecast';
        $item_id = 1;
        $details = 'The user viewed the forecasted statistics of MANILA';

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