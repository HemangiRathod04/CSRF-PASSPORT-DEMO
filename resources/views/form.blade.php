<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CSRF and Passport Demo</title>
</head>
<body>
    <form id="csrf-form">
        <input type="text" name="data" placeholder="Enter data">
        <button type="submit">Submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.getElementById('csrf-form').addEventListener('submit', function (event) {
            event.preventDefault();

            axios.post('/api/endpoint', {
                data: document.querySelector('input[name="data"]').value
            }, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Authorization': `Bearer ${localStorage.getItem('token')}`
                }
            }).then(response => {
                console.log(response.data);
            }).catch(error => {
                console.error(error);
            });
        });
    </script>
</body>
</html>
