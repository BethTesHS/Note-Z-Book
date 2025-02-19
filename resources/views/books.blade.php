<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/bookLogo.png') }}" type="image/png">
    <title>Note-Z-Book</title>

    @vite(['resources/css/style.css'])
    @vite(['resources/css/popup.css'])
    @vite(['resources/js/script.js'])
    @vite(['resources/js/swipe.js'])
    @vite(['resources/js/addingBook.js'])

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
        <main class="main-content">
            <div class="main-card">

                <div class="card">
                    <h2>Books!</h2>
                    <p>Continue your reading journey and explore new books.</p>
                </div>

                <div class="library">
                    <div class="lib-header">
                        <h2>Reading Progress</h2>
                        <div>
                            <button class="button" onclick="addNewBook()">
                                <text>
                                    <i style="margin: 0 3px" class='fa fa-plus-square-o'></i>
                                </text>
                                Add New Book
                            </button>
                            <select name="currently" class="dropdown">
                                <option value="1"> Currently Reading</option>
                                <option value="2"> Finished Reading</option>
                                <option value="3"> Not Reading</option>
                                {{-- @foreach($categories as $category)
                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>
                    @if($userBooks->isEmpty())
                        <p> No Books </p>
                    @else
                    <div class="shelf">
                        <button class="nav-button" onclick="prev()">&#10094;</button>

                        <div class="window">
                            <div class="books">
                                @foreach ($userBooks as $userBook)
                                    <form action=" {{ route('showBook')}} " method="get">
                                        <?php
                                            $bookDetail = $userBook->book::where('id', $userBook->book_id)->first();
                                            $readProgress = (number_format( $userBook->pagesRead / $bookDetail->pages, 2)*100);
                                        ?>
                                        <input type="hidden" name="book" value="{{$bookDetail}}">
                                        <input type="hidden" name="userBook" value="{{$userBook}}">
                                        {{-- <input type="hidden" name="readProgress" value="{{$readProgress}}"> --}}
                                        
                                        <button class="book">
                                            <div class="spine">
                                            </div>
                                            <div class="cover">
                                                <div class="progress-container">
                                                    <div class="progress-container-book">
                                                        <p> {{ $bookDetail->title }}</p>
                                                    </div>
                                                    <div>
                                                        <p style="padding-bottom: 7px"> {{ $readProgress}}%</p>
                                                        <div class="progress-bar"><div class="progress brown" style="width: {{$readProgress}}%;"></div></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </button>
                                        
                                    </form>
                                @endforeach
                            </div>
                        </div>

                        <button class="nav-button" onclick = "next()">&#10095;</button>
                    </div>
                    @endif
                </div>

                <div class="card">
                    <h2>Discover New Books</h2>
                    <p>Find new recommendations based on your reading preferences.</p>
                </div>
            </div>
        </main>
    </div>

</body>


{{-------------- // POPUPS // --------------}}

    {{-- Add Product Popup --}}
    <div id="addBookPopup" class="addBookPopup">
        <div class="addBookPopup-content">

            <div style="padding: 20px 0px">
                <h2> Add New Product </h2>
            </div>
            <span class="close-btn" onclick="closePopup()">&times;</span>

            <form action="{{ route(name: 'addBook') }}" autocomplete="off" method="POST">
                @csrf

                <label> Title </label> <br>
                <input class="textArea" name="title" type="text" > <br>

                <label> Author </label> <br>
                <input class="textArea" name="author" type="text" > <br>

                <label> Publisher </label> <br>
                <input class="textArea" name="publisher" type="text" > <br>

                <label> Synopsis </label> <br>
                <textarea oninput="adjustHeight(this)" class="textArea synTextArea" name="synopsis" type="textarea" step="any" ></textarea> <br>

                <label> Year of Publication </label>
                <div>
                    <button type="button" onclick="sub(this.closest('div').querySelector('.stock input'))" class="pageButton"> - </button>
                        <input style="width: 30%" class="textArea display" id="sq" name="publishDate" oninput="change(this.closest('div').querySelector('.stock input'))" type="text" value="" >
                    <button type="button" onclick="add(this.closest('div').querySelector('.stock input'))" class="pageButton"> + </button>
                </div>
                
                <label> Pages </label>
                <div>
                    <button type="button" onclick="sub(this.closest('div').querySelector('.stock input'))" class="pageButton"> - </button>
                        <input style="width: 30%" class="textArea display" id="sq" name="pages" oninput="change(this.closest('div').querySelector('.stock input'))" type="text" value="" >
                    <button type="button" onclick="add(this.closest('div').querySelector('.stock input'))" class="pageButton"> + </button>
                </div>

                <input class="textButton" name="addBook" type="submit" value="Add Book"> <br>
            </form>
        </div>
    </div>

    {{-- -----------  ALERTS ----------- --}}
    @if(session('error_alert') && $errors->any())
        <script>
            window.onload = function() {
                let errorMessage = "";
                @foreach($errors->all() as $error)
                    errorMessage += "{{ $error }}\n";
                @endforeach
                alert(errorMessage);
            };
        </script>
    @endif
    
</html>
