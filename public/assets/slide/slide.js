let currentPanel = 1;
const totalPanels = 4; // Total number of panels

// Function to change panel direction
function changePanel(direction) {
    currentPanel += direction;

    if (currentPanel < 1) {
        currentPanel = totalPanels;
    } else if (currentPanel > totalPanels) {
        currentPanel = 1;
    }

    updateCarousel();
}

// Function to update the carousel display
function updateCarousel() {
    const carousel = document.getElementById('carousel');
    const panelContainer = document.querySelector('.carousel-container');
    const containerWidth = panelContainer.clientWidth; // Get the width of the container
    const translateValue = -containerWidth * (currentPanel - 1);
    carousel.style.transform = `translateX(${translateValue}px)`;
}

// Auto slide the carousel
setInterval(() => {
    changePanel(1); // Change panel to the next one
}, 3000); // Change slide every 3 seconds (adjust as needed)

// Call the updateCarousel function initially to ensure the carousel starts correctly
updateCarousel();
