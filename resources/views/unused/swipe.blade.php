<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swipeable Cards</title>
    <style>
        /* Basic Reset */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }

        /* Carousel Container */
        .carousel {
            overflow: hidden;
            width: 90%;
            max-width: 600px;
            position: relative;
        }

        /* Card Wrapper */
        .carousel-track {
            display: flex;
            transition: transform 0.4s ease;
        }

        /* Individual Card */
        .card {
            flex: 0 0 100%;
            max-width: 100%;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            text-align: center;
        }

        /* Navigation Buttons */
        .nav-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 50%;
            font-size: 18px;
            z-index: 1;
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }
    </style>
</head>
<body>
    <!-- Carousel Container -->
    <div class="carousel">
        <div class="carousel-track">
            <?php
                // Sample data - you can replace this with data from your database
                $cards = [
                    ['title' => 'Card 1', 'content' => 'This is the first card.'],
                    ['title' => 'Card 2', 'content' => 'This is the second card.'],
                    ['title' => 'Card 3', 'content' => 'This is the third card.'],
                ];

                // Loop through the cards and generate each card
                foreach ($cards as $card) {
                    echo '<div class="card">';
                    echo '<h3>' . $card['title'] . '</h3>';
                    echo '<p>' . $card['content'] . '</p>';
                    echo '</div>';
                }
            ?>
        </div>
        <!-- Navigation Buttons -->
        <button class="nav-button prev">&#10094;</button>
        <button class="nav-button next">&#10095;</button>
    </div>

    <script>
        // JavaScript for Swiping Functionality
        const track = document.querySelector('.carousel-track');
        const cards = Array.from(track.children);
        const nextButton = document.querySelector('.next');
        const prevButton = document.querySelector('.prev');
        let currentIndex = 0;

        function updateSlidePosition() {
            const slideWidth = cards[0].getBoundingClientRect().width;
            track.style.transform = `translateX(-${slideWidth * currentIndex}px)`;
        }

        nextButton.addEventListener('click', () => {
            if (currentIndex < cards.length - 1) {
                currentIndex++;
                updateSlidePosition();
            }
        });

        prevButton.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                updateSlidePosition();
            }
        });

        // Swipe Functionality for Mobile Devices
        let startX;
        track.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
        });

        track.addEventListener('touchend', (e) => {
            const endX = e.changedTouches[0].clientX;
            if (startX > endX + 50 && currentIndex < cards.length - 1) {
                currentIndex++;
            } else if (startX < endX - 50 && currentIndex > 0) {
                currentIndex--;
            }
            updateSlidePosition();
        });
    </script>
</body>
</html>
