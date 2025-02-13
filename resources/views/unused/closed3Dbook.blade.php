<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3D Closed Book</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #e0e0e0;
            font-family: Arial, sans-serif;
            perspective: 1000px;
        }

        .book {
            position: relative;
            width: 300px;
            height: 400px;
            background: #8B4513;
            box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.3);
            border-radius: 4px;
            transform-style: preserve-3d;
            transform: rotateY(-15deg) rotateX(10deg);
        }

        .cover {
            position: absolute;
            width: 100%;
            height: 100%;
            background: #8B4513;
            border-radius: 4px;
            box-shadow: inset -5px 0 10px rgba(0, 0, 0, 0.3);
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4);
            font-size: 24px;
            padding: 20px;
            box-sizing: border-box;
        }

        .spine {
            position: absolute;
            width: 50px;
            height: 100%;
            background: #6B3F23;
            left: -50px;
            top: 0;
            border-radius: 4px 0 0 4px;
            box-shadow: inset -5px 0 10px rgba(0, 0, 0, 0.3);
            transform-origin: right;
            transform: rotateY(90deg);
        }

        .pages {
            position: absolute;
            width: calc(100% - 30px);
            height: 96%;
            background: linear-gradient(to bottom, #fff 98%, #f0f0f0);
            left: 15px;
            top: 2%;
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.1);
            z-index: -1;
            border-radius: 0 4px 4px 0;
        }

        .page-lines {
            position: absolute;
            width: 100%;
            height: 100%;
            background: repeating-linear-gradient(
                to bottom,
                #eaeaea,
                #eaeaea 2px,
                transparent 2px,
                transparent 4px
            );
            border-radius: 0 4px 4px 0;
        }
    </style>
</head>
<body>
    <div class="book">
        <div class="spine"></div>
        <div class="pages">
            <div class="page-lines"></div>
        </div>
        <div class="cover">
            <div class="title">The Book Title</div>
        </div>
    </div>
</body>
</html>
