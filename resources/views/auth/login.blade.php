<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
            padding: 40px;
        }


        .container {
            max-width: 400px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
        }


        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;
            box-sizing: border-box;
        }


        button {
            padding: 10px 20px;
            background: #2563eb;
            color: white;
            border: none;
            cursor: pointer;
        }


        .error {
            color: red;
        }
    </style>
</head>
<body>


<div class="container">


    <h2>Login</h2>


    @if ($errors->any())
        <div class="error">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif


    <form action="{{ route('login.submit') }}" method="POST">
        @csrf


        <label>Email</label>
        <input
            type="email"
            name="email"
            value="{{ old('email') }}"
            required
        >


        <label>Password</label>
        <input
            type="password"
            name="password"
            required
        >


        <button type="submit">Login</button>
    </form>


    <p>
        Don't have an account?
        <a href="{{ route('register') }}">Register here</a>
    </p>


</div>


</body>
</html>