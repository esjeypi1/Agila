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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- data table link -->
    <link rel="stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href = "https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">

    <script src="http://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdn.datatables.net/2.0.8/js/jquery.dataTables.min.js"></script>  

    <!-- Google Fonts/Logo -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../../styles/navbar_main.css"> <!-- Top Menu -->
    <link rel="stylesheet" href="../../styles/container_admin.css"> <!-- Side Menu -->
    <link rel="icon" sizes="192x192" href="../../images/logo_agila.png">


    <title>AGILA</title>

    <!-- data table script -->
    <script defer src = "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script defer src = "https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script defer src = "https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>

  </head>
  <body>
    <div class="pwet">
      <nav class="navbar navbar-expand-lg"> <!-- Navbar (START) -->
        <div class="container-fluid">
          <a class="navbar-brand me-auto" href="index2.php"><img src="../../images/logo-full_agila.png" class="logo"></a>
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
                  <a class="nav-link mx-lg-2" href="profile.php">Account</a>
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

          <div class="side-btns">
            <a class="s-btn" href="hist.php"><i class='bx bx-book-content'></i>Contents</a>
            <a class="s-btn" href="user.php"><i class='bx bx-user' ></i>User</a>
            <a class="as-btn" href="crime.php"><i class='bx bxs-report'></i>Crime</a>
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

          <div class="h-btn">
            <a type="button" class="btn btn-primary" href="index2.php"><span class="h-btn-logo material-symbols-outlined">arrow_back_ios_new</span></a>
          </div>
        </div> <!-- Side Menu (END) -->

        <div class="right-menu"> <!-- Right Canvas (START) -->
          <div class="patterns">
            <svg width="360%" height="120%">
              <defs>
                <style>
                  @import url("https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i");
                </style>
              </defs>
              <text x="640px" y="120px" text-anchor="middle">Crime Incident Reports</text>
            </svg>
          </div>


          <div class="container_add1" id = "crimeButton">
            <button class="button">
              <span class="button-content">Add New</span>
            </button>
          </div>
          <!-- Add New User Modal -->
          <div class="modal fade" id="crimeModal" tabindex="-1" aria-labelledby="crimeaddUserModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="crimeModalLabel" style = "color: #000000;">Add Crime Report</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form id="crimeForm" method= "POST">
                    <div class="mb-3" style = "color: #000000;">
                      <label for="barangay ID" class="form-label">Barangay ID</label>
                      <input type="text" class="form-control" id="barangay" name="barangay" required>
                    </div>
                    <div class="mb-3" style = "color: #000000;">
                      <label for="latitude" class="form-label">Latitude</label>
                      <input type="number" step="0.00000001" class="form-control" id="longitude" name="latitude" required>
                    </div>
                    <div class="mb-3" style = "color: #000000;">
                      <label for="longitude" class="form-label">Longitude</label>
                      <input type="number" step="0.00000001" class="form-control" id="longitude" name="longitude" required>
                    </div>
                    <div class="mb-3" style="color: #000000;">
                      <label for="date" class="form-label">Date</label>
                      <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="mb-3" style="color: #000000;">
                      <label for="time" class="form-label">Time</label>
                      <input type="time" class="form-control" id="time" name="time" required>
                    </div>
                    
                    <div class="mb-3" style="color: #000000;">
                      <label for="name" class="form-label">Crime Type</label>
                        <ul id = "name">
                          <?php
                          $mysqli = require __DIR__ . "/../../scripts/con_db.php";

                          $cat = "SELECT name FROM category";
                          $result = $mysqli->query($cat);

                          if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                              $name = htmlspecialchars($row['name']);
                              echo '<li>
                                  <div class="form-check">
                                      <input class="form-check-input" type="radio" name="category" id="flexRadio' . $name . '" value="' . $name . '">
                                      <label class="form-check-label" for="flexRadio' . $name . '">
                                          ' . $name . '
                                      </label>
                                  </div>
                                </li>';
                            }
                          } else {
                            echo '<li><a class="dropdown-item">No categories found.</a></li>';
                          }

                          $mysqli->close();
                          ?>
                      </ul>
                    </div>

                    <button type="submit" class="btn btn-secondary">Save</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class = "container">
            <table id="table" class="table table-striped table-bordered table-hover" style="width:100%; max-height: 400px; overflow-y: auto;">
              <thead>
                <tr>
                  <th scope="col">ID_BARANGAY</th>
                  <th scope="col">LAT</th>
                  <th scope="col">LNG</th>
                  <th scope="col">DATE</th>
                  <th scope="col">TIME</th>
                  <th scope="col">ID_TYPE</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $mysqli = require __DIR__ . "../../../scripts/con_db.php";

                $sql = "
                    SELECT 
                        crime_data.id_crime, 
                        crime_data.id_barangay, 
                        crime_data.lat, 
                        crime_data.lng, 
                        crime_data.date, 
                        crime_data.time, 
                        category.name AS type_name
                    FROM 
                        crime_data
                    JOIN 
                        category ON crime_data.id_type = category.id_type
                ";

                $result = $mysqli->query($sql);

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id_barangay']}</td>";
                    echo "<td>{$row['lat']}</td>";
                    echo "<td>{$row['lng']}</td>";
                    echo "<td>{$row['date']}</td>";
                    echo "<td>{$row['time']}</td>";
                    echo "<td>{$row['type_name']}</td>";
                    echo "</tr>";
                  }
                } else {
                  echo "<tr><td colspan='12'>0 results</td></tr>";
                }

                $mysqli->close();
                ?>
              </tbody>
            </table>

          </div>

        </div> <!-- Right Canvas (END) -->

      </section> <!-- Main Menu Container (END) -->



      <!-- Bootstrap Javascript-->
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" 
              integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" 
              integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    </div>

    <script type = "text/javascript">
      $(document).ready(
        function() {
          var table = $('#table').DataTable({
            "scrollY": "315px",
            "scrollCollapse": true,
            "paging": true,
            "lengthMenu": [8, 16, 24, 32, { label: 'All', value: -1 }]
          });

          // Show the modal when the "Add New" button is clicked
          $('#crimeButton .button').on('click', function() {
            $('#crimeModal').modal('show');
          });

          $('#crimeForm').on('submit', function(event) {
            event.preventDefault();

            var formData = new FormData(this);

            $.ajax({
              url: 'save_crime.php',
              type: 'POST',
              data: formData,
              contentType: false, // Required for FormData
              processData: false, // Required for FormData
              dataType: 'json',
              success: function(response) {
                console.log(response);
                if (response.status === 'success') {
                  $('#crimeModal').modal('hide');
                  location.reload(); // Refresh the page to see the new user in the table
                } else {
                  alert('Failed to add the crime: ' + response.message);
                }
              },
              error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
                console.log(xhr.responseText); // Log the actual response for debugging
                alert('Error while adding the crime.');
              }
            });
          });
        });
    </script>

  </body>
</html>