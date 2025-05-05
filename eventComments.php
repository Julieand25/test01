<?php
$eventComments = [
    ["matricNum" => "BI123", "eventName" => "Mesra Madani", "rating" => 5, "comment" => "Very insightful event!"],
    ["matricNum" => "BI456", "eventName" => "Karnival Rakyat Sihat", "rating" => 4, "comment" => "Amazing experience, learned a lot!"],
    ["matricNum" => "BI789", "eventName" => "Mesra Madani", "rating" => 3, "comment" => "Great speakers and sessions."],
    ["matricNum" => "BI321", "eventName" => "Karnival Rakyat Sabah", "rating" => 4, "comment" => "Hands-on learning was excellent."],
    ["matricNum" => "BI654", "eventName" => "Karnival Rakyat Sihat", "rating" => 5, "comment" => "Challenging but rewarding!"],
];

// Group comments by event
$eventGroup = [];
foreach ($eventComments as $comment) {
    $eventGroup[$comment['eventName']][] = $comment;
}

// HTML structure for output
echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Event Management System - Event Reviews</title>
</head>
<body>
    <header>
        <h1>Event Reviews</h1>
    </header>";

foreach ($eventGroup as $eventName => $comments) {
    $totalRating = 0;
    $eventSpecificComments = [];

    foreach ($comments as $comment) {
        $eventSpecificComments[] = $comment["matricNum"] . " - " . $comment["comment"];
        $totalRating += $comment["rating"];
    }

    $averageRating = $totalRating / count($comments);
    echo "<h2>Average Rating: " . number_format($averageRating, 1) . "</h2>";
    echo "<h3>Reviews for $eventName:</h3>";

    foreach ($eventSpecificComments as $comment) {
        echo "<p>$comment</p>";
    }

    echo "<br>"; // Add extra space after each event's review
}

echo "<footer><p><small><i>Copyright &copy; 2024 FCI</i></small></p></footer>";
echo "</body></html>";
?>
