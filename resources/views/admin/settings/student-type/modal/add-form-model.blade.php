<div class="modal fade bd-example-modal-lg" id="studentTypeAddModal" tabindex="-1" role="dialog" aria-labelledby="studentTypeAddModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Student Type Add</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('student-type-save')}}" method="post" id="studentTypeInsert">
                @csrf
                <div class="modal-body">
                    <div class="form-group row ">
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
                    <div class="form-group row ">
                        <label for="studentType" class="col-form-label col-sm-3 text-right">Student Type</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('student_type') is-invalid @enderror" name="student_type" value="{{ old('student_type') }}" id="studentType" placeholder="student type" required>
                            @error('student_type')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-warning" data-dismiss="modal" id="reset">Reset</button>
                    <button type="submit" class="btn btn-success">Save </button>
                </div>
            </form>
        </div>
    </div>
</div>