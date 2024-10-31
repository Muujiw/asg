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

          <form method="POST" action="{{ route('register') }}">
            @csrf <!-- Protection CSRF -->

            <!-- Prénom input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <input type="text" id="prenom" name="prenom" class="form-control" value="{{ old('prenom') }}" required autofocus />
              <label class="form-label" for="prenom">Prénom</label>

              <!-- Error message for prenom -->
              @error('prenom')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <!-- Nom input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <input type="text" id="nom" name="nom" class="form-control" value="{{ old('nom') }}" required />
              <label class="form-label" for="nom">Nom</label>

              <!-- Error message for nom -->
              @error('nom')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required />
              <label class="form-label" for="email">Email address</label>

              <!-- Error message for email -->
              @error('email')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <!-- Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <input type="password" id="password" name="password" class="form-control" required autocomplete="new-password" />
              <label class="form-label" for="password">Password</label>

              <!-- Error message for password -->
              @error('password')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <!-- Confirm Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required autocomplete="new-password" />
              <label class="form-label" for="password_confirmation">Confirm Password</label>
            </div>

            <!-- Remember me -->
            <div class="form-check mb-4">
              <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
              <label class="form-check-label" for="remember_me">
                Remember Me
              </label>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Register</button>

          </form>

        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->
@endsection
