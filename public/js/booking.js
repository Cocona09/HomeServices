let currentQuestionIndex = 0;
const questionContainers = document.querySelectorAll('.question-container');
const totalQuestions = questionContainers.length;
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

    if (index === totalQuestions) {
        // Show address section
        addressSection.style.display = 'block';
        userInfoSection.style.display = 'none';
        nextButton.style.display = 'inline-block';
        nextButton.textContent = 'Дараах';
        submitButton.style.display = 'none';
    } else if (index === totalQuestions + 1) {
        // Show user information section
        addressSection.style.display = 'none';
        userInfoSection.style.display = 'block';
        nextButton.style.display = 'none';
        submitButton.style.display = 'inline-block';
    } else {
        // Default behavior for question sections
        addressSection.style.display = 'none';
        userInfoSection.style.display = 'none';
        nextButton.style.display = 'inline-block';
        submitButton.style.display = 'none';
    }

    prevButton.disabled = index === 0;

    // Update next button text for last question
    if (index === totalQuestions - 1) {
        nextButton.textContent = 'Хаяг руу шилжих';
    } else if (index < totalQuestions - 1) {
        nextButton.textContent = 'Дараах';
    }
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
    // Check if current question has an answer selected
    if (currentQuestionIndex < totalQuestions) {
        const currentContainer = questionContainers[currentQuestionIndex];
        const hasAnswer = currentContainer.querySelector('input[type="checkbox"]:checked');

        if (!hasAnswer) {
            alert('Та хариултаа сонгоно уу!');
            return;
        }
    }

    // Check if address is filled when moving to user info
    if (currentQuestionIndex === totalQuestions) {
        const addressInput = document.querySelector('input[name="address"]');
        if (!addressInput.value.trim()) {
            alert('Та хаягаа оруулна уу!');
            addressInput.focus();
            return;
        }
    }

    if (currentQuestionIndex <= totalQuestions + 1) {
        currentQuestionIndex++;
        showSection(currentQuestionIndex);
    }
});

// Ensure only one checkbox is selected per question
document.querySelectorAll('.question-container').forEach(container => {
    container.addEventListener('change', (e) => {
        if (e.target.type === 'checkbox') {
            const checkboxes = container.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(checkbox => {
                if (checkbox !== e.target) checkbox.checked = false;
            });
        }
    });
});

// Form validation before submission
document.getElementById('order-form').addEventListener('submit', function(e) {
    const nameInput = document.querySelector('input[name="user_name"]');
    const emailInput = document.querySelector('input[name="user_email"]');
    const phoneInput = document.querySelector('input[name="user_phone"]');

    if (!nameInput.value.trim() || !emailInput.value.trim() || !phoneInput.value.trim()) {
        e.preventDefault();
        alert('Бүх шаардлагатай мэдээллээ оруулна уу!');
        return;
    }

    // Email validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(emailInput.value)) {
        e.preventDefault();
        alert('Зөв имэйл хаяг оруулна уу!');
        emailInput.focus();
        return;
    }

    // Show loading state on submit button
    submitButton.innerHTML = '<span class="loading-spinner"></span> Боловсруулж байна...';
    submitButton.disabled = true;
});

// Initialize by showing the first section
showSection(currentQuestionIndex);
