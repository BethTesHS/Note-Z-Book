<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beautiful Laravel Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            background-color: #f3f4f6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .navbar {
            background-color: white;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            padding: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .menu-btn {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 24px;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: -250px;
            width: 250px;
            height: 100%;
            background-color: white;
            box-shadow: 2px 0px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: left 0.3s ease-in-out;
        }
        .sidebar.open {
            left: 0;
        }
        .sidebar ul {
            list-style: none;
            margin-top: 20px;
        }
        .sidebar ul li {
            margin-bottom: 10px;
        }
        .sidebar ul li a {
            text-decoration: none;
            color: #333;
        }
        .content {
            flex: 1;
            padding: 20px;
            max-width: 800px;
            margin: auto;
        }
        .card {
            background: white;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .progress-bar {
            background: #e0e0e0;
            border-radius: 5px;
            height: 8px;
            overflow: hidden;
        }
        .progress {
            height: 8px;
            border-radius: 5px;
        }
        .blue { background-color: #3b82f6; width: 70%; }
        .green { background-color: #10b981; width: 40%; }
        .red { background-color: #ef4444; width: 90%; }
    </style>
</head>
<body>
    <nav class="navbar">
        <h1>Book Haven</h1>
        <button class="menu-btn" onclick="toggleSidebar()">☰</button>
    </nav>
    
    <aside class="sidebar" id="sidebar">
        <ul>
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">My Books</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </aside>
    
    <main class="content">
        <div class="card">
            <h2>Welcome Back, Reader!</h2>
            <p>Continue your reading journey and explore new books.</p>
        </div>
        
        <div class="card">
            <h3>Reading Progress</h3>
            <p>The Great Gatsby</p>
            <div class="progress-bar"><div class="progress blue"></div></div>
            <p>Atomic Habits</p>
            <div class="progress-bar"><div class="progress green"></div></div>
            <p>1984</p>
            <div class="progress-bar"><div class="progress red"></div></div>
        </div>
        
        <div class="card">
            <h3>Discover New Books</h3>
            <p>Find new recommendations based on your reading preferences.</p>
        </div>
    </main>
    
    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('open');
        }
    </script>
</body>
</html>
