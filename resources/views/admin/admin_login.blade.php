@extends('admin.layouts.main')
@section('content')
<div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                
                <h6 class="font-weight-light">Sign in to continue.</h6>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <!-- Display validation errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="pt-3" action ="{{url('login')}}" method="post">
                  @csrf
                  <div class="form-group">
                    <input type="text" name ="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" value="{{ old('email') }}" >
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" value="{{ old('password') }}" >
                  </div>  
                  <div class="mt-3 d-grid gap-2">
                    <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" type="submit">SIGN IN</button>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="{{url('admin-register')}}" class="text-primary">Create</a>
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
