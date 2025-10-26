<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Akun Baru - Sistem Buku</title>

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
    .register-box {
      background-color: white;
      border-radius: 10px;
      padding: 2rem;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>

<body>
  <div class="register-box">
    <div class="text-center mb-4">
      <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" width="50" alt="Logo">
      <h4 class="fw-bold text-primary mt-3">Buat Akun Baru</h4>
    </div>

    <form method="POST" action="{{ route('register') }}">
      @csrf

      <div class="mb-3">
        <label for="name" class="form-label">Nama Lengkap</label>
        <input id="name" name="name" type="text" value="{{ old('name') }}" class="form-control" required autofocus>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Alamat Email</label>
        <input id="email" name="email" type="email" value="{{ old('email') }}" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Kata Sandi</label>
        <input id="password" name="password" type="password" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-primary w-100">Daftar</button>

      @if ($errors->any())
        <div class="alert alert-danger mt-3 small">
          {{ $errors->first() }}
        </div>
      @endif
    </form>

    <p class="text-center mt-4 mb-0 small text-muted">
      Sudah punya akun?
      <a href="{{ route('login') }}" class="text-decoration-none text-primary fw-semibold">Login di sini</a>
    </p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
