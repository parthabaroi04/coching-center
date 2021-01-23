@extends('admin.master')
@section('body')
    <!--Content Start-->
    <section class="container-fluid">
        <div class="row content login-register-form">
            <div class="col-12 pl-0 pr-0">
                @if(Session::get('error message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>error!</strong> {{Session::get('error message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">Update Password</h4>
                    </div>
                </div>
                <form method="POST" action="{{ route('user-password-update') }}" enctype="multipart/form-data" autocomplete="" class="form-inline">
                    @csrf
                    <div class="form-group col-12 mb-3">
                        <label for="password" class="col-sm-3 col-form-label text-right">Old Password</label>
                        <input id="password" type="password" class="col-sm-9 form-control @error('password') is-invalid @enderror" name="password" placeholder="Old Password" required>
                        @error('password')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group col-12 mb-3">
                        <label for="newPassword" class="col-sm-3 col-form-label text-right">New Password</label>
                        <input id="newPassword" type="password" class="col-sm-9 form-control @error('new_password') is-invalid @enderror" name="new_password" placeholder="Confirm Password" required>
                        @error('new_password')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <input type="hidden" name="user_id" value="">
                    <div class="form-group col-12 mb-3">
                        <label class="col-sm-3"></label>
                        <button type="submit" class="col-sm-9 btn btn-block my-btn-submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection