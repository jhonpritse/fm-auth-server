let attempts = 0;

document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    if (attempts >= 3) {
        alert('You have reached the maximum number of login attempts.');
        return;
    }

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    fetch('/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ username, password }),
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = '/nextPage';
            } else {
                attempts++;
                alert('Invalid credentials. Please try again.');
            }
        });
});