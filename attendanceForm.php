<?php
include_once("config.php");

$sql = "SELECT * FROM event_details";
$result = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Event Management System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


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
    </header>

    <div class="container">
        <nav class="topnav">
            <a href="searchEvent.php">Search</a>
            <a href="attendanceForm.php">Attendance</a>
            <a href="eventComments.php">Comments</a>
        </nav>

        <main>
            <!--image icon-->
            <div class="row">

                <div class="col-right">
                    <!--Reservation Form-->
                    <h2>Event Attendance Form</h2>
                    <div class="profil">
                        <form action="<?php echo BASE_URL; ?>attendanceProcess.php" method="post">
                            <!-- Select Event -->
                            <p>
                                <span>Select Event:</span>
                                <select name="eventID" required>
                                    <option value="">- Please Select -</option>
                                    <?php
                                    // Check if the result has rows and display events
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<option value="' . htmlspecialchars($row['eventID']) . '">' . htmlspecialchars($row['eventName']) . '</option>';
                                        }
                                    } else {
                                        echo '<option value="">No events available</option>';
                                    }
                                    ?>
                                </select>
                            </p>

                            <!--Event Name-->
                            <p><span>Matric Number:</span><input type="text" name="matricNum" id="matricNum" required>
                            </p>
                            <!--Event Date-->
                            <p><span>Attendance Date:</span><input type="date" name="date" id="date" required></p>

                            <!-- Attendance Status -->
                            <p>
                                <span>Attendance Status:</span>
                                <select name="status" id="status" required>
                                    <option value="" disabled selected>- Please Select -</option>
                                    <option value="1">Present</option>
                                    <option value="0">Absent</option>
                                </select>
                            </p>
                            <br>
                            <div class="spanButton">
                                <span><input type="submit" value="Submit Attendance"> </span>
                                <span><input type="reset" value="Reset"> </span>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
    </div>
    <!--Footer-->
    <footer class="foot">
        <p><small><i>Copyright &copy; 2024 FCI</i></small></p>
    </footer>
    </main>

</body>

</html>