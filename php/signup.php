<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up - Deepfake Detection</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0f172a;
            color: #f1f5f9;
            display: flex;
            justify-content: center;
            align-items: center;
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

        .link {
            text-align: center;
            margin-top: 1.5rem;
        }

        .link a {
            color: #38bdf8;
            text-decoration: none;
        }

        .link a:hover {
            text-decoration: underline;
        }
        .signup-box {
            background-color: #1e293b;
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 450px;
        }

        h2 {
            text-align: center;
            color: #38bdf8;
            margin-bottom: 2rem;
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 0.5rem;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.75rem;
            border-radius: 8px;
            border: none;
            background-color: #334155;
            color: #f1f5f9;
            margin-bottom: 1.5rem;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #38bdf8;
            color: #0f172a;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            padding: 0.75rem;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0ea5e9;
        }

    </style>
</head>
<body>

<a href="index.php" class="back-arrow" title="Back to Home">&#8592; Back</a>

<div class="signup-box">
    <h2>Create an Account</h2>
    <form action="#" method="post">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Choose a username" required>

        <label for="email">Email (optional)</label>
        <input type="email" id="email" name="email" placeholder="you@example.com">

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Create a password" required>

        <label for="confirm_password">Confirm Password</label>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="Repeat your password" required>

        <input type="submit" value="Sign Up">
    </form>

    <div class="link">
        Already have an account? <a href="login.php">Sign in here</a>
    </div>
</div>

</body>
</html>
