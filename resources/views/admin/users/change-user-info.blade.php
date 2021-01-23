@extends('admin.master')
@section('body')
    <!--Content Start-->
    <section class="container-fluid">
        <div class="row content login-register-form">
            <div class="col-12 pl-0 pr-0">
                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">Update User's Info</h4>
                    </div>
                </div>
                <form method="POST" action="{{ route('user-save-info') }}" enctype="multipart/form-data" autocomplete="" class="form-inline">
                    @csrf

                    <div class="form-group col-12 mb-3">
                        <label for="name" class="col-sm-3 col-form-label text-right">Name</label>
                        <input id="name" type="text" class="col-sm-9 form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" placeholder="Name" required >
                        <input type="hidden" class="col-sm-9 form-control" name="user_Id" value="{{ $user->id }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group col-12 mb-3">
                        <label for="mobile" class="col-sm-3 col-form-label text-right">Mobile</label>
                        <input id="mobile" type="text" class="col-sm-9 form-control" name="mobile" value="{{ $user->mobile }}" placeholder="8801xxxxxxxxx" required>
                        @error('name')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group col-12 mb-3">
                        <label for="email" class="col-sm-3 col-form-label text-right">E-Mail Address</label>
                        <input id="email" type="email" class="col-sm-9 form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" placeholder="Email Address" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group col-12 mb-3">
                        <label class="col-sm-3"></label>
                        <button type="submit" class="col-sm-9 btn btn-block my-btn-submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection