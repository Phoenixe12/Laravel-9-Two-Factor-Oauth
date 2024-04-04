@include('layouts.auth-layout.auth-header')
    <!-- Content -->
   <!-- Content -->
@if (session('status'))
<div class="toastrDefaultSuccess" role="alert" style="display: none;">
    {{ session('status') }}
</div>
@endif

@if (!session('status'))
<div class="toastrDefaultError" role="alert" style="display: none;">
    Connection problem
</div>
@endif

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="index.html" class="app-brand-link gap-2">
                                <span class="app-brand-logo fw-bolder fs-3" >
                                    ADMIN
                                </span>
                                <span class="app-brand-text demo text-body "></span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2">Welcome to WholeOrder! 👋</h4>
                        <p class="mb-4">
                            Please only admins are authorized to have access to this page
                        </p>
                        <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"
                                    placeholder="Enter your email " autofocus />
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        <small>Forgot Password?</small>
                                    </a>
                                    @endif
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <span class="input-group-text cursor-pointer">
                                        <i class="bx bx-hide"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                                    <label class="form-check-label" for="remember-me">
                                        Remember Me</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100"  type="submit" style=" background:#566a7f;color:#fff; border-color:#566a7f;">
                                    Sign in
                                </button>
                            </div>
                        </form>
                        <p class="text-center">
                            <span>You forgot your password ?</span>
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                <small>click here</small>
                            </a>
                            @endif
                        </p>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>

 @include('layouts.auth-layout.auth-footer')
 <script>
    $(function() {
        $('.toastrDefaultSuccess').each(function() {
            toastr.success($(this).text());
        });
    });


</script>
<script>
    window.addEventListener('online', function() {
        toastr.success('Internet connection restored.');
    });

    window.addEventListener('offline', function() {
        toastr.error('Internet connection lost.');
    });
</script>
