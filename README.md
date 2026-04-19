# 💰💵Who wants to be a Millionaire💵💰

This project is a web version of Who wants to be a Millionaire created by Sansca Raut and Tytus Clements.
This showcase all the classic game features of Who wants to be a Millionaire like multi question progression, lifeline tracking, and walk away option- all in PHP sessions!


Steps for running this project in a local server
🔧 Step 1: Install XAMPP
  Go to: https://www.apachefriends.org
  Download XAMPP
  Install it (default settings are fine)

Step 2: Start the server
  Open XAMPP Control Panel
  Click Start on:
  Apache
  (MySQL not needed for your project)
  
Step 3: Move your project
  Put your project folder here:
  C:\xampp\htdocs\
  
  Example:
  C:\xampp\htdocs\project 2\

Make sure inside the folder you have:
  index.php
  game.php
  question.php
  style.css
  auth.php
  data.php
  functions.php
  
Step 4: Open in browser
  Go to:
    http://localhost/project 2/
  That will load your index.php

  Common mistakes (VERY IMPORTANT)
Wrong folder
If you put your project in:
Documents/
Desktop/

  it will NOT work
  
  Must be inside:
htdocs/

  Wrong file paths (you had this issue)

Make sure your files use:
require_once __DIR__ . '/auth.php';
<link rel="stylesheet" href="style.css">

NOT:
/includes/
/assets/
