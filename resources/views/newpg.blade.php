<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{url('css/styles.css')}}">
</head>
<body>
    <script src="{{ asset('/assets/js/script.js')}}"></script>
    @auth
    <div class="authorized">
        <div class="auth_heading"> <h3> You are now logged in </h3> </div>
        <div class="sellbook">
            <h2> Sell another book! </h2>
            <form action="/create-entry" method="POST">
                @csrf
                <div class='sellinputs'>
                    <div class='title'>
                        <span> Book Title </span>
                    <input name='title' type="text" placeholder="book title">
                    </div>
                    <div class='author'>
                        <span> Author </span>
                    <input name='author' type='text' placeholder='author'>
                    </div>
                    <div class='price'>
                        <span> Price </span>
                    <input name='price' type='double' placeholder='price in rupees'>
                    </div>
                    <br>
            </div>
                <div class="upload_button"><button>Upload</button></div>
            </form>
        </div>

        <div class="book_choice">
            <div class="allbooks">
            <a href="{{ route('allBooks') }}">
                <button>All Books</button>
            </a>
            </div>
            <div class="mybooks">
            <a href="{{ route('myBooks') }}">
                <button>My Books</button>
            </a>
            </div>
        </div>

        @if(isset($viewType))
            <div class="list_items">
                <h2>{{ $viewType == 'all' ? 'Books for Sale' : 'My Books' }}</h2>
                @foreach ($allBooks as $book)
                    <div class="ind_item">
                        <p> <b>Book: {{ $book['title'] }}</b></p><p>Author: {{ $book['author'] }}</p>       Price: Rs. {{ $book['price'] }}
                        <p>Contact: {{$book->user->email}}</p>
                        @if ($viewType=='mine')
                        <!-- the edit and delete options are shown-->
                        <div class="editing">
                            <p><a href="/edit-entry/{{$book->id}}">Edit</a></p>
                            <form action="/delete-entry/{{$book->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button>Delete</button>
                            </form>
                        </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif

        <div class='logout'>
        <form action="/logout" method="POST">
            @csrf
            <div class="logout_b">
            <button style="margin-top:10%"> Log out </button>
            </div>
        </form>
        </div>
    </div>
    @else
    <div class='full_login'>
        <div class='heading'>
            <h1>Second hand Book Seller</h1>
        </div>
        <div class='container'>
            <div class='login'>
                <h2>Login</h2>
                <form id='form' action="/login" method="POST">
                    @csrf
                    <div class='loginname'>
                        <span> Name </span>
                        <div>
                    <input id="loginn" name='login_name' type="text" placeholder="name" style="padding: 4%" required></div>
                    </div>
                    <div class='loginpwd'>
                        <span>Password</span>
                    <input name='login_password' type="password" placeholder="password" required>
                    </div>
                    <div class="loginbutton">
                    <button type="submit">Login</button>
                    </div>
                </form>
            </div>
            <div class='register'>
                <h2>Register</h2>
                <form action="/register" method="POST">
                    @csrf
                    <div class='name'>
                        <span>Name</span>
                        <div>
                    <input name='name' type="text" placeholder="name" style="padding: 4%"></div>
                </div>
                <div class='email'>
                    <span>Email</span>
                    <div>
                    <input name='email' type="text" placeholder="email" style="padding: 4%"></div>
                </div>
                <div class='pwd'>
                    <span>Password</span>
                    <input name='password' type="password" placeholder="password">
                </div>
                <div class='button'>
                    <button>Register</button>
                </div>
                </form>
            </div>
        </div>
        @endauth
    </div>
    
</body>
</html>
