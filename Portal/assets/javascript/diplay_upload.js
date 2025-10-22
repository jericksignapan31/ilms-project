// Display uploaded image preview
function loadFile(event) {
    const imageDisplay = document.getElementById('imageDisplay');
    const file = event.target.files[0];
    
    if (file) {
        // Check if file is an image
        if (!file.type.match('image.*')) {
            alert('Please select an image file (PNG or JPEG)');
            event.target.value = '';
            return;
        }
        
        // Check file size (max 5MB)
        if (file.size > 5 * 1024 * 1024) {
            alert('File size must be less than 5MB');
            event.target.value = '';
            return;
        }
        
        // Display preview
        const reader = new FileReader();
        reader.onload = function(e) {
            imageDisplay.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
}
