<?php
$host = 'localhost';
$dbname = 'mp'; // Updated for clarity
$user = 'root';
$pass = '';

// Connect to the database
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_COOKIE['user_id'] ?? null;

if (!$user_id){
    echo "no history available";
}else{
    echo "view history";
    $sql = "SELECT image, CREATED_TIME FROM image WHERE user_id = ? ORDER BY created_TIME DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
}

echo "<h2>Your Uploaded Images</h2>";
while ($row = $result->fetch_assoc()) {
    echo "<div><img src='{$row['image']}' style='max-width:200px'><br>Uploaded at: {$row['CREATED_TIME']}</div><hr>";
}
?>