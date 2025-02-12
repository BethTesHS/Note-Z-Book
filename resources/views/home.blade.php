<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note-Z-Book</title>

    @vite(['resources/css/styles.css'])
    @vite(['resources/js/popup.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

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

        function toggleLightMode() {
            document.body.classList.toggle('light-mode');
            const isLightMode = document.body.classList.contains("light-mode");
            localStorage.setItem('lightMode', isLightMode);

            document.getElementById('light-mode-btn').innerHTML = isLightMode
                ? `<i class="fa fa-moon-o"></i> Dark Mode`
                : `<i class="fa fa-sun-o"></i> Light Mode`;
        }

        // Check for light mode preference on page load
        document.addEventListener("DOMContentLoaded", function () {
            if (localStorage.getItem("lightMode") === "true") {
                document.body.classList.add("light-mode");
                document.getElementById("light-mode-btn").innerHTML = `<i class="fa fa-moon-o"></i> Dark Mode`;
            }
        });

        // (function() {
        //     if (localStorage.getItem('darkMode') === 'true') {
        //         document.body.classList.add('dark-mode');
        //         document.getElementById('dark-mode-btn').innerHTML = '&nbsp☀ Light Mode';
        //     }
        // })();

    </script>
    
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="left">
            <button class="menu-btn" id="menu-btn" onclick="toggleDrawer()">☰</button>
            <h1>Note-Z-Book</h1>
        </div>
        <button id="profileDisplay" class="profile-btn">
            <i class="fa fa-user"></i>
        </button>
    </nav>

    <div class="below-navbar">

        <!-- Sidebar Drawer -->
        <aside class="drawer" id="drawer">
            <ul>
                {{-- <li><a href="#"><i class="fa fa-moon-o"></i> Dashboard</a></li> --}}
                <li>
                    <button onclick="window.location.href='{{ route('books') }}'">
                        <i class="fa fa-book"></i> My Books
                    </button>
                </li>

                {{-- <li>
                    <button href="#">
                        <i class="fa fa-gear"></i> Settings
                    </button>
                </li> --}}

                <li>
                    <button id="light-mode-btn" onclick="toggleLightMode()">
                        <i class="fa fa-moon-o"></i> Light Mode
                    </button>
                </li>

                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">
                            <i class="fa fa-sign-out"></i> Logout
                        </button>
                    </form>
                </li>
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
    </div>

    {{-- POPUPS --}}
    <div id="profilePopup" class="profile-popup">
        <div class="profile-content">
            <span class="close-btn" id="closeProfilePopupBtn">&times;</span>
            <div class="profile-header">
                <img src="{{ asset('images/profile.png') }}" alt="Profile Picture" class="profile-img">
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

</body>
</html>
