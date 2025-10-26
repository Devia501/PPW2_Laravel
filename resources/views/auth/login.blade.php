<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Sistem Buku</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(to right, #6366f1, #4f46e5);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .login-box {
      background-color: white;
      border-radius: 10px;
      padding: 2rem;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 380px;
    }
  </style>
</head>
<body>

  <div class="login-box">
    <div class="text-center mb-4">
      <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" width="50" alt="Logo">
      <h4 class="fw-bold text-primary mt-3">Masuk ke Akun Anda</h4>
    </div>

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="mb-3">
        <label for="email" class="form-label">Alamat Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control" required autofocus>
      </div>

      <div class="mb-3">
        <div class="d-flex justify-content-between align-items-center">
          <label for="password" class="form-label">Kata Sandi</label>
          <a href="{{ route('password.request') }}" class="text-decoration-none small text-primary">Lupa password?</a>
        </div>
        <input id="password" type="password" name="password" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-primary w-100">Masuk</button>

      @if ($errors->any())
        <div class="alert alert-danger mt-3 py-2 small">
          {{ $errors->first() }}
        </div>
      @endif
    </form>

    <p class="text-center mt-4 mb-0 small text-muted">
      Belum punya akun? 
      <a href="{{ route('register') }}" class="text-decoration-none text-primary fw-semibold">Daftar Sekarang</a>
    </p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
