<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Login</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Custom CSS -->
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #15d141, #fffccc);
        }

        .login-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-box {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 400px;
            width: 100%;
        }

        .login-box h2 {
            margin-bottom: 30px;
            font-weight: bold;
            color: #15d141;
            text-align: center;
        }

        .login-box .form-control {
            margin-bottom: 20px;
            border-radius: 30px;
            height: 45px;
            padding: 10px 20px;
        }

        .login-box .btn-primary {
            width: 100%;
            padding: 12px;
            border-radius: 30px;
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            border: none;
        }

        .login-box .btn-primary:hover {
            background: linear-gradient(135deg, #5b78e1, #9167c9);
        }

        .login-box .field label {
            font-weight: bold;
        }

        @media (max-width: 576px) {
            .login-box {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="login-box">
        <h2>Sign in to Admin Panel</h2>
        <form id="admin-login" method="POST" action="{{route('admin.login-submit')}}">
            @csrf
            <div class="form-group field">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="form-group field">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Continue</button>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
