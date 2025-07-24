<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Deepfake Detection - MesoNet</title>
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
</style>
</head>
<body>

<h1>Deepfake Detection</h1>
<p>Upload a face image to check if it is real or AI-generated using our AI model.</p>

<form class="upload-form" id="uploadForm" action="process_upload.php" method="POST" enctype="multipart/form-data">
  <input type="file" name="image" id="imageInput" accept=".jpg, .jpeg, .png" required><br>
  <div id="file-name"></div>
  <input type="submit" value="Check Now" />
</form>

<script>
  const fileInput = document.getElementById('imageInput');
  const fileNameDiv = document.getElementById('file-name');
  const form = document.getElementById('uploadForm');

  fileInput.addEventListener('change', () => {
    if (fileInput.files.length > 0) {
      const name = fileInput.files[0].name;
      fileNameDiv.textContent = "Selected file: " + name;

      // Small delay so user sees file name before redirecting
      setTimeout(() => {
        form.submit();
      }, 600);
    } else {
      fileNameDiv.textContent = '';
    }
  });
</script>

</body>
</html>
