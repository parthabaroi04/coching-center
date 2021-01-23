@extends('admin.master')
@section('body')
    <!--Content Start-->
    <section class="container-fluid">
        <div class="row content">
            <div class="col-md-8 offset-md-2 pl-0 pr-0">
                @if(Session::get('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Message : </strong> {{ Session::get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3"> Add Batch Form</h4>
                    </div>
                </div>

                <form action="{{route('add-batch-save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="table-responsive p-1">
                        <table id="" class="table table-bordered dt-responsive nowrap text-center" style="width: 100%;">


                            <tr>
                                <td>
                                    <div class="form-group row mb-0">
                                        <label for="classId" class="col-form-label col-sm-3 text-right">Add Class</label>
                                        <div class="col-sm-9">
                                            <select id="classId" class="form-control @error('class_id') is-invalid @enderror" name="class_id" value="{{ old('class_id') }}" required autofocus>
                                                <option value="">--- Select Class---</option>
                                                @foreach($classes as $class)
                                                <option value="{{$class->id}}">{{$class->add_class}}</option>
                                                 @endforeach
                                            </select>
                                            @error('class_id')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group row mb-0">
                                        <label for="typeId" class="col-form-label col-sm-3 text-right">Student Type</label>
                                        <div class="col-sm-9">
                                            <select id="type_id" class="form-control @error('type_id') is-invalid @enderror " name="typeId" required >
                                                <option value="">--- Select Type---</option>
                                            </select>
                                            @error('type_id')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group row mb-0">
                                        <label for="slideTitle" class="col-form-label col-sm-3 text-right">Add Batch</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('batch_name') is-invalid @enderror" name="batch_name" value="{{ old('batch_name') }}" id="batchName" placeholder="batch name here" required>
                                            @error('batch_name')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group row mb-0">
                                        <label for="slideTitle" class="col-form-label col-sm-3 text-right">Student's Capacity </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('student_capacity') is-invalid @enderror" name="student_capacity" value="{{ old('student_capacity') }}" id="studentCapacity" placeholder="capacity number here" required>
                                            @error('student_capacity')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr><td><button type="submit" class="btn btn-block my-btn-submit">Save</button></td></tr>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--Content End-->
    <!--Student Type section Start-->
    <script>
        $('typeId')
    </script>
    <!--Student Type section end-->


@endsection





