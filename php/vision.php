<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Our Vision - Deepfake Detection AI</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #0f172a;
            color: #f1f5f9;
        }

        nav {
            display: flex;
            justify-content: flex-start;
            background-color: #1e293b;
            padding: 1rem 2rem;
        }

        nav a {
            color: #ffffff;
            text-decoration: none;
            margin-left: 1.5rem;
            font-weight: 600;
        }

        nav a:hover {
            color: #0ea5e9;
        }

        .container {
            max-width: 960px;
            margin: auto;
            padding: 3rem 2rem;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            color: #38bdf8;
        }

        h2 {
            margin-top: 2rem;
            color: #38bdf8;
        }

        ul {
            margin-top: 1rem;
            padding-left: 1.2rem;
            line-height: 1.8;
        }

        li {
            margin-bottom: 0.5rem;
        }

        p {
            font-size: 1.1rem;
            line-height: 1.8;
        }

        footer {
            margin-top: 4rem;
            text-align: center;
            font-size: 0.9rem;
            color: #94a3b8;
        }

        .cta {
            margin-top: 2rem;
            text-align: center;
        }

        .cta a {
            display: inline-block;
            padding: 0.8rem 1.6rem;
            font-size: 1rem;
            background-color: #38bdf8;
            color: #0f172a;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .cta a:hover {
            background-color: #0ea5e9;
        }
    </style>
</head>
<body>

<nav>
    <a href="index.php">Home</a>
    <a href="vision.php">Vision</a>
    <a href="mission.php">Mission</a>
    <a href="contact.php">Contact Us</a>
</nav>

<div class="container">
    <h1>Our Vision</h1>

    <p>
        As deepfake technology evolves, our vision is to build public resilience against digital deception. 
        We aim to empower users with knowledge and tools to detect and challenge manipulated content that can spread false information, cause reputational harm, or incite conflict.
    </p>

    <h2>How to Spot a Deepfake</h2>
    <p>
        Detecting deepfakes is becoming increasingly difficult due to enhanced realism and the rapid evolution of generative AI tools. 
        While deepfakes are improving, there are still telltale signs you can look out for:
    </p>
    <ul>
        <li> Unnatural or robotic facial movements</li>
        <li> Inconsistent skin tones or color mismatches</li>
        <li> Lighting inconsistencies across the face and background</li>
        <li> Poor lip-syncing </li>
        <li> Blurry or distorted backgrounds and face edges</li>
        <li> Suspicious distribution </li>
    </ul>

    <h2>Why This Matters</h2>
    <p>
        As shown below. The target groups were as follows: politicians and the general public were each targeted 40% of the time, and celebrities were targeted 20% of the time.
    </p>
     <div class="images">
        <img src="../images/demographic.png" alt="Statistics">
     </div>   
    <p>
        Deepfakes don’t just threaten truth — they target specific groups in harmful ways by targeting famous and infamous figures 
        to attract our attention and spread fake news all around the world.

        The people we love are bound to the influence of controversial people that we know, hence identifying and learning to contextualise information
        is key to shaping our future.
    </p>
    <!-- <ul> 
        <li><strong>Women</strong>: Often targeted in non-consensual deepfake pornography, leading to reputational and psychological harm.</li>
        <li><strong>Politicians & Public Figures</strong>: Used to manipulate speeches, incite conflict, or spread propaganda.</li>
        <li><strong>Teenagers & Students</strong>: Vulnerable to cyberbullying and harassment using faked images or videos.</li>
        <li><strong>Journalists</strong>: Can become victims of credibility attacks through forged media.</li>
        <li><strong>General Public</strong>: Misinformation can go viral, shaping public opinion based on fabricated content.</li>
    </ul>  -->

    <p>
        Hence, spreading awareness and providing easy-to-use detection tools is crucial for protecting individuals, communities, and truth, to an emerging digitalised society.
    </p>

    <div class="cta">
        <a href="upload.php">Test an Image for Deepfakes</a>
    </div>
</div>

<footer>
    &copy; <?php echo date("Y"); ?> Deepfake Detection AI. All rights reserved.
</footer>

</body>
</html>
