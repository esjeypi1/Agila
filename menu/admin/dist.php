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
                            <a class="s-btn" href="crime.php"><i class='bx bxs-report'></i>Crime</a>
                            <a class="as-btn" href="dist.php"><i class='bx bx-map-alt'></i>District</a>
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
                            <svg width="350%" height="120%">
                                <defs>
                                    <style>
                                        @import url("https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i");
                                    </style>
                                </defs>
                                <text x="630px" y="150px" text-anchor="middle">District Information</text>
                            </svg>
                        </div>

                        <div class = "container">
                        <table id="table" class="table table-striped table-bordered table-hover" style="width:100%; max-height: 400px; overflow-y: auto;">      
                        <thead>
                                    <tr>
                                        <th>Area</th>
                                        <th>Description</th>
                                        <th>Population</th>
                                        <th>Area Size</th>
                                        <th>No. of Barangays</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $mysqli = require __DIR__ . "../../../scripts/con_db.php";

                                    $excluded_ids = array(0); 
                                    $excluded_ids_str = implode(',', $excluded_ids);

                                    $sql = "SELECT id_area, name, info, population, area_size, num_bar FROM area WHERE id_area NOT IN ($excluded_ids_str)";
                                    $result = mysqli_query($mysqli, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr data-id='" . $row['id_area'] . "'>";
                                            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['info']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['population']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['area_size']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['num_bar']) . "</td>";
                                            echo "<td>
                                                    <button type='button' class='btn btn-outline-primary edit-btn' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight'>Edit</button>
                                                </td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='6'>No districts found</td></tr>";
                                    }
                                    mysqli_close($mysqli);
                                    ?>
                                </tbody>
                        </table>
                        </div>
                    </div> <!-- Right Canvas (END) -->
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasRightLabel">EDIT DATA</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                <form id="editForm">
                    <input type="hidden" id="rowIndex" value="">
                    <div class="mb-2"> 
                        <label for="areaName" class="form-label text-white">Area</label>
                        <input type="text" class="form-control" id="areaName" readonly>
                    </div>
                    <div class="mb-2">
                        <label for="description" class="form-label text-white">Description</label>
                        <textarea class="form-control" id="description" rows="7"></textarea>
                    </div>
                    <div class="mb-2">
                        <label for="population" class="form-label text-white">Population</label>
                        <input type="number" class="form-control" id="population">
                    </div>
                    <div class="mb-2">
                        <label for="areaSize" class="form-label text-white">Area Size</label>
                        <input type="number" class="form-control" id="areaSize">
                    </div>
                    <div class="mb-3">
                        <label for="numBarangays" class="form-label text-white">No. of Barangays</label>
                        <input type="number" class="form-control" id="numBarangays">
                    </div>
                    <button type="button" class="btn btn-outline-success save-btn">Save</button>
                </form>
                </div>
            </div>

                    
            </section> <!-- Main Menu Container (END) -->
    </div>


    <!-- Bootstrap Javascript-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" 
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" 
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    <script type = "text/Javascript">
        $(document).ready(
        function() {
            $('#table').DataTable({
                "scrollY": "260px",
                "scrollCollapse": true,
                "paging": true,
                "lengthMenu": [4, 8, 12, 16]
            });
            //edit
                $(document).on('click', '.edit-btn', function() {
                var $row = $(this).closest('tr');
                var rowId = $row.data('id'); // Get the row ID from the data attribute
                var area = $row.find('td:eq(0)').text();
                var description = $row.find('td:eq(1)').text();
                var population = $row.find('td:eq(2)').text();
                var areaSize = $row.find('td:eq(3)').text();
                var numBarangays = $row.find('td:eq(4)').text();

                // Populate the offcanvas form fields with row data
                $('#rowIndex').val(rowId); // Store the row ID in a hidden input
                $('#areaName').val(area);
                $('#description').val(description);
                $('#population').val(population);
                $('#areaSize').val(areaSize);
                $('#numBarangays').val(numBarangays);
                // Log the view action
                $.ajax({
                    url: 'log_action.php',
                    type: 'POST',
                    data: { action: 'view', item_type: 'district', item_id: rowId, details: `The admin viewed the district: ${area}` },
                    dataType: 'json',
                    success: function(logResponse) {
                        console.log(logResponse);
                    },
                    error: function(xhr, status, error) {
                        console.error('Log Action Error:', status, error);
                    }
                });
            });
            

            //save
            $('.save-btn').on('click', function() {
            var data = {
                id: $('#rowIndex').val(), 
                areaName: $('#areaName').val(),
                description: $('#description').val(),
                population: $('#population').val(),
                areaSize: $('#areaSize').val(),
                numBarangays: $('#numBarangays').val()
            };
        
            $.ajax({
                type: 'POST',
                url: 'upd_dist.php',
                data: data,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        alert('Data saved successfully.');

                        // Update the specific row in the table
                        var rowId = $('#rowIndex').val();
                        var $row = $('#table').find('tr[data-id="' + rowId + '"]');
                        $row.find('td:eq(0)').text(data.areaName);
                        $row.find('td:eq(1)').text(data.description);
                        $row.find('td:eq(2)').text(data.population);
                        $row.find('td:eq(3)').text(data.areaSize);
                        $row.find('td:eq(4)').text(data.numBarangays);

                        // Close and reload
                        $('#offcanvasRight').offcanvas('hide');

                        // Log the save action
                        $.ajax({
                            url: 'log_action.php',
                            type: 'POST',
                            data: { action: 'save', item_type: 'district', item_id: rowId, details: `The admin updated the details of district ${data.areaName}` },
                            dataType: 'json',
                            success: function(logResponse) {
                                console.log(logResponse);
                            },
                            error: function(xhr, status, error) {
                                console.error('Log Action Error:', status, error);
                            }
                        });

                    } else {
                        alert('Failed to save data: ' + response.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('AJAX error: ' + textStatus + ', ' + errorThrown);
                    console.error('Response text: ' + jqXHR.responseText);
                    alert('Error in server communication: ' + textStatus + ' - ' + errorThrown);
                }
            });
        });

                

        });

    </script>
    
</body>
</html>