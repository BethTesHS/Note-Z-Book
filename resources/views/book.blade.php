<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/bookLogo.png') }}" type="image/png">
    <title>Note-Z-Book</title>

    @vite(['resources/css/style.css'])
    @vite(['resources/js/script.js'])
    @vite(['resources/js/swipe.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>


</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="left">
            <button class="menu-btn" id="menu-btn" onclick="toggleDrawer()"><i class="fa fa-navicon"></i></button>
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

                <hr style="border: 0.5px solid rgba(167, 124, 67, 0.2); width: 90%; margin: 10px;">

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
                    {{-- <p>{{ '@'.auth()->user()->username }}</p> --}}
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content-book">
            {{-- <img src="{{asset('images/bookArt.png')}}" /> --}}
            <div class="main-card" style="width: 45%">
                <div class="card">
                    <h2 style="font-size: 30px">{{ $book->title }}</h2>
                    <p> {{ $book->author }}</p>
                    {{-- <p> {{  $book->publisher }}</p> --}}
                </div>

                <div class="card">
                    <h2 style="padding-bottom: 7px"> Synopsis </h2>
                    <div class="synopsis">
                        <p style="padding-bottom: 7px"> {!! nl2br(e($book->synopsis)) !!} </p>
                    </div>
                    {{-- <a class="read-more" href="#">Read More</a> --}}
                </div>
            </div>
            <div class="main-card" style="width: 45%">
                <div class="card">
                    <h2 style="font-size: 30px">Book Logs</h2>
                    <p>Take a look at your reading logs!</p>
                </div>
                <div class="card" >
                    <h2>Reading Progress</h2>
                    <?php
                        $readProgress = (number_format( $userBook->pagesRead / $book->pages, 2)*100);
                        ?>
                        <div>
                            <div class="progress-container-title">
                                {{-- <p> {{ $bookDetail->title }}</p> --}}
                                <p>{{$userBook->pagesRead . ' of ' . $book->pages . ' pages'}}</p>
                                <p> {{ $readProgress}}%</p>
                            </div>
                            <div  style="margin-top: 7px" class="progress-bar"><div class="progress brown" style="width: {{$readProgress}}%;"></div></div>
                        </div>
                    {{-- <br/> --}}

                    {{-- <h2>Hello</h2>
                    <p>World</p> --}}
                </div>
            </div>
            {{--
            <div class="library">
                <h2>Reading Progress</h2>
                @if($userBook == null)
                    <p> No Details </p>
                @else
                <div class="shelf">
                    <button class="nav-button" onclick="prev()">&#10094;</button>

                    <div class="window">
                        <div class="books" onclick="{{ route('book')}}">
                                <div class="book" onclick="">

                                        <div class="spine">
                                        </div>
                                        <div class="cover">
                                            <div class="progress-container">
                                                <div class="progress-container-book">
                                                    <p> {{ $book->title }}</p>
                                                </div>
                                                <div>
                                                    <p style="padding-bottom: 7px"> {{ $readProgress}}%</p>
                                                    <div class="progress-bar"><div class="progress brown" style="width: {{$readProgress}}%;"></div></div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                        </div>
                    </div>

                    <button class="nav-button" onclick = "next()">&#10095;</button>
                </div>
                @endif
            </div>

            <div class="card">
                <h2>Discover New Books</h2>
                <p>Find new recommendations based on your reading preferences.</p>
            </div> --}}
        </main>
    </div>

</body>
</html>
