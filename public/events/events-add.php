<?php
    include("../../src/conectare.php");
    $error='';

    if (isset($_POST['submit']))
    {
        $Name = htmlentities($_POST['Name'], ENT_QUOTES);
        $Date = htmlentities($_POST['Date'], ENT_QUOTES);
        $Location = htmlentities($_POST['Location'], ENT_QUOTES);
        $Tickets = htmlentities($_POST['Tickets'], ENT_QUOTES);
        $ContactName = htmlentities($_POST['ContactName'], ENT_QUOTES);
        $ContactPhone = htmlentities($_POST['ContactPhone'], ENT_QUOTES);
        $ContactEmail = htmlentities($_POST['ContactEmail'], ENT_QUOTES);
        if ($Name == '' || $Date == '' || $Location == '' || $Tickets == '' || $ContactName == '' || $ContactPhone == '' || $ContactEmail == '')
        {
            $error = 'ERROR: Campuri goale!';
        } 
        else 
        {
            if ($stmt = $mysqli->prepare("INSERT INTO event (Name, Date, Location, Tickets, ContactName, ContactPhone, ContactEmail) VALUES (?, ?, ?, ?, ?, ?, ?)"))
            {
                $stmt->bind_param("sssisss", $Name, $Date, $Location, $Tickets, $ContactName, $ContactPhone, $ContactEmail);
                $stmt->execute();
                $stmt->close();
            }
            else
            {
                echo "ERROR: Nu se poate executa insert.";
            }
        }
        header("Location: events.php");
    }

    $mysqli->close();
?>

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
                    <a href="/build/index.html">
                        <i class="bx bxs-grid-alt"></i>
                        <span class="nav-item">Dashboard</span>
                    </a>
                    <span class="tooltip">Dashboard</span>
                </li>
                <li>
                    <a href="/build/pages/pages-front/events.html">
                        <i class="bx bx-calendar-event"></i>
                        <span class="nav-item">Events</span>
                    </a>
                    <span class="tooltip">Events</span>
                </li>
                <li>
                    <a href="/build/pages/pages-front/speakers.html">
                        <i class="bx bxs-microphone-alt"></i>
                        <span class="nav-item">Speakers</span>
                    </a>
                    <span class="tooltip">Speakers</span>
                </li>
                <li>
                    <a href="/build/pages/pages-front/partners.html">
                        <i class="bx bx-group"></i>
                        <span class="nav-item">Partners</span>
                    </a>
                    <span class="tooltip">Partners</span>
                </li>
                <li>
                    <a href="/build/pages/pages-front/sponsors.html">
                        <i class="bx bxs-wallet"></i>
                        <span class="nav-item">Sponsors</span>
                    </a>
                    <span class="tooltip">Sponsors</span>
                </li>
                <li>
                    <a href="/build/pages/pages-front/users.html">
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
            <p><span class="container-path-pages">Pages /</span> Add event</p>
        </div>
        <div class="container-main">
            <a href="events.php" class="back-button">
                <i class="fa-solid fa-arrow-left-long"></i>
                <h4>Back</h4>
            </a>
            <div class="form-wrapper">
                <header class="form-header">
                    <h3>Add new event</h3>
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
                            <label>Event name</label>
                                <input type="text" name="Name" placeholder="Type event name" required>
                            <label>Event date</label>
                                    <input type="date" name="Date" placeholder="Type event date" required>
                            <label>Event location</label>
                                <input type="text" name="Location" placeholder="Type event location" required>
                            <label>NO tickets</label>
                                <input type="number" name="Tickets" placeholder="Type number of tickets" required>
                            <label>Contact name</label>
                                <input type="text" name="ContactName" placeholder="Type contact name" required>
                            <label>Contact phone</label>
                                    <input type="tel" name="ContactPhone" placeholder="Type contact phone" required>
                            <label>Contact email</label>
                                <input type="email" name="ContactEmail" placeholder="Type contact email" required>
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