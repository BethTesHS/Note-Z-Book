
// JavaScript for Swiping Functionality
    const track = document.querySelector('.books');
    const cards = Array.from(track.children);
    let currentIndex = 0;

    function updateSlidePosition() {
        const slideWidth = cards[0].getBoundingClientRect().width + 0;
        track.style.transform = `translateX(-${(slideWidth * currentIndex)}px)`;
    }

    window.next = function(){
        if (currentIndex < cards.length - 1) {
            currentIndex++;
            updateSlidePosition();
        }
    }

    window.prev = function(){
        if (currentIndex > 0) {
            currentIndex--;
            updateSlidePosition();
        }
    }

// Swipe Functionality for Mobile Devices
    // let start;
    // track.addEventListener('touchstart', (e) => {
    //     start = e.touches[0].clientX;
    // });

    // track.addEventListener('touchend', (e) => {
    //     const end = e.changedTouches[0].clientX;
    //     if (start > end + 50 && currentIndex < cards.length - 1) {
    //         currentIndex++;
    //     } else if (start < end - 50 && currentIndex > 0) {
    //         currentIndex--;
    //     }
    //     updateSlidePosition();
    // });
