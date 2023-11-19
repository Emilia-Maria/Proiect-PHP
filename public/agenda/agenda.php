<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event dashboard</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/pages.css">
    <link rel="stylesheet" href="../../assets/css/medias.css">
    <link rel="stylesheet" href="../../assets/css/add-pages.css">
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
                    <a href="../events/events.php">
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
            <p><span class="container-path-pages">Pages /</span> Agenda</p>
        </div>
        <div class="container-main">
            <a href="../events/events.php" class="back-button">
                <i class="fa-solid fa-arrow-left-long"></i>
                <h4>Back</h4>
            </a>
            <div class="table-wrapper">
                <div class="table-header">
                    <h3 class="event-title">Agenda details</h3>
                    <button class="add-button">
                        <?php
                        echo "<a href='agenda-add.php?EventID=" . $_GET['EventID'] . "'>";
                        echo    "Create new";
                        echo "</a>";
                        ?>
                    </button>
                </div>
                <div>
                    <?php
                        include("../../src/conectare.php");
                        
                        if($result = $mysqli->query("SELECT agenda.*, speakers.Name as speaker_name FROM agenda
                        INNER JOIN speakers ON agenda.SpeakerID = speakers.ID
                        WHERE agenda.EventID = " . $_GET['EventID'] . " ORDER BY ID"))
                        {
                            
                            if($result->num_rows > 0)
                            {
                                echo "<table>";
                                echo 
                                "
                                    <thead>
                                        <tr>
                                            <th>Start time</th>
                                            <th>End time</th>
                                            <th>Activity details</th>
                                            <th>Speaker</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                ";

                                while($row = $result->fetch_object())
                                {
                                    echo "<tbody>";
                                        echo "<tr>";
                                            echo "<td>" . $row->StartTime . "</td>";
                                            echo "<td>" . $row->EndTime . "</td>";
                                            echo "<td>" . $row->ActivityDetails . "</td>";
                                            echo "<td>" . $row->speaker_name . "</td>";
                                            echo "<td>";
                                                    echo "<i class='fa-solid fa-ellipsis dropdown-button' onclick='toggleDropdown(this)'></i>";
                                                        echo "<div class='dropdown'>";
                                                            echo "<a href='agenda-modify.php?ID=" . $row->ID . "&EventID=" . $_GET['EventID'] . "'>Modify</a>"; 
                                                            echo "<a href='agenda-delete.php?ID=" . $row->ID . "&EventID=" . $_GET['EventID'] . "'>Delete</a>";
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