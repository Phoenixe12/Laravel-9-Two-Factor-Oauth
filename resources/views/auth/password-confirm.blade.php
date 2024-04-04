@include('layouts.auth-layout.auth-header')
<!-- Content -->
@if (session('status'))
    <div class="toastrDefaultSuccess" role="alert" style="display: none;">
        {{ session('status') }}
    </div>
@endif



<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
            <!-- Forgot Password -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <a href="index.html" class="app-brand-link gap-2">
                            <span class="app-brand-logo fw-bolder fs-3">
                                Confirm Password🔒
                            </span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-2"></h4>
                    <p class="mb-4">Please confirm your password before continuing.</p>
                    <form id="formAuthentication" class="mb-3" method="POST"
                        action="{{ route('password.confirm') }}">
                        @csrf
                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="password">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password">
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
                        <button type="submit" class="btn btn-primary d-grid w-100"
                            style=" background:#566a7f;color:#fff; border-color:#566a7f;">Confirm Password</button>
                    </form>
                    <div class="text-center">

                    </div>
                </div>
            </div>
            <!-- /Forgot Password -->
        </div>
    </div>
</div>


<!-- /.modal -->
<!-- / Content -->
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
