<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit book</title>
    <link rel="stylesheet" href="{{url('css/edit_styles.css')}}">
</head>
<body>
    <div class="edit_form">
        <h2>Edit you book details</h2>
        <form action="/edit-entry/{{$book->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class='sellinputs'>
                    <div class='title'>
                        <span> Book Title </span>
                    <input name='title' type="text" placeholder="book title" value="{{$book->title}}">
                    </div>
                    <div class='author'>
                        <span> Author </span>
                    <input name='author' type='text' placeholder='author' value="{{$book->author}}">
                    </div>
                    <div class='price'>
                        <span> Price </span>
                    <input name='price' type='double' placeholder='price in rupees' value="{{$book->price}}">
                    </div>
                    <br>
            </div>
            <div class="save_button"><button>Save changes</button></div>
        </form>
    </div>
    
</body>
</html>