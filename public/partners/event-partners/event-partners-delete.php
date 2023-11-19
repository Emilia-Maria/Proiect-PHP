<?php
    include("../../../src/conectare.php");

    if (isset($_GET['ID']) && is_numeric($_GET['ID']))
    {
        $ID = $_GET['ID'];

        if ($stmt = $mysqli->prepare("DELETE FROM eventpartnerssponsors WHERE ID = ? LIMIT 1"))
        {
            $stmt->bind_param("i", $ID);
            $stmt->execute();
            $stmt->close();
        }
        else
        {
            echo "ERROR: Cannot execute delete.";
        }

        $mysqli->close();
        header("Location: event-partners.php?EventID=" . $_GET['EventID']);   
    }
?>