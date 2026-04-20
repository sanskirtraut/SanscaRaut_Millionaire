# 💰 Who Wants to Be a Millionaire (PHP Game Show)

This project is a web-based version of **Who Wants to Be a Millionaire**, developed by **Sansca Raut** and **Tytus Clements** for CSC 4370/6370.

The application recreates the classic game show experience using **PHP, HTML5, and CSS3**, with all game logic handled on the server side.

---

## Features

- 15-question progressive gameplay  
- Lifelines:
  - 50:50  
  - Hint  
  - Skip  
- Walk-away option  
- Session-based game state tracking  
- Login and registration system  
- Leaderboard (top scores)  
- Responsive UI design  

---

## Technologies Used

- PHP (server-side logic)  
- HTML5 (structure)  
- CSS3 (styling & layout)  
- XAMPP (local server)  

---

## Project Structure

project2/
│── index.php
│── login.php
│── register.php
│── logout.php
│── game.php
│── question.php
│── result.php
│── leaderboard.php
│
├── includes/
│ ├── auth.php
│ ├── functions.php
│ ├── data.php
│
├── assets/
│ ├── style.css
│
├── data/
│ ├── users.txt


---

## How to Run Locally

### Step 1: Install XAMPP
- Download: https://www.apachefriends.org  
- Install using default settings  

---

### Step 2: Start Apache
- Open XAMPP Control Panel  
- Start **Apache**

---

### Step 3: Move Project
Place the project folder inside:

C:\xampp\htdocs\


Example:

C:\xampp\htdocs\project2\

---

### 🌐 Step 4: Run the Project

Open your browser and go to:

http://localhost/project2/

---

## ⚠️ Common Issues

### ❌ Project not loading
- Make sure your folder is inside `htdocs`
- Do NOT run from Desktop or Documents

---

### ❌ PHP include errors

Make sure your files use correct paths:

```php
require_once __DIR__ . '/includes/auth.php';
CSS not working

Use correct path:

<link rel="stylesheet" href="assets/style.css">
 Folder name issue

Avoid spaces like:

project 2

Use:

project2 
 Security Features
Input validation using filter_input()
Output escaping with htmlspecialchars()
Password hashing using password_hash()
Session-based authentication
 Team Members
Sansca Raut – PHP Logic, CSS, Testing
Tytus Clements – PHP Logic, HTML, Sessions, Forms
 Notes
PHP handles all game logic
No database used (flat file storage)
No JavaScript required
 Repository

GitHub Repo:
https://github.com/sanskirtraut/Millionaire-Game


---

# 🔥 Why this version is better

- Clean Markdown formatting ✅  
- Proper spacing + headings ✅  
- Looks professional on GitHub ✅  
- Matches your actual project setup ✅  

---

If you want next level polish, I can add:
- badges (build, tech stack, etc.)
- screenshots of your game
- demo GIF (huge bonus for grading)

Just tell me 👍
