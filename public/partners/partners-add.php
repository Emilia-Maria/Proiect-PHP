<?php
    include("../../src/add/partners-add.php");
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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
                    <a href="../index.php">
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
            <p><span class="container-path-pages">Pages /</span> Add partner</p>
        </div>
        <div class="container-main">
            <a href="partners.php" class="back-button">
                <i class="fa-solid fa-arrow-left-long"></i>
                <h4>Back</h4>
            </a>
            <div class="form-wrapper">
                <header class="form-header">
                    <h3>Add new partner</h3>
                    <button class="add-button">
                        <a href="/build/pages/pages-add/events-add.html">
                            Save partner
                        </a>
                    </button>
                </header>
                <div class="form-body">
                    <!-- Event information form -->
                    <form class="form" action="#">
                        <div class="event-information">
                            <label>Event name</label>
                            <input type="text">
                            <label>Event location</label>
                            <input type="text">
                            <label>Event date</label>
                            <input type="date">
                            <label>NO tickets</label>
                            <input type="number">
                            <label>Contact name</label>
                            <input type="text">
                            <label>Contact email</label>
                            <input type="email">
                            <label>Contact number</label>
                            <input type="tel">
                        </div>
                        <div class="event-agenda">
                            <label>Start time</label>
                            <input type="time">
                            <label>End time</label>
                            <input type="time">
                            <label>Activity details</label>
                            <input type="text">
                            <label>Speaker</label>
                            <select>
                                <option>1</option>
                                <option>2</option>
                            </select>
                        </div>
                    </form>
                </div>
        </div>
    </div>
    <script src="../../assets/js/script.js"></script>
    <script src="https://kit.fontawesome.com/869245934a.js" crossorigin="anonymous"></script>
</body>
</html>