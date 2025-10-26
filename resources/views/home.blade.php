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
      background: linear-gradient(135deg, #6366f1, #4f46e5);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .card {
      border: none;
      border-radius: 1rem;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>
  <div class="card p-4" style="width: 100%; max-width: 400px;">
    <div class="text-center mb-4">
      <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" width="50" alt="Logo">
      <h4 class="mt-3 fw-bold text-primary">Sistem Buku</h4>
      <p class="text-muted mb-0">Silakan login ke akun Anda</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="mb-3">
        <label for="email" class="form-label">Alamat Email</label>
        <input type="email" name="email" id="email" class="form-control" required autofocus>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Kata Sandi</label>
        <input type="password" name="password" id="password" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-primary w-100">Masuk</button>

      <div class="text-center mt-3">
        <a href="{{ route('password.request') }}" class="text-decoration-none text-secondary">Lupa password?</a>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
