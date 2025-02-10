<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js"></script>

    <title>Document</title>

    @vite(['resources/css/style.css'])
    @vite(['resources/css/table.css'])
    {{-- @vite(['resources/css/addMembersPopup.css']) --}}
     

    @vite(['resources/js/script.js'])


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

</head>
<body>
    

    <div class="navbar">
        <h2>Dashboard</h2>
        <div style="flex-direction: row; display: flex;">
            <form action="{{ route('logout') }}" method="POST">
                @csrf  <!-- CSRF token for security -->
                <button class="logout-btn" type="submit">
                    <i class="fa fa-sign-out"></i> Logout
                </button>
            </form>
            
            {{-- <button id="profileDisplay" class="profile-btn">
                <i class="fa fa-user"></i>
            </button> --}}
        </div>
    </div>

    <div class="wrapper">
        <div class="sidebar">
            <ul>
                <li> <a href="{{ route('home') }}"> <button class= "listButton" style="color: #ffffff"> <i class="fa fa-home"></i> Home </button> </a> </li>
                <li> <a href="{{ route('chatGPT1') }}"> <button class= "listButton" style="color: #ffffff"> <i class="fa fa-pencil-square"></i>  chatGPT1 </button> </a> </li>
                <li> <a href="{{ route('chatGPT2') }}"> <button class= "listButton" style="color: #ffffff"> <i class="fa fa-pencil-square"></i>  chatGPT2 </button> </a> </li>
                <li> <a href="{{ route('copilot1') }}"> <button class= "listButton" style="color: #ffffff"> <i class="fa fa-pencil-square"></i>  copilot1 </button> </a> </li>
                {{-- <li> <a href="\role"> <button class= "listButton" > <i class="fa fa-pencil-square"></i> Role </button> </a> </li>
                <li> <a href="\members"> <button class= "listButton" > <i class="fa fa-users"></i> Members </button> </a> </li>
                <li> <a href="\contribution"> <button class= "listButton" > <i class="fa fa-handshake-o"></i> Contribution </button> </a> </li>
                <li> <a href="\analysis"> <button class= "listButton" > <i class="fa fa-line-chart"></i> Analysis </button> </a> </li> --}}
            </ul>
        </div>

        <div class="mainviews" id="mainviews">
            <header>
                <h1>Welcome to the Home Page</h1>
            </header>
            <section>
                <p>This is a sample page to showcase a sidebar layout with animated buttons and links. Enjoy the smooth transitions!</p> <br>
                <p>Click the button below to open this link: </p>
                <p>https://dribbble.com/tags/welcome-page </p> <br>
            </section>
            <footer>
                <button class="animated-btn"><a href="https://dribbble.com/tags/welcome-page" target="_blank">Click Me</a></button>
            </footer>
        </div>
    </div>

    <div id="profilePopup" class="profile-popup">
        <div class="profile-content">
            <span class="close-btn" id="closeProfilePopupBtn">&times;</span>
            <div class="profile-header">
                <img src="{{ asset('images/default-profile.jpg') }}" alt="Profile Picture" class="profile-img">
                <h3>{{ auth()->user()->firstName }}</h3>
                <p>@{{ auth()->user()->username }}</p>
            </div>
            <div class="profile-settings">
                <a href="">Settings</a>
            </div>
        </div>
    </div>
    
</body>
</html>
