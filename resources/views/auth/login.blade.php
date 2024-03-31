@extends('frontend.layouts.frontend-master')
@section('title', 'login your account')
@section('main')
    <div class="contact-page">
        <div class="container">

            {{-- <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="contact-wrpp">
                        <h4 class="contactAddess-title text-center">
                            Login </h4>
                        <div role="form" class="wpcf7" id="wpcf7-f437-o1" lang="en-US" dir="ltr">
                            <div class="screen-reader-response">
                                <p role="status" aria-live="polite" aria-atomic="true"></p>
                                <ul></ul>
                            </div>
                            <form action=" " method="post" class="wpcf7-form init" enctype="multipart/form-data"
                                novalidate="novalidate" data-status="init">
                                <div style="display: none;">

                                </div>

                                <div class="main_section">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="contact-title ">
                                                Email *
                                            </div>
                                            <div class="contact-form">
                                                <span class="wpcf7-form-control-wrap sub_title"><input type="text"
                                                        name="sub_title" value="" size="40"
                                                        class="wpcf7-form-control wpcf7-text" aria-invalid="false"
                                                        placeholder="Email"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="contact-title ">
                                                Password *
                                            </div>
                                            <div class="contact-form">
                                                <span class="wpcf7-form-control-wrap sub_title"><input type="text"
                                                        name="sub_title" value="" size="40"
                                                        class="wpcf7-form-control wpcf7-text" aria-invalid="false"
                                                        placeholder="Password"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="contact-btn">
                                                <input type="submit" value="Login Now"
                                                    class="wpcf7-form-control has-spinner wpcf7-submit"><span
                                                    class="wpcf7-spinner"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wpcf7-response-output" aria-hidden="true"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="row g-4 align-items-center mx-auto shadow p-3 mt-3 mb-4">
                <div class="col-lg-5">
                    <img src="https://img.freepik.com/free-vector/two-factor-authentication-concept-illustration_114360-5458.jpg?t=st=1711253940~exp=1711257540~hmac=300507f27d4da8913da29bf54b4b94dc21c472024f2153268576914214906899&w=740"
                        alt="login image" class=" img-fluid img-thumbnail">
                </div>
                <div class="col-lg-7">
                    <div>
                        <h4 class="contactAddess-title text-center">
                            Login </h4>

                            <form action="{{ route('login') }}" method="post" class="">
                                @csrf
                                <div class="form-group my-3">
                                    <label for="email"><strong>E-mail <span
                                                class=" text-danger">*</span></strong></label>
                                    <input type="email"
                                        class=" form-control @error('email')
                                    is-invalid
                                  @enderror"
                                        name="email" id="email" value="{{ old('email') }}" placeholder="your email">
                                    @error('email')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group my-3">
                                    <label for="password"><strong>Password <span
                                                class=" text-danger">*</span></strong></label>
                                    <input type="password"
                                        class=" form-control @error('password')
                                    is-invalid
                                  @enderror"
                                        name="password" id="password" value="{{ old('password') }}" placeholder="123456">
                                    @error('password')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group my-3">
                                    <input type="checkbox" class="" name="remember" id="checkbox">
                                    <label for="checkbox"><strong>Remember Me </strong></label>

                                </div>

                                <div class="form-group my-3">
                                    <button type="submit" class=" btn btn-dark w-100">Login</button>
                                </div>

                            </form>
                            <div class=" text-center">
                              <h5><a href="{{ route('password.request') }}" class=" text-secondary">Forgot your password? </a></h5>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
