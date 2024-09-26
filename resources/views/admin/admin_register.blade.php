@extends('admin.layouts.main')
@section('content')
<div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <form class="pt-3" action="{{url('/save')}}" method="POST">
                     @csrf
                  <div class="form-group">
                    <input type="text" name="username" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Username" value="{{ old('username') }}" required> 
                    @error('username')
                        <span class="error-msg">{{ $message }}</span>
                     @enderror
                </div>

                  <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="error-msg">{{ $message }}</span>
                     @enderror 
                </div>
                  
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" value="{{ old('password') }}" required>
                    @error('password')
                        <span class="error-msg">{{ $message }}</span>
                     @enderror 
                </div>

                  <div class="form-group">
                    <input type="password" name="password_confirmation" class="form-control form-control-lg" id="password_confirmation" placeholder="Confirm Password" value="{{ old('password_confirmation') }}" required>
                    @error('password_confirmation')
                    <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>
                  
                  <div class="mt-3 d-grid gap-2">
                    <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" type="submit">SIGN UP</button>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="{{url('/')}}" class="text-primary">Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
@endSection
