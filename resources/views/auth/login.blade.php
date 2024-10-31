@extends('layouts.layout')

@section('content')
<!-- Section: Design Block -->
<section class="text-center text-lg-start">
  <style>
    .rounded-t-5 {
      border-top-left-radius: 0.5rem;
      border-top-right-radius: 0.5rem;
    }

    @media (min-width: 992px) {
      .rounded-tr-lg-0 {
        border-top-right-radius: 0;
      }

      .rounded-bl-lg-5 {
        border-bottom-left-radius: 0.5rem;
      }
    }
  </style>
  <div class="card mb-3">
    <div class="row g-0 d-flex align-items-center">
      <div class="col-lg-4 d-none d-lg-flex">
        <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" alt="Trendy Pants and Shoes"
          class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
      </div>
      <div class="col-lg-8">
        <div class="card-body py-5 px-md-5">

          <form method="POST" action="{{ route('login') }}">
            @csrf <!-- Protection CSRF -->

            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus autocomplete="username" />
              <label class="form-label" for="email">Email address</label>

              <!-- Error message for email -->
              @error('email')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <!-- Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <input type="password" id="password" name="password" class="form-control" required autocomplete="current-password" />
              <label class="form-label" for="password">Password</label>

              <!-- Error message for password -->
              @error('password')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
              <div class="col d-flex justify-content-center">
                <!-- Checkbox -->
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember_me" />
                  <label class="form-check-label" for="remember_me"> Remember me </label>
                </div>
              </div>

              <div class="col">
                <!-- Forgot password -->
                @if (Route::has('password.request'))
                  <a href="{{ route('password.request') }}">Forgot password?</a>
                @endif
              </div>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

          </form>

        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->
@endsection
