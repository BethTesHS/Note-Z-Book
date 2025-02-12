<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note-Z-Book</title>

    @vite(['resources/css/style.css'])
    @vite(['resources/js/script.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    

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

                <li>
                    <button onclick="window.location.href='{{ route('home') }}'">
                        <i class="fa fa-home"></i> Home
                    </button>
                </li>

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

        {{-- Profile Sideview  --}}
        <aside id="profilePopup" class="profile-popup">
            <div class="profile-content">
                <span class="close-btn" id="closeProfilePopupBtn">&times;</span>
                <div class="profile-header">
                    <img src="{{ asset('images/profile.png') }}" alt="Profile Picture" class="profile-img">
                    <h3>{{ auth()->user()->firstName }}</h3>
                    <p>{{ '@'.auth()->user()->username }}</p>
                </div>
            </div>
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

</body>
</html>
