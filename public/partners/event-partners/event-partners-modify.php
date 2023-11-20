<?php
    session_start();
    if (!isset($_SESSION['loggedin'])) 
    {
        header('Location: ../../error.html');
    }
?>

<?php
    include("../../../src/conectare.php");
    $error='';

    if (!empty($_POST['ID']))
    { 
        if (isset($_POST['submit']))
        {
            if (is_numeric($_POST['ID']))
            {
                $ID = $_POST['ID'];
                $EventID = $_GET['EventID'];
                $PartnerSponsorID = htmlentities($_POST['PartnerSponsorID'], ENT_QUOTES);
                if ($EventID == '' || $PartnerSponsorID == '')
                {
                    $error = 'ERROR: Campuri goale!';
                } 
                else
                {
                    if ($stmt = $mysqli->prepare("UPDATE eventpartnerssponsors SET PartnerSponsorID = ? WHERE ID='" . $ID . "'"))
                    {
                        $stmt->bind_param("i", $PartnerSponsorID);
                        $stmt->execute();
                        $stmt->close();
                        header("Location: event-partners.php?EventID=" . $_GET['EventID']);  
                    }
                    else
                    {
                        echo "ERROR: nu se poate executa update.";
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
    <title>Event partner modify</title>
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/css/pages.css">
    <link rel="stylesheet" href="../../../assets/css/medias.css">
    <link rel="stylesheet" href="../../../assets/css/add-pages.css">
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
                    <a href="../../index.php">
                        <i class="bx bxs-grid-alt"></i>
                        <span class="nav-item">Dashboard</span>
                    </a>
                    <span class="tooltip">Dashboard</span>
                </li>
                <li>
                    <a href="../../events/events.php">
                        <i class="bx bx-calendar-event"></i>
                        <span class="nav-item">Events</span>
                    </a>
                    <span class="tooltip">Events</span>
                </li>
                <li>
                    <a href="../../speakers/speakers.php">
                        <i class="bx bxs-microphone-alt"></i>
                        <span class="nav-item">Speakers</span>
                    </a>
                    <span class="tooltip">Speakers</span>
                </li>
                <li>
                    <a href="../partners.php">
                        <i class="bx bx-group"></i>
                        <span class="nav-item">Partners</span>
                    </a>
                    <span class="tooltip">Partners</span>
                </li>
                <li>
                    <a href="../../sponsors/sponsors.php">
                        <i class="bx bxs-wallet"></i>
                        <span class="nav-item">Sponsors</span>
                    </a>
                    <span class="tooltip">Sponsors</span>
                </li>
                <li>
                    <a href="../../users/users.php">
                        <i class='bx bx-user'></i>
                        <span class="nav-item">Users</span>
                    </a>
                    <span class="tooltip">Users</span>
                </li>
            </ul>
            <div class="admin">
                <a href="../../../src/logout.php">
                    <p class="nav-item admin-name"><?=$_SESSION['name']?></p>
                    <i class='bx bx-log-out'></i>
                </a>
            </div>
        </div>
    </nav>
    
    <div class="main-content">
        <div class="container-path">
            <p><span class="container-path-pages">Pages /</span> Modify event partner</p>
        </div>
        <div class="container-main">
            <?php
                echo "<a href='event-partners.php?EventID=" . $_GET['EventID'] . "' class='back-button'>";
                echo "<i class='fa-solid fa-arrow-left-long'></i>";
                echo "<h4>Back</h4>";
                echo "</a>";
            ?>
            <div class="form-wrapper">
                <header class="form-header">
                    <h3>Modify event partner</h3>
                    <button class="add-button" type="submit" name="submit" form="myForm">
                        Save
                    </button>
                </header>
                <div class="form-body">
                    <?php 
                        if ($error != '') 
                        {
                            echo "<div style='padding:4px; border:1px solid red; color:red'>" . $error."</div>";
                        } 
                    ?>
                    <form id="myForm" class="form" action="" method="POST">
                        <?php 
                            if ($_GET['ID'] != '') 
                            { 
                                ?>
                                <input type="hidden" name="ID" value="<?php echo $_GET['ID'];?>" />
                                <?php
                                    if ($result = $mysqli->query("SELECT * FROM eventpartnerssponsors where ID = '" . $_GET['ID'] . "'"))
                                    {
                                        if ($result->num_rows > 0)
                                        { 
                                            $row = $result->fetch_object();
                                            ?>
                                                <div class="event-information label">
                                                    <label>Partner</label>
                                                        <?php
                                                            include("../../../src/conectare.php");
                                                            include("../../../src/fetch-partners.php");
                                                        ?>
                                                        <select name="PartnerSponsorID">
                                                            <option disabled selected>Select partner</option>
                                                            <?php 
                                                                foreach ($options as $option) 
                                                                {
                                                                    
                                                                    echo "<option value='" . $option['ID'] . "'>" . $option['Name'] . "</option>";
                                                                    
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                <?php
                                        }
                                    }
                                }
                                ?>
                    </form>
                </div>
        </div>
    </div>
    <script src="../../../assets/js/script.js"></script>
    <script src="https://kit.fontawesome.com/869245934a.js" crossorigin="anonymous"></script>
</body>
</html>