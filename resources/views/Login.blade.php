<x-leandingpage>
    <div class="container min-vh-100 d-flex flex-column justify-content-center py-5">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-8 col-lg-5 text-center">
                
                <h2 class="mb-4 fw-bold text-dark">Login</h2>
                <form action="Login" method="POST" class="needs-validation" novalidate>
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger text-start">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error )
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success text-center">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="mb-3 text-start">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" id="email" autocomplete="email" required class="form-control" placeholder="Enter your email" autofocus>
                        <div class="invalid-feedback">
                            Please enter a valid email.
                        </div>
                    </div>
                    <div class="mb-3 text-start">
                        <div class="d-flex justify-content-between align-items-center">
                            <label for="password" class="form-label fw-semibold mb-0">Password</label>
                            <a href="/forgot-password" class="link-secondary small">Change/Forgot password?</a>
                        </div>
                        <input type="password" name="password" id="password" autocomplete="current-password" required class="form-control" placeholder="Enter your password">
                        <div class="invalid-feedback">
                            Please enter your password.
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary w-100 fw-semibold">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-leandingpage>
