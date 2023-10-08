@extends('base')

@section('title', 'My site - login')

@section('body')
          <div class="container py-10 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col">
                <form action="{{ route('sing_in.post') }}" method="post">
                  @csrf
                <div class="card card-registration my-4">
                  <div class="row g-0">
                    <div class="col-xl-6 d-none d-xl-block">
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img4.webp"
                        alt="Sample photo" class="img-fluid"
                        style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                    </div>
                    <div class="col-xl-6">
                      <div class="card-body p-md-5 text-black">
                        <h3 class="mb-5 text-uppercase">Student login form</h3>

                        @if (session()->has('error'))
                        <div class="alert alert-danger" role="alert">
                          {!! session()->get('error') !!}
                        </div>
                        @endif

                        @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                          <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                          </ul>
                        </div>
                        @endif

                        <div class="form-outline mb-4">
                          <input type="text" id="form3Example97" name="email" class="form-control form-control-lg" />
                          <label class="form-label" for="form3Example97">Email ID</label>
                        </div>

                        <div class="form-outline mb-4">
                          <input type="password" id="form3Example8" name="password" class="form-control form-control-lg" />
                          <label class="form-label" for="form3Example8">Password</label>
                        </div>

                        <div class="d-flex justify-content-end pt-3">
                          <input type="submit" class="btn btn-warning btn-lg ms-2" value="Login">
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </form>
              </div>
            </div>
@endsection
