<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Style Div</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        .book {
            display: flex;
            width: 400px;
            height: 250px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            perspective: 1000px;
        }

        .page {
            width: 50%;
            height: 100%;
            background: white;
            border: 1px solid #ddd;
            padding: 20px;
            box-sizing: border-box;
            overflow: hidden;
        }

        .left-page {
            border-right: none;
            box-shadow: inset -5px 0 5px -5px rgba(0, 0, 0, 0.2);
        }

        .right-page {
            border-left: none;
            box-shadow: inset 5px 0 5px -5px rgba(0, 0, 0, 0.2);
        }

        .spine {
            width: 10px;
            background: #e0caa8;
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2);
        }

        .text {
            color: #555;
            line-height: 1.6;
            text-align: justify;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="book">
        <div class="page left-page">
            <div class="text">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi.
                Vivamus a libero id mauris tincidunt feugiat.
            </div>
        </div>
        <div class="spine"></div>
        <div class="page right-page">
            <div class="text">
                Curabitur vestibulum, magna non suscipit volutpat, urna lacus laoreet libero,
                ut facilisis est leo sed libero.
            </div>
        </div>
    </div>
</body>
</html>
