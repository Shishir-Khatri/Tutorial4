<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
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
            font-size: 14px;
        }
    </style>
</head>
<body>


<div class="container">


    <h2>Create an Account</h2>


    @if ($errors->any())
        <div class="error">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif


    <form action="{{ route('register.submit') }}" method="POST">
        @csrf


        <label>Name</label>
        <input
            type="text"
            name="name"
            value="{{ old('name') }}"
            required
        >


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


        <label>Confirm Password</label>
        <input
            type="password"
            name="password_confirmation"
            required
        >


        <button type="submit">Register</button>
    </form>


    <p>
        Already have an account?
        <a href="{{ route('login') }}">Login here</a>
    </p>


</div>


</body>
</html>