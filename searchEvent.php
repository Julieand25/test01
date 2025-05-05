<?php
session_start();
include_once("config.php");

$search_text="";
if (!empty($_POST["search_text"])) {
    $search_text = trim($_POST["search_text"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Event Management System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">

<body>
    <header>
        <h1>Event Management System</h1>
    </header>

    <h1>Search Event</h1>
    <div style="position: relative; display: inline-block;">
        <form action="<?php echo BASE_URL; ?>searchEvent.php" method="post">
            <input type="search_text" placeholder="search_text" name="search_text" size="55" required id="searchInput">
            <button type="submit" style="padding: 1px 6px; font-size: 13px;">Submit</button>
        </form>
    </div>

    <div class="container">
    <nav class="topnav">
            <a href="searchEvent.php">Search</a>
            <a href="attendanceForm.php">Attendance</a>
            <a href="eventComments.php">Comments</a>
        </nav>

        <main>
            <?php
            if (!empty($_POST["search_text"])) {
                $search_text = trim($_POST["search_text"]);
            }
            $keywords = explode(" ", $search_text);

            $search_conditions = [];
            $count = 0;
            foreach ($keywords as $keyword) {
                if (!empty($keyword)) {
                    $search_conditions[] = "eventName LIKE '%" . mysqli_real_escape_string($conn, $keyword) . "%'";
                    $count++;
                }
            }
            if (!empty($search_conditions)) {
            $sql = "SELECT * FROM event_details WHERE " . implode(" OR ", $search_conditions);
            $result = mysqli_query($conn, $sql);
            //echo '<p>Search result for <span style="font-weight:bold;">' . $search_text . '</span></p>';
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div>';
                    echo $row['eventName'] . '';
                    echo '</div>';
                }
            } else {
                echo '<p>Sorry, no result for ' . htmlspecialchars($search_text);
            }
        }
            ?>

            <!--Footer-->
            <footer>
                <p><small>Copyright (c) 2024 FCI</small></p>
            </footer>
        </main>


</body>

</html>