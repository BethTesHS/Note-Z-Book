<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beautiful Laravel Page</title>

    @vite(['resources/css/styles.css'])
    @vite(['resources/js/popup.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

    
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="left">
            <button class="menu-btn" id="menu-btn" onclick="toggleDrawer()">☰</button>
            <h1>Book Log</h1>
        </div>
        <button id="profileDisplay" class="profile-btn">
            <i class="fa fa-user"></i>
        </button>
    </nav>

    <!-- Sidebar Drawer -->
    <aside class="drawer" id="drawer">
        <ul>
            {{-- <li><a href="#"><i class="fa fa-moon-o"></i> Dashboard</a></li> --}}
            <li><a href="#"><i class="fa fa-book"></i> My Books</a></li>
            <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
            <li>
                <a id="dark-mode-btn" onclick="toggleDarkMode()">
                    <i class="fa fa-moon-o"></i> Dark Mode
                </a>
            </li>
            <li><a href="#"><i class="fa fa-sign-out"></i> Logout</a></li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <div class="card">
            <h2>Welcome Back, Reader!</h2>
            <p>Continue your reading journey and explore new books.</p>
        </div>

        <div class="card">
            <h2>Reading Progress</h2>
            <div class="progress-container">
                <div class="progress-container-book">
                    <p>The Great Gatsby</p>
                    <p>70%</p>
                </div>
                <div class="progress-bar"><div class="progress brown" style="width: 70%;"></div></div>
            </div>
            <div class="progress-container">
                <div class="progress-container-book">
                    <p>Atomic Habits </p>
                    <p>40%</p>
                </div>
                <div class="progress-bar"><div class="progress brown" style="width: 40%;"></div></div>
            </div>
            <div class="progress-container">
                <div class="progress-container-book">
                    <p>1984 </p>
                    <p>90%</p>
                </div>
                <div class="progress-bar"><div class="progress brown" style="width: 90%;"></div></div>
            </div>
        </div>

        <div class="card">
            <h2>Discover New Books</h2>
            <p>Find new recommendations based on your reading preferences.</p>
        </div>
    </main>

    {{-- POPUPS --}}
    <div id="profilePopup" class="profile-popup">
        <div class="profile-content">
            <span class="close-btn" id="closeProfilePopupBtn">&times;</span>
            <div class="profile-header">
                <img src="{{ asset('images/logo.png') }}" alt="Profile Picture" class="profile-img">
                <h3>{{ auth()->user()->firstName }}</h3>
                <p>@{{ auth()->user()->username }}</p>
                {{-- <h3>Bethelhem</h3>
                <p>JustBeth</p> --}}
            </div>
            <div class="profile-settings">
                <a href="">Settings</a>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        function toggleDrawer() {
            var drawer = document.getElementById('drawer');
            var menuBtn = document.getElementById('menu-btn');
            var mainContent = document.querySelector('.main-content');

            drawer.classList.toggle('open');
            
            if (window.innerWidth >= 768) {
                mainContent.classList.toggle('shifted');
            }

            if (drawer.classList.contains('open')) {
                menuBtn.textContent = '✖';
            } else {
                menuBtn.textContent = '☰';
            }
            
        }

        function toggleDarkMode() {
            document.body.classList.toggle('dark-mode');
            localStorage.setItem('darkMode', document.body.classList.contains('dark-mode'));
            document.getElementById('dark-mode-btn').innerHTML = document.body.classList.contains('dark-mode') ? `<i class="fa fa-sun-o"></i> Light Mode` : `<i class="fa fa-moon-o"></i> Dark Mode`;
        }

        // (function() {
        //     if (localStorage.getItem('darkMode') === 'true') {
        //         document.body.classList.add('dark-mode');
        //         document.getElementById('dark-mode-btn').textContent = '☀';
        //     }
        // })();

    </script>

</body>
</html>
