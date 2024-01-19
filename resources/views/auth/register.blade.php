@extends('layouts.customer.index')

@section('content')
<main id="main">
    <!-- Section: Design Block -->
    <section class="">
        <!-- Jumbotron -->
        <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
            <div class="container">
                <div class="row gx-lg-5 align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <img src="{{ asset('customer') }}/register.jpg" class="img-fluid" alt="Phone image">
                    </div>

                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="card">
                            <div class="card-body py-5 px-md-5">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-12 mb-4">
                                            <div class="form-outline">
                                                <input type="text" id="form3Example1" class="form-control" name="name" required autocomplete="new-password"/>
                                                <label class="form-label" for="form3Example1">Full Name</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <input type="email" id="form3Example3" class="form-control" name="email" required autocomplete="new-password"/>
                                        <label class="form-label" for="form3Example3">Email address</label>
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <input type="password" id="password" type="password" class="form-control  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"/>
                                        <label class="form-label" for="form3Example4">Password</label>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input id="password-confirm" type="password" name="password_confirmation" class="form-control" required autocomplete="new-password"/>
                                        <label class="form-label" for="form3Example4">Password Confirm</label>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Submit button -->
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary btn-block mb-4">
                                            Sign up
                                        </button>
                                    </div>

                                    <!-- Register buttons -->
                                    <div class="text-center">
                                        <p>or sign up with:</p>
                                    </div>
                                    <div class="row d-flex justify-content-center align-items-center h-100">
                                        <div class="col-12 col-md-8 col-lg-12 col-xl-12 d-flex justify-content-center">
                                            <button class="btn btn-lg btn-block btn-primary"
                                                style="background-color: #dd4b39; font-size: 15px;" type="button"><i
                                                    class="fab fa-google me-2"></i> Sign in with google</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumbotron -->
    </section>
    <!-- Section: Design Block -->

    <!-- End Contact Section -->

</main>
@endsection
