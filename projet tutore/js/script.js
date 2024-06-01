const images = document.querySelectorAll('.slide  img');
// const colorDiv = document.querySelector('.color-div');

window.onload = function() {
  images.forEach(image => {
    const colorDiv = image.parentElement;
    // Create a Color Thief object
    const colorThief = new ColorThief();
  
    // Get the dominant color from the image
    const dominantColor = colorThief.getPalette(image, 2)[0];
  
    // Convert the RGB values to a CSS color string
    const rgbDominantColor = `rgb(${dominantColor[0]}, ${dominantColor[1]}, ${dominantColor[2]})`;
  
    // Get a secondary color from the image (e.g., 2nd most dominant color)
    const secondaryColor = colorThief.getPalette(image, 2)[1];
    console.log(secondaryColor)
    const rgbSecondaryColor = `rgb(${secondaryColor[0]}, ${secondaryColor[1]}, ${secondaryColor[2]})`;
  
    // Create a linear gradient using the dominant and secondary colors
    // const gradient = `linear-gradient(to right, ${rgbDominantColor}, ${rgbSecondaryColor})`;
    // const gradient = `linear-gradient(to bottom, ${rgbDominantColor}, ${rgbSecondaryColor})`;
    const gradient = `linear-gradient(45deg, ${rgbDominantColor}, ${rgbSecondaryColor})`;
    
  
    // Set the background image of the color div to the gradient
    colorDiv.style.backgroundImage = gradient;
    colorDiv.style.blur = 0.5;
});
}
