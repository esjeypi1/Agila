<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  
  <!-- data table link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
        
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
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script defer src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

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
                <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav> <!-- Navbar (END) -->

        <section class="hero-section"> <!-- Main Menu Container (START) -->

            <div class="left-menu"> <!-- Side Menu (START) -->

                <div class="side-btns">
                    <a class="as-btn" href="hist.php"><i class='bx bx-book-content'></i>Contents</a>
                    <a class="s-btn" href="user.php"><i class='bx bx-user'></i>User</a>
                    <a class="s-btn" href="crime.php"><i class='bx bxs-report'></i>Crime</a>
                    <a class="s-btn" href="dist.php"><i class='bx bx-map-alt'></i>District</a>
                    <a class="s-btn" href="audit.php"><i class='bx bx-history'></i>Audit Log</a>
                  	<a class="s-btn" href="ps.php"><span class="material-symbols-outlined">local_police</span>Stations</a>
                </div>
                <div class="sidenav-footer">
                    <div class="text-center ps-3">Logged In as:
                        <?php
                        // Check if admin is logged in
                        if (isset($_SESSION['name'])) {
                            // Display the admin's name
                            echo "<p class='text-start mb-2 fs-6'>" . $_SESSION['name'] . "</p>";
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
                    <svg width="300%" height="120%">
                        <defs>
                            <style>
                                @import url("https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i");
                            </style>
                        </defs>
                        <text x="74%" y="90%" text-anchor="middle">Contents</text>
                    </svg>
                </div>

                <div class="container_add">
                    <button class="button">
                        <span class="button-content add-new">Add New</span>
                    </button>
                </div>

                <div class="container-lg">
                    <div class="table-responsive">
                        <table id="table" class="table table-striped table-bordered table-hover" style="width:102%;">
                            <thead>
                                <tr>
                                    <th class="header-color">ID</th>
                                    <th class="header-color">Crime Type</th>
                                    <th class="header-color">Category</th>
                                    <th class="header-color">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $mysqli = require __DIR__ . "../../../scripts/con_db.php";

                                $sql = "SELECT id_type, name, categ, is_hidden FROM category";
                                $result = $mysqli->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $row_class = $row["is_hidden"] ? "greyed-out" : "";
                                        echo "<tr class='$row_class'>";
                                        echo "<td>" . $row["id_type"] . "</td>";
                                        echo "<td>" . $row["name"] . "</td>";
                                        echo "<td>" . $row["categ"] . "</td>";
                                        echo "<td>
                                                <button class='btn btn-outline-danger delete' title='Delete' data-toggle='tooltip'><i class='material-icons'>visibility_off</i></button>";
                                        if ($row["is_hidden"]) {
                                            echo "<button class='btn btn-outline-primary restore' title='Restore' data-toggle='tooltip'><i class='material-icons'>&#xE863;</i></button>";
                                        }
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>0 results</td></tr>";
                                }
                                $mysqli->close();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- Right Canvas (END) -->
        </section> <!-- Main Menu Container (END) -->
    </div>
    <!-- Initialize DataTables -->
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#table').DataTable({
                "scrollY": "320px",
                "scrollX": false,
                "scrollCollapse": true,
                "paging": false,
                "lengthChange": false
            });
            // Apply greyed-out style to rows with the class 'greyed-out'
            $('.greyed-out').css('background-color', 'grey').find('button').not('.restore').prop('disabled', true);

            // Delete row on button click
            $('#table tbody').on('click', '.delete', function() {
                if (confirm('Are you sure you want to hide this row?')) {
                    var $row = $(this).closest('tr');
                    var rowId = table.row($row).data()[0]; // Get the ID of the row

                    // AJAX request to delete the row from the database
                    $.ajax({
                        url: 'delete_hist.php', // URL to the PHP script
                        type: 'POST',
                        data: {
                            id_type: rowId
                        },
                        dataType: 'json',
                        success: function(response) {
                            console.log(response); // Log the response for debugging
                            if (response.status == 'success') {
                                // Grey out the row and disable the buttons
                                $row.css('background-color', 'grey');
                                $row.find('button').prop('disabled', true);
                                $row.addClass('greyed-out');

                                // Add a restore button
                                if ($row.find('.restore').length === 0) {
                                    $row.find('td:last').append('<button class="btn btn-outline-primary restore" title="Restore" data-toggle="tooltip"><i class="material-icons">&#xE863;</i></button>');
                                }

                                // Log the action
                                $.ajax({
                                    url: 'log_action.php',
                                    type: 'POST',
                                    data: {
                                        action: 'hide',
                                        item_type: 'crime',
                                        item_id: rowId,
                                        details: `Admin hidden the crime ID: ${rowId}`
                                    },
                                    dataType: 'json',
                                    success: function(logResponse) {
                                        console.log(logResponse);
                                    },
                                    error: function(xhr, status, error) {
                                        console.error('Log Action Error:', status, error);
                                    }
                                });

                            } else {
                                alert('Failed to delete the row: ' + response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error:', status, error); // Log AJAX errors
                            alert('Error while deleting the row.');
                        }
                    });
                }
            });
            // Restore row on button click
            $('#table tbody').on('click', '.restore', function() {
                var $row = $(this).closest('tr');
                var rowId = table.row($row).data()[0]; // Get the ID of the row

                // AJAX request to update the row status in the database
                $.ajax({
                    url: 'restore_hist.php', // URL to the PHP script
                    type: 'POST',
                    data: {
                        id_type: rowId
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response); // Log the response for debugging
                        if (response.status == 'success') {
                            // Restore the row and enable the buttons
                            $row.css('background-color', '');
                            $row.find('button').prop('disabled', false);
                            $row.removeClass('greyed-out');
                            $row.find('.restore').remove();

                            // Log the action
                            $.ajax({
                                url: 'log_action.php',
                                type: 'POST',
                                data: {
                                    action: 'restore',
                                    item_type: 'crime',
                                    item_id: rowId,
                                    details: `Admin restored the crime ID: ${rowId}`
                                },
                                dataType: 'json',
                                success: function(logResponse) {
                                    console.log(logResponse);
                                },
                                error: function(xhr, status, error) {
                                    console.error('Log Action Error:', status, error);
                                }
                            });

                        } else {
                            alert('Failed to restore the row: ' + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', status, error); // Log AJAX errors
                        alert('Error while restoring the row.');
                    }
                });
            });

            // Add new row
            $('.add-new').on('click', function() {
                table.row.add(['', '<input type="text" value=""/>', '<input type="text" value=""/>', '<button class="btn btn-outline-success save-new" title="Save" data-toggle="tooltip"><i class="material-icons">&#xE161;</i></button>']).draw();
            });

            // Save new row on button click
            $('#table tbody').on('click', '.save-new', function() {
                var $row = $(this).closest('tr');
                var $cols = $row.find('td');

                // Get new values
                var newCrimeType = $cols.eq(1).find('input').val();
                var newCategory = $cols.eq(2).find('input').val();

                // AJAX request to save the new row in the database
                $.ajax({
                    url: 'upd_hist.php', // URL to the PHP script
                    type: 'POST',
                    data: {
                        crime_type: newCrimeType,
                        categ: newCategory
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        if (response.status == 'success') {
                            var newId = response.id;
                            // Update table data
                            table.row($row).data([newId, newCrimeType, newCategory, '<button class="btn btn-outline-success save-new" title="Save" data-toggle="tooltip"><i class="material-icons">&#xE161;</i></button>']).draw();

                            $.ajax({
                                url: 'log_action.php',
                                type: 'POST',
                                data: {
                                    action: 'add',
                                    item_type: 'crime',
                                    item_id: newId,
                                    details: `Admin added new crime type: ${newCrimeType}, category: ${newCategory}`
                                },
                                dataType: 'json',
                                success: function(logResponse) {
                                    console.log(logResponse);
                                },
                                error: function(xhr, status, error) {
                                    console.error('Log Action Error:', status, error);
                                }
                            });
                        } else {
                            alert('Failed to add the row: ' + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', status, error); // Log AJAX errors
                        alert('Error while adding the row.');
                    }
                });
            });

        });
    </script>
</body>

</html>