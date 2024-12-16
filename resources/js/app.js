const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

const passportToken = 'YOUR_TEST_TOKEN';  

document.getElementById('demoButton').addEventListener('click', () => {
    fetch('/api/demo', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
            'Authorization': `Bearer ${passportToken}`
        },
        body: JSON.stringify({
            // Your request payload
        })
    })
    .then(response => response.json())
    .then(data => {
        console.log('Response Data:', data);
        console.log('CSRF Token:', data.csrf_token);
        console.log('Passport Token:', data.passport_token);
        console.log('Tokens are the same:', data.tokens_are_same);
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
