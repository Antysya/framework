@extends('base')

@section('title', 'My site - registration')

@section('body')
          <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col">
                <form action="{{ route('registration.post') }}" method="post">
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
                        <h3 class="mb-5 text-uppercase">Student registration form</h3>

                        <div class="row">
                          <div class="mb-4">
                            <div class="form-outline">
                              <input type="text" id="form3Example1m" name="name" class="form-control form-control-lg" />
                              <label class="form-label" for="form3Example1m">Name</label>
                            </div>
                          </div>
                        </div>


                        <div class="form-outline mb-4">
                          <input type="password" id="form3Example8" name="password" class="form-control form-control-lg" />
                          <label class="form-label" for="form3Example8">Password</label>
                        </div>

                        <div class="form-outline mb-4">
                          <input type="password" id="form3Example8" name="password_check" class="form-control form-control-lg" />
                          <label class="form-label" for="form3Example8"> Check Password</label>
                        </div>

                        <div class="form-outline mb-4">
                          <input type="text" id="form3Example97" name="email" class="form-control form-control-lg" />
                          <label class="form-label" for="form3Example97">Email ID</label>
                        </div>

                        <div class="d-flex justify-content-end pt-3">
                          <input type="reset" class="btn btn-light btn-lg" value="Reset all">
                          <input type="submit" class="btn btn-warning btn-lg ms-2" value="Submit form">
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </form>
              </div>
            </div>
          </div>
@endsection
