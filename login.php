<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "dini" && $password == "12345") {
        $_SESSION['login'] = true;
        echo "<script>
                alert('Login berhasil! Selamat datang dini');
                window.location='index.php';
              </script>";
        exit();

    }else{
        echo "<script>
                alert('Username atau Password yang Anda masukkan salah!');
              </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            background-color: #0a192f; 
        }
        .card-custom, .input-custom {
            background-color: rgba(255, 255, 255, 0.05) !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            color: #ffffff !important;
        }
        .input-custom:focus {
            background-color: rgba(255, 255, 255, 0.1) !important;
            border-color: #0d6efd !important;
            box-shadow: none;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center min-vh-100 text-white">

<div class="card card-custom p-4 shadow-lg rounded-4" style="width: 100%; max-width: 400px;">
    
    <h1 class="h3 text-center fw-bold mb-1">Welcome</h1>
    <p class="text-center text-white-50 mb-4">Login untuk masuk ke Portfolio</p>
    <?php if(isset($error)) { ?>
        <div class="alert alert-danger text-center p-2 mb-3"><?php echo $error; ?></div>
    <?php } ?>

    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control input-custom" value="" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control input-custom" value="******" required>
        </div>

        <button type="submit" class="btn btn-primary w-100 mt-2 py-2 fw-semibold">Login</button>
    </form>

</div>

</body>
</html>