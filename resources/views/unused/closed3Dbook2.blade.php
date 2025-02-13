<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artistic Closed Book</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f1ea;
            font-family: 'Georgia', serif;
        }

        .book {
            position: relative;
            width: 280px;
            height: 380px;
            background: linear-gradient(145deg, #d18c3a, #c47d2c);
            border-radius: 8px;
            box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.2),
                        inset -5px -5px 10px rgba(255, 255, 255, 0.1);
            overflow: hidden;
        }

        .spine {
            /* z-index: 1000; */
            position: absolute;
            width: 40px;
            height: 100%;
            background: linear-gradient(to right, #ad6f26, #c47d2c);
            left: 0;
            top: 0;
            border-radius: 8px 0 0 8px;
            box-shadow: inset -3px 0 5px rgba(0, 0, 0, 0.2);
        }

        /* .pages {
            position: absolute;
            width: calc(100% - 40px);
            height: 94%;
            background: #fdfdfd;
            left: 30px;
            top: 3%;
            box-shadow: inset 0 0 8px rgba(0, 0, 0, 0.05);
            border-radius: 0 6px 6px 0;
        } */

        /* .page-lines {
            position: absolute;
            width: 100%;
            height: 100%;
            background: repeating-linear-gradient(
                to bottom,
                #f3f3f3,
                #f3f3f3 2px,
                transparent 2px,
                transparent 4px
            );
            border-radius: 0 6px 6px 0;
        } */

        .cover {
            position: absolute;
            width: 100%;
            height: 100%;
            background: transparent;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-size: 22px;
            font-style: italic;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            text-align: center;
            padding: 20px;
            box-sizing: border-box;
        }

        .cover::before {
            content: '';
            position: absolute;
            width: 95%;
            height: 95%;
            border: 2px solid rgba(155, 84, 84, 0.217);
            border-radius: 6px;
            box-sizing: border-box;
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
            <div class="title">Whimsical Tales</div>
        </div>
    </div>
</body>
</html>
