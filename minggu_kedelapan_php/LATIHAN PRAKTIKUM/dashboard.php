<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        :root {
            --primary: #4361ee;
            --light: #f8f9fa;
            --dark: #212529;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f7fa;
        }
        
        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        header {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        
        .welcome-message {
            font-size: 24px;
            color: var(--dark);
            font-weight: 600;
        }
        
        .logout-btn {
            padding: 10px 20px;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .logout-btn:hover {
            background-color: #3a56d4;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
        }
        
        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }
        
        .card {
            background-color: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .card-title {
            font-size: 18px;
            color: var(--dark);
            margin-bottom: 15px;
            font-weight: 600;
        }
        
        .card-content {
            color: #6c757d;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <header>
            <div class="welcome-message">Welcome, <?php echo $_SESSION['username']; ?>!</div>
            <a href="logout.php" class="logout-btn">Logout</a>
        </header>
        
        <div class="card-container">
            <div class="card">
                <div class="card-title">Your Profile</div>
                <div class="card-content">
                    This is your personal dashboard. You can add more content and features here as your project grows.
                </div>
            </div>
            
            <div class="card">
                <div class="card-title">Recent Activity</div>
                <div class="card-content">
                    You logged in successfully. Last login was today.
                </div>
            </div>
            
            <div class="card">
                <div class="card-title">Quick Actions</div>
                <div class="card-content">
                    <a href="#" style="color: var(--primary);">Edit Profile</a><br>
                    <a href="#" style="color: var(--primary);">Change Password</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>