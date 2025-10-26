<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lupa Password - Sistem Buku</title>

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
    .forgot-box {
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
  <div class="forgot-box">
    <div class="text-center mb-4">
      <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" width="50" alt="Logo">
      <h4 class="fw-bold text-primary mt-3">Reset Password</h4>
      <p class="text-muted small mb-0">Masukkan email Anda untuk menerima link reset password.</p>
    </div>

    <form method="POST" action="{{ route('password.email') }}">
      @csrf

      <div class="mb-3">
        <label for="email" class="form-label">Alamat Email</label>
        <input id="email" name="email" type="email" value="{{ old('email') }}" class="form-control" required autofocus>
      </div>

      <button type="submit" class="btn btn-primary w-100">Kirim Link Reset</button>

      @if (session('status'))
        <div class="alert alert-success mt-3 small">
          {{ session('status') }}
        </div>
      @endif

      @if ($errors->any())
        <div class="alert alert-danger mt-3 small">
          {{ $errors->first() }}
        </div>
      @endif
    </form>

    <p class="text-center mt-4 mb-0 small text-muted">
      Sudah ingat password? 
      <a href="{{ route('login') }}" class="text-decoration-none text-primary fw-semibold">Kembali ke Login</a>
    </p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
