// app.js – Handles user interactions for AmareSync

document.addEventListener('DOMContentLoaded', () => {

    // --- Mood Form Logic ---
    // This section handles saving the user's mood selection.
    const moodForm = document.getElementById('moodForm');
    if (moodForm) {
        moodForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevents the form from submitting and reloading the page

            const mood = document.querySelector('input[name="mood"]:checked');

            if (mood) {
                // Get existing mood data or initialize an empty object
                let moods = JSON.parse(localStorage.getItem('moodEntries') || '{}');
                
                // Increment the count for the selected mood
                moods[mood.value] = (moods[mood.value] || 0) + 1;
                
                // Save the updated data back to local storage
                localStorage.setItem('moodEntries', JSON.stringify(moods));
                
                alert('Mood saved successfully!');
            } else {
                alert('Please select a mood before saving.');
            }
        });
    }

    // --- Join Form Logic ---
    // This section handles the user joining the service.
    const joinForm = document.getElementById("joinForm");
    if (joinForm) {
        joinForm.addEventListener("submit", function (e) {
            e.preventDefault(); // Prevent page reload
            
            alert("Thank you for joining AmareSync!");
            
            const joinModal = document.getElementById("joinModal");
            if (joinModal) {
                joinModal.style.display = "none";
            }
            
            this.reset(); // Clear the form fields
        });
    }

    // --- Pop-up Modal Logic ---
    // This section handles showing and hiding the mood pop-up.
    const saveButton = document.querySelector('.mood-input button');
    const popup = document.getElementById('moodPopup');
    const closeButton = document.getElementById('closePopupBtn');
    
    if (saveButton && popup && closeButton) {
        // Show the pop-up when the save button is clicked
        saveButton.addEventListener('click', () => {
            popup.style.display = 'flex';
        });

        // Hide the pop-up when the close button is clicked
        closeButton.addEventListener('click', () => {
            popup.style.display = 'none';
        });
    }
});