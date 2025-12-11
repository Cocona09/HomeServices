let currentQuestionIndex = 0;
const questionContainers = document.querySelectorAll('.question-container');
const addressSection = document.getElementById('address-section');
const userInfoSection = document.getElementById('user-info-section');
const prevButton = document.querySelector('.prev-button');
const nextButton = document.querySelector('.next-button');
const submitButton = document.querySelector('.submit-button');

// Display the current section
function showSection(index) {
    questionContainers.forEach((container, i) => {
        container.style.display = i === index ? 'block' : 'none';
    });

    if (index === questionContainers.length) {
        // Show address section
        addressSection.style.display = 'block';
        userInfoSection.style.display = 'none';
        nextButton.style.display = 'inline-block';
        nextButton.textContent = 'Дараах';
        nextButton.type = 'button';
        submitButton.style.display = 'none'; // Ensure submit button is hidden
    } else if (index === questionContainers.length + 1) {
        // Show user information section
        addressSection.style.display = 'none';
        userInfoSection.style.display = 'block';
        nextButton.style.display = 'none'; // Hide next button
        submitButton.style.display = 'inline-block';
    } else {
        // Default behavior for other sections
        addressSection.style.display = 'none';
        userInfoSection.style.display = 'none';
        nextButton.style.display = 'inline-block'; // Show next button again
        submitButton.style.display = 'none'; // Hide submit button
    }

    prevButton.disabled = index === 0; // Disable previous button on the first section
}

// Move to the previous section
prevButton.addEventListener('click', () => {
    if (currentQuestionIndex > 0) {
        currentQuestionIndex--;
        showSection(currentQuestionIndex);
    }
});

// Move to the next section
nextButton.addEventListener('click', () => {
    if (currentQuestionIndex <= questionContainers.length) {
        currentQuestionIndex++;
        showSection(currentQuestionIndex);
    }
});

// Ensure only one checkbox is selected per question
document.querySelectorAll('.question-container').forEach(container => {
    container.addEventListener('change', (e) => {
        const checkboxes = container.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(checkbox => {
            if (checkbox !== e.target) checkbox.checked = false;
        });
    });
});

// Initialize by showing the first section
showSection(currentQuestionIndex);
