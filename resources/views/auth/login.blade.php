<!DOCTYPE html>
<html>
    <head>
        <title>Bestone - HRMS</title>
        <link rel="stylesheet" href="{{ asset('assets/customCSS/custom.css') }}">
    </head>
    <body class="bodybg" style="background-image: url({{ asset('assets/customIMG') }}/bgimage.jpg);">
        <div class="formbody">
            <img class="logologin" src="{{ asset('assets/customIMG') }}/logologin.png" alt="logo">
            <div class="box">
                <span class="borderLine"></span>
                
                <form method="POST" action="{{ url('/checkAuth') }}">
                    @csrf
                    <p>Welcome back! Log in to your account.</p>
                    <div class="inputBox">
                        <label>Email / Employee Code:</label>
                        <input type="text" name="userInput" placeholder="Enter your email or employee code" value="{{ old('userInput') }}" required>
                        <i></i>
                        @error('userInput')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="inputBox">
                        <label>Password:</label>
                        <input type="password" name="password" required placeholder="Enter your password" value="{{ old('password') }}" required>
                        <i></i>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="submit" id="submit" value="LOGIN">
                </form>
            </div>
        </div>
    </body>
</html>