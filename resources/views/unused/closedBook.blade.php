<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Closed Book Div</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        .book {
            position: relative;
            width: 300px;
            height: 400px;
            background: #8B5E3C; /* Cover Color */
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3);
            border-radius: 4px;
            overflow: hidden;
        }

        .spine {
            position: absolute;
            width: 30px;
            height: 100%;
            background: #6A452A; /* Spine Color */
            left: 0;
            top: 0;
            box-shadow: inset -3px 0 5px rgba(0, 0, 0, 0.2);
        }

        .pages {
            position: absolute;
            width: calc(100% - 30px);
            height: 100%;
            background: #fff;
            left: 30px;
            top: 0;
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .cover {
            position: absolute;
            width: 100%;
            height: 100%;
            background: #8B5E3C;
            box-shadow: inset -5px 0 10px rgba(0, 0, 0, 0.3);
        }

        .title {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            font-size: 24px;
            text-align: center;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4);
        }
    </style>
</head>
<body>
    <div class="book">
        {{-- <div class="spine"></div> --}}
        {{-- <div class="pages"></div> --}}
        <div class="cover">
            <div class="title">The Book Title</div>
        </div>
    </div>
</body>
</html>
