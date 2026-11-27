<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>


    <h1>Welcome to Your Dashboard!</h1>


    <h2>Hello, {{ Auth::user()->name }}</h2>


    <p>Email: {{ Auth::user()->email }}</p>


    <p>
        Your role:
        <strong>{{ Auth::user()->role }}</strong>
    </p>


    @if (Auth::user()->role === 'admin')
        <p>
            <a href="{{ route('admin.dashboard') }}">
                Go to Admin Dashboard
            </a>
        </p>
    @endif


    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>


</body>
</html>