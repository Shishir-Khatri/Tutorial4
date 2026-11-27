<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>


    <h1>Welcome to the Admin Dashboard</h1>


    <p>
        Hello, {{ Auth::user()->name }}!
    </p>


    <p>
        You have administrator privileges.
    </p>


    <p>
        Only users with the admin role can access this page.
    </p>


    <a href="{{ route('dashboard') }}">
        Back to Dashboard
    </a>


</body>
</html>