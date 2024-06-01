const image = document.querySelector('.image-container img');
const colorDiv = document.querySelector('.color-div');

image.onload = function() {
    // Get the dominant color from the image
    const dominantColor = getDominantColor(image);

    // Set the background color of the color div
    colorDiv.style.backgroundColor = dominantColor;
};

function getDominantColor(image) {
    // Function to extract the dominant color from the image (implementation depends on the chosen library or method)
    // For example, using the "Color Thief" library:
    const colorThief = new ColorThief();
    const dominantColor = colorThief.getDominantColor(image);
    // console.log(dominantColor[0])
    return `rgb(${dominantColor[0]}, ${dominantColor[1]}, ${dominantColor[2]})`;
}
