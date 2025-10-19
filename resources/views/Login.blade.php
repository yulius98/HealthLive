<x-leandingpage>
    <style>
        .login-container {
            background: linear-gradient(135deg, rgb(241, 239, 238) 0%, #f8f9fa 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
            position: relative;
        }

        .btn-back {
            background: rgba(255, 255, 255, 0.9);
            border: 2px solid #12452c;
            color: #12452c;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            height: 54px;
            font-size: 1rem;
        }

        .btn-back:hover {
            background: #12452c;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(18, 69, 44, 0.3);
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            overflow: hidden;
            max-width: 450px;
            width: 100%;
        }

        .login-header {
            background: linear-gradient(135deg, #12452c 0%, rgb(11, 76, 3) 100%);
            color: white;
            padding: 2.5rem 2rem 2rem;
            text-align: center;
            position: relative;
        }

        .login-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="white" opacity="0.1"><animate attributeName="opacity" values="0.1;0.3;0.1" dur="2s" repeatCount="indefinite"/></circle><circle cx="80" cy="30" r="1.5" fill="white" opacity="0.1"><animate attributeName="opacity" values="0.1;0.4;0.1" dur="3s" repeatCount="indefinite"/></circle><circle cx="40" cy="70" r="1" fill="white" opacity="0.1"><animate attributeName="opacity" values="0.1;0.5;0.1" dur="2.5s" repeatCount="indefinite"/></circle></svg>');
        }

        .health-icon {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.8rem;
        }

        .login-title {
            font-size: 2rem;
            font-weight: 700;
            margin: 0;
            position: relative;
        }

        .login-subtitle {
            opacity: 0.9;
            margin-top: 0.5rem;
            font-weight: 400;
        }

        .login-form {
            padding: 2.5rem 2rem;
        }

        .form-floating {
            margin-bottom: 1.5rem;
        }

        .form-floating > .form-control {
            height: 58px;
            border: 2px solid #e9ecef;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .form-floating > .form-control:focus {
            border-color: #12452c;
            box-shadow: 0 0 0 0.2rem rgba(18, 69, 44, 0.15);
            background: white;
        }

        .form-floating > label {
            color: #6c757d;
            font-weight: 500;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #6c757d;
            cursor: pointer;
            font-size: 1.1rem;
            z-index: 10;
        }

        .btn-login {
            background: #12452c;
            border: none;
            border-radius: 50px;
            height: 54px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            color: white;
        }

        .btn-login:hover {
            background: #1f29b4;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(41, 55, 240, 0.3);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .button-group {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .button-group .btn {
            flex: 1;
        }

        .forgot-password {
            color: #12452c;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .forgot-password:hover {
            color: #2937f0;
            text-decoration: underline;
        }

        .alert-modern {
            border: none;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            padding: 1rem 1.25rem;
            font-weight: 500;
        }

        .alert-danger.alert-modern {
            background: rgba(220, 53, 69, 0.1);
            color: #dc3545;
            border-left: 4px solid #dc3545;
        }

        .alert-success.alert-modern {
            background: rgba(25, 135, 84, 0.1);
            color: #198754;
            border-left: 4px solid #198754;
        }

        .register-link {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e9ecef;
            color: #6c757d;
        }

        .register-link a {
            color: #12452c;
            text-decoration: none;
            font-weight: 600;
        }

        .register-link a:hover {
            color: #2937f0;
        }

        .admin-info {
            background: rgba(248, 249, 250, 0.8);
            border-radius: 15px;
            padding: 1.5rem;
            margin-top: 1.5rem;
            border: 1px solid #e9ecef;
            text-align: center;
        }

        .admin-info-title {
            color: #12452c;
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .admin-info-content {
            color: #6c757d;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .admin-contact {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            margin-top: 1rem;
        }

        .contact-item {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            background: white;
            border-radius: 10px;
            border: 1px solid #e9ecef;
            color: #495057;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .contact-item:hover {
            background: #12452c;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(18, 69, 44, 0.2);
            text-decoration: none;
        }

        .contact-item i {
            font-size: 1.1rem;
        }

        .divider {
            height: 1px;
            background: linear-gradient(to right, transparent, #e9ecef, transparent);
            margin: 1.5rem 0;
        }

            @media (max-width: 576px) {
            .login-container {
                padding: 1rem;
            }

            .button-group {
                flex-direction: column;
                gap: 0.75rem;
            }

            .btn-back, .btn-login {
                height: 48px;
                font-size: 0.9rem;
            }

            .login-header {
                padding: 2rem 1.5rem 1.5rem;
            }

            .login-form {
                padding: 2rem 1.5rem;
            }

            .login-title {
                font-size: 1.75rem;
            }

            .admin-contact {
                gap: 0.5rem;
            }

            .contact-item {
                padding: 0.6rem 0.8rem;
                font-size: 0.9rem;
            }

            .admin-info {
                padding: 1.25rem;
            }
        }
    </style>

    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="health-icon">
                    <i class="bi bi-heart-pulse"></i>
                </div>
                <h1 class="login-title">Healthty Life</h1>
                <p class="login-subtitle">Masuk ke akun Anda</p>
            </div>

            <div class="login-form">
                @if ($errors->any())
                    <div class="alert alert-danger alert-modern">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        <strong>Terjadi kesalahan:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('status'))
                    <div class="alert alert-success alert-modern">
                        <i class="bi bi-check-circle me-2"></i>
                        {{ session('status') }}
                    </div>
                @endif

                <form action="Login" method="POST" class="needs-validation" novalidate>
                    @csrf

                    <div class="form-floating">
                        <input type="email"
                               name="email"
                               id="email"
                               class="form-control"
                               placeholder="name@example.com"
                               autocomplete="email"
                               required
                               autofocus
                               value="{{ old('email') }}">
                        <label for="email">
                            <i class="bi bi-envelope me-2"></i>Alamat Email
                        </label>
                        <div class="invalid-feedback">
                            Silakan masukkan alamat email yang valid.
                        </div>
                    </div>

                    <div class="form-floating position-relative">
                        <input type="password"
                               name="password"
                               id="password"
                               class="form-control"
                               placeholder="Password"
                               autocomplete="current-password"
                               required>
                        <label for="password">
                            <i class="bi bi-lock me-2"></i>Kata Sandi
                        </label>
                        <button type="button" class="password-toggle" onclick="togglePassword()">
                            <i class="bi bi-eye" id="toggleIcon"></i>
                        </button>
                        <div class="invalid-feedback">
                            Silakan masukkan kata sandi Anda.
                        </div>
                    </div>

                    <div class="button-group">
                        <a href="{{ route('home') }}" class="btn btn-back">
                            <i class="bi bi-arrow-left me-2"></i>
                            Kembali ke Home
                        </a>

                        <button type="submit" class="btn btn-primary btn-login">
                            <i class="bi bi-box-arrow-in-right me-2"></i>
                            Masuk
                        </button>
                    </div>
                </form>

                <div class="divider"></div>

                <div class="admin-info">
                    <div class="admin-info-title">
                        <i class="bi bi-info-circle"></i>
                        Butuh Bantuan?
                    </div>
                    <div class="admin-info-content">
                        Untuk pendaftaran akun baru atau lupa kata sandi, silakan hubungi admin kami melalui:
                    </div>
                    <div class="admin-contact">
                        <a href="https://wa.me/+6282141609391" target="_blank" class="contact-item">
                            <i class="bi bi-whatsapp"></i>
                            WhatsApp Admin
                        </a>
                        <a href="mailto:admin@healthlife.com" class="contact-item">
                            <i class="bi bi-envelope"></i>
                            Email Admin
                        </a>
                        <div class="contact-item" style="cursor: default; background: #f8f9fa;">
                            <i class="bi bi-telephone"></i>
                            <span>+62 821-4160-9391</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('bi-eye');
                toggleIcon.classList.add('bi-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('bi-eye-slash');
                toggleIcon.classList.add('bi-eye');
            }
        }

        // Form validation
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</x-leandingpage>
