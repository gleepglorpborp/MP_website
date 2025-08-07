<?php
session_start();

$host = 'localhost';
$dbname = 'mp';
$user = 'root';
$pass = '';

// Connect to DB
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Manage user_id cookie
if (!isset($_COOKIE['user_id'])){
    $user_id = bin2hex(random_bytes(16));
    setcookie('user_id', $user_id, time() + (86400 * 365), "/");
} else {
    $user_id = $_COOKIE['user_id'];
}

$error = '';
$imagePath = '';

// Handle delete request (via GET param delete=1)
if (isset($_GET['delete']) && $_GET['delete'] == '1' && isset($_SESSION['temp_image_path'])) {
    $tempImage = $_SESSION['temp_image_path'];
    if (file_exists($tempImage)) {
        unlink($tempImage);
    }
    unset($_SESSION['temp_image_path']);
    header('Location: upload.php');
    exit;
}

// If user confirms
if (isset($_POST['confirm_submit']) && isset($_SESSION['temp_image_path'])) {
    $imageurl = $_SESSION['temp_image_path'];

    // SIGHTENGINE CHECK
    $sightengineuser = '590745066'; 
    $sightenginesecret = 'YXDMFeNCQc2zWJSHev4pmEXUt2nZfQEC';
    $sightengineurl = "https://api.sightengine.com/1.0/check.json?models=deepfake,genai&api_user=$sightengineuser&api_secret=$sightenginesecret&url=" . urlencode($imageurl);

    $curl = curl_init($sightengineurl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);

    if ($response === false) {
        echo "curl Error: " . curl_error($curl);
        exit;
    }

    $data = json_decode($response, true);
    $_SESSION['detection_result'] = $data;
    $_SESSION['image_url'] = $imageurl;

    // Save the image info to DB
    $sql = "INSERT INTO image (image, url, user_id) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $imagePath, $url, $user_id);
    //$stmt->execute();

    unset($_SESSION['temp_image_path']);
    header("Location: detect.php/?url=" . urlencode($imageurl));
    exit;
}


// First upload POST with image file
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['image_url']) && !isset($_POST['confirm_submit'])) {
    $submittedurl = trim($_POST['image_url']);

    if (!filter_var($submittedurl, FILTER_VALIDATE_URL)) {
        $_SESSION['error'] = 'Invalid URL submitted.';
        header("Location: upload.php");
        exit;
    }

    $headers = @get_headers($submittedurl, 1);

    if ($headers === false || strpos($headers[0], '200') === false) {
        $_SESSION['error'] = 'URL is not reachable.';
        header("Location: upload.php");
        exit;
    }

    // Normalize header keys to lowercase
    $normalizedHeaders = array_change_key_case($headers, CASE_LOWER);
    $contentType = $normalizedHeaders['content-type'] ?? '';

    if (is_array($contentType)) {
        $contentType = $contentType[0];
    }

    if (stripos($contentType, 'image/') === 0) {
        $_SESSION['temp_image_path'] = $submittedurl;
        $imageurl = $submittedurl;
        //header("Location: detect.php");
        //exit;
    } else {
        $_SESSION['error'] = 'The URL does not point to an image. (' . $contentType . ')';
        header("Location: upload.php");
        exit;
    }


}


// If no temp image in session (direct access or after delete), redirect to upload.php
if (empty($imagePath) && !isset($_SESSION['temp_image_path'])) {
    header('Location: upload.php');
    exit;
}

// Use temp image path if exists
if (empty($imagePath) && isset($_SESSION['temp_image_path'])) {
    $imagePath = $_SESSION['temp_image_path'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Confirm Upload - Deepfake Detection</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
<style>
    body {
        font-family: 'Inter', sans-serif;
        background: #0f172a;
        color: #f1f5f9;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        min-height: 100vh;
        padding: 2rem;
        margin: 0;
    }
    h1 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        color: #38bdf8;
    }
    .preview-container {
        position: relative;
        margin-bottom: 2rem;
    }
    .preview-container img {
        max-width: 300px;
        border-radius: 12px;
        border: 3px solid #38bdf8;
    }
    .remove-btn {
        position: absolute;
        top: 5px;
        right: 5px;
        background: rgba(255, 0, 0, 0.8);
        color: white;
        border: none;
        font-weight: bold;
        font-size: 24px;
        line-height: 1;
        padding: 0 10px;
        cursor: pointer;
        border-radius: 50%;
        user-select: none;
    }
    .buttons {
        display: flex;
        gap: 1rem;
    }
    button, input[type="submit"] {
        background-color: #38bdf8;
        color: #0f172a;
        border: none;
        padding: 0.6rem 1.5rem;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        font-size: 1rem;
    }
    button:hover, input[type="submit"]:hover {
        background-color: #0ea5e9;
    }
    .error {
        color: #f87171;
        margin-bottom: 1rem;
        font-weight: 600;
    }
    form{
      display: flex;
      gap: 1rem;
    }
    </style>
</head>
<body>

<h1>Confirm Your Upload</h1>

<p>Images uploaded with URL will not be saved to history</p>

<?php if ($error): ?>
    <div class="error"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>

<?php if (!empty($imageurl)): ?>
    <div class="preview-container">
        <img src="<?= htmlspecialchars($imageurl) ?>" alt="Uploaded Image Preview" />
        <!-- Delete button triggers JS confirmation -->
        <button type="button" class="remove-btn" id="deleteBtn" title="Delete Image">&times;</button>
    </div>
<?php endif; ?>

<form method="POST" enctype="multipart/form-data">
    <input type="hidden" name="confirm_submit" value="1" />
    <input type="submit" value="Check Now" />
</form>

<script>
  document.getElementById('deleteBtn').addEventListener('click', () => {
    if (confirm("Do you want to delete this image?")) {
      // Redirect with ?delete=1 to trigger deletion server-side
      window.location.href = 'process_url.php?delete=1';
    }
    // else do nothing and stay on the page
  });
</script>
</body>
</html>


