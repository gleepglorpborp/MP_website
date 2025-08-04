<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Deepfake Detection</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
<style>
  body {
    font-family: 'Inter', sans-serif;
    background: #0f172a;
    color: #f1f5f9;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
  }

  .back-arrow {
      position: absolute;
      top: 20px;
      left: 20px;
      font-size: 1.5rem;
      color: #38bdf8;
      text-decoration: none;
      font-weight: 600;
      transition: color 0.3s;
  }
  .back-arrow:hover {
      color: #0ea5e9;
      text-decoration: underline;
  }

  h1 {
    font-size: 2.5rem;
    margin-bottom: 1rem;
    color: #38bdf8;
  }

  p {
    margin-bottom: 2rem;
    font-size: 1.1rem;
    text-align: center;
    max-width: 400px;
  }

  .upload-form {
    background: #1e293b;
    padding: 2rem;
    border-radius: 12px;
    box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    text-align: center;
    width: 100%;
    max-width: 400px;
  }

  input[type="file"] {
    margin-bottom: 0.5rem;
    color: #f1f5f9;
    cursor: pointer;
    font-weight: 600;
  }

  #file-name {
    font-size: 1rem;
    margin-bottom: 1rem;
    color: #a5b4fc; /* lighter text for file name */
    min-height: 1.2em;
  }

  input[type="submit"] {
    background-color: #38bdf8;
    color: #0f172a;
    border: none;
    padding: 0.6rem 1.2rem;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 600;
    opacity: 0.8; /* subtle, since user won't really click */
  }

  input[type="submit"]:hover {
    background-color: #0ea5e9;
  }

  .tabs {
    display: flex;
    justify-content: space-around;
    margin-bottom: 1rem;
  }

  .tab {
    flex: 1;
    text-align: center;
    padding: 0.8rem;
    cursor: pointer;
    background-color: #0f172a;
    border: 1px solid #1e293b;
    border-bottom: none;
    color: #94a3b8;
    font-weight: 600;
  }

  .tab.active {
    background-color: #1e293b;
    color: #38bdf8;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
    border-bottom: 1px solid #1e293b;
  }

  .form-section {
    display: none;
  }

  .form-section.active {
    display: block;
  }

  input[type="file"],
  input[type="url"] {
    margin-bottom: 0.5rem;
    width: 100%;
    padding: 0.6rem;
    background: #0f172a;
    color: #f1f5f9;
    border: 1px solid #475569;
    border-radius: 8px;
  }
  .error-message {
    color: #f87171;
    background: #1e293b;
    border: 1px solid #f87171;
    padding: 0.8rem;
    border-radius: 8px;
    margin-bottom: 1rem;
    font-weight: 600;
    text-align: center;
  }


</style>
</head>
<body>

<a href="index.php" class="back-arrow" title="Back to Home">&#8592; Back</a>

<h1>Deepfake Detection</h1>
<p>Upload an image file or provide an image URL to check if it's real or AI-generated using our detection model.</p>

<?php if (isset($_GET['error'])): ?>
  <div class="error-message">
    <?= htmlspecialchars($_GET['error']) ?>
  </div>
<?php endif; ?>

<div class="upload-form">
  <div class ="tabs">
    <div class="tab active" id="tab-upload">Upload Image</div>
    <div class="tab" id="tab-url">Image URL</div>
  </div>

  <form class="form-section active" id="uploadfile" action="process_file.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="image" id="imageInput" accept=".jpg, .jpeg, .png" required><br>
    <div id="file-name"></div>
    <input type="submit" value="Check Now" />
  </form>

  <form class="form-section" id ="uploadurl" action="process_url.php" method="POST">
    <input type="url" name="image_url" id="imageurlinput" placeholder="Enter image URL..." required>
    <input type="submit" value="Check Now" />
  </form>
</div>

<script>
  const fileInput = document.getElementById('imageInput');
  const fileNameDiv = document.getElementById('file-name');
  const uploadfile = document.getElementById('uploadfile');
  const uploadurl = document.getElementById('uploadurl');
  const tabupload = document.getElementById('tab-upload');
  const taburl = document.getElementById('tab-url');

  tabupload.addEventListener('click', () => {
    tabupload.classList.add('active');
    taburl.classList.remove('active');
    uploadfile.classList.add('active');
    uploadurl.classList.remove('active');
  });

  taburl.addEventListener('click', () => {
    taburl.classList.add('active');
    tabupload.classList.remove('active');
    uploadurl.classList.add('active');
    uploadfile.classList.remove('active');
  });
  
  fileInput.addEventListener('change', () => {
    if (fileInput.files.length > 0) {
      const name = fileInput.files[0].name;
      fileNameDiv.textContent = "Selected file: " + name;
      
    } else {
      fileNameDiv.textContent = '';
    }
  });
</script>

</body>
</html>