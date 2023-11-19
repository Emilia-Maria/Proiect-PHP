<?php
    include("../../src/conectare.php");
    $error='';

    if (!empty($_GET['EventID']))
    { 
        if (isset($_POST['submit']))
        {
            if (is_numeric($_GET['EventID']))
            {
                $EventID = $_GET['EventID'];
                $StartTime = htmlentities($_POST['StartTime'], ENT_QUOTES);
                $EndTime = htmlentities($_POST['EndTime'], ENT_QUOTES);
                $ActivityDetails = htmlentities($_POST['ActivityDetails'], ENT_QUOTES);
                $SpeakerID = htmlentities($_POST['SpeakerID'], ENT_QUOTES);
                if ($EventID == '' || $StartTime == '' || $EndTime == '' || $ActivityDetails == '' || $SpeakerID == '')
                {
                    $error = 'ERROR: Campuri goale!';
                } 
                else 
                {
                    if ($stmt = $mysqli->prepare("INSERT INTO agenda (EventID, StartTime, EndTime, ActivityDetails, SpeakerID) VALUES (?, ?, ?, ?, ?)"))
                    {
                        $stmt->bind_param("isssi", $EventID, $StartTime, $EndTime, $ActivityDetails, $SpeakerID);
                        $stmt->execute();
                        $stmt->close();
                        header("Location: agenda.php?EventID=" . $EventID);
                    }
                    else
                    {
                        echo "ERROR: Nu se poate executa insert.";
                    }
                }
            }
            else
            {
                echo "id incorect!";
            }
             
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda add</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/pages.css">
    <link rel="stylesheet" href="../../assets/css/medias.css">
    <link rel="stylesheet" href="../../assets/css/add-pages.css">   
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
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
            <p><span class="container-path-pages">Pages /</span> Add agenda</p>
        </div>
        <div class="container-main">
            <?php
                echo "<a href='agenda.php?EventID=" . $_GET['EventID'] . "' class='back-button'>";
                echo "<i class='fa-solid fa-arrow-left-long'></i>";
                echo "<h4>Back</h4>";
                echo "</a>";
            ?>
            <div class="form-wrapper">
                <header class="form-header">
                    <h3>Add new agenda</h3>
                    <button class="add-button" type="submit" name="submit" form="myForm">
                        Save
                    </button>
                </header>
                <div class="form-body">
                    <?php 
                        if ($error != '') 
                        {
                            echo "<div style='padding:4px; border:1px solid red; color:red'>" . $error . "</div>";
                        } 
                    ?>
                    <form id="myForm" class="form" action="" method="POST">
                            <div class="event-information label">
                                <label>Start time</label>
                                    <input type="time" name="StartTime" placeholder="Select start time" required>
                                <label>End time</label>
                                    <input type="time" name="EndTime" placeholder="Select end time" required>
                                <label>Activity details</label>
                                    <input type="text" name="ActivityDetails" placeholder="Type activity details" required>
                                <label>Speaker</label>
                                    <?php
                                        include("../../src/conectare.php");
                                        include("../../src/fetch-speakers.php");
                                    ?>
                                    <select name="SpeakerID">
                                        <option disabled selected>Select speaker</option>
                                        <?php 
                                        foreach ($options as $option) 
                                        {
                                            
                                            echo "<option value='" . $option['ID'] . "'>" . $option['Name'] . "</option>";
                                            
                                        }
                                        ?>
                                    </select>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../../assets/js/script.js"></script>
    <script src="https://kit.fontawesome.com/869245934a.js" crossorigin="anonymous"></script>
</body>
</html>