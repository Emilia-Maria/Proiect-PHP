<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event dashboard</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/pages.css">
    <link rel="stylesheet" href="../../assets/css/medias.css">
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" >
</head>
<body>
    <nav class="sidebar">
        <div class="top">
            <div class="logo">
                
            </div>
            <!-- Side nav button -->
            <i class="bx bx-menu" id="btn"></i>
        </div>
        <div class="bottom">
            <ul class="nav-list">
                <li>
                    <a href="../index.html">
                        <i class="bx bxs-grid-alt"></i>
                        <span class="nav-item">Dashboard</span>
                    </a>
                    <span class="tooltip">Dashboard</span>
                </li>
                <li>
                    <a href="events.php">
                        <i class="bx bx-calendar-event"></i>
                        <span class="nav-item">Events</span>
                    </a>
                    <span class="tooltip">Events</span>
                </li>
                <li>
                    <a href="../speakers/speakers.php">
                        <i class="bx bxs-microphone-alt"></i>
                        <span class="nav-item">Speakers</span>
                    </a>
                    <span class="tooltip">Speakers</span>
                </li>
                <li>
                    <a href="../partners/partners.php">
                        <i class="bx bx-group"></i>
                        <span class="nav-item">Partners</span>
                    </a>
                    <span class="tooltip">Partners</span>
                </li>
                <li>
                    <a href="../sponsors/sponsors.php">
                        <i class="bx bxs-wallet"></i>
                        <span class="nav-item">Sponsors</span>
                    </a>
                    <span class="tooltip">Sponsors</span>
                </li>
                <li>
                    <a href="../users/users.php">
                        <i class='bx bx-user'></i>
                        <span class="nav-item">Users</span>
                    </a>
                    <span class="tooltip">Users</span>
                </li>
            </ul>
            <div class="admin">
                <a href="#">
                    <p class="nav-item admin-name">Admin name</p>
                    <i class='bx bx-log-out'></i>
                </a>
            </div>
        </div>
    </nav>
    
    <div class="main-content">
        <div class="container-path">
            <p><span class="container-path-pages">Pages /</span> Events</p>
        </div>
        <div class="container-main">
            <div class="table-wrapper">
                <div class="table-header">
                    <h3 class="event-title">Event details</h3>
                    <button class="add-button">
                    <a href="events-add.html">
                            Add event
                        </a>
                    </button>
                </div>
                <div>
                    <?php
                        include("../../src/conectare.php");
                        
                        if($result = $mysqli->query("SELECT * FROM event ORDER BY id"))
                        {
                            
                            if($result->num_rows > 0)
                            {
                                echo "<table>";
                                echo 
                                "
                                    <thead>
                                        <tr>
                                            <th>ID No</th>
                                            <th>Event name</th>
                                            <th>Date</th>
                                            <th>Location</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                ";

                                while($row = $result->fetch_object())
                                {
                                    echo "<tbody>";
                                        echo "<tr>";
                                            echo "<td>" . $row->ID . "</td>";
                                            echo "<td>" . $row->Name . "</td>";
                                            echo "<td>" . $row->Date . "</td>";
                                            echo "<td>" . $row->Location . "</td>";
                                            echo "<td>";
                                                    echo "<i class='fa-solid fa-ellipsis dropdown-button' onclick='toggleDropdown(this)'></i>";
                                                        echo "<div class='dropdown'>";
                                                            echo "<a href=#" . $row->ID . ">Modify</a>";   
                                                            echo "<a href='events-delete.php?ID=" . $row->ID . "'>Delete</a>";
                                                        echo "</div>";
                                            echo "</td>";
                                        echo "</tr>";
                                    echo "</tbody>";
                                }

                                echo "</table>";
                            }
                            else 
                            {
                                echo "There are no records in the table.";
                            }
                        }
                        else 
                        {
                            echo "Error " . $mysqli->error();
                        }

                        $mysqli->close();
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="../../assets/js/script.js"></script>
    <script src="https://kit.fontawesome.com/869245934a.js" crossorigin="anonymous"></script>
</body>
</html>