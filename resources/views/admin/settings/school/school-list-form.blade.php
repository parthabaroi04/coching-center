@extends('admin.master')

@section('body')

    <section class="container-fluid">
        <div class="row content">
            <div class="col-12 pl-0 pr-0">
                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">Member's List</h4>
                    </div>
                </div>

                <div class="table-responsive p-1">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                        <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>School Name</th>
                            <th>Status</th>
                            <th style="width: 100px;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($schools as $school)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$school->add_school}}</td>
                                <td>{{$school->status == 1 ? 'published' : 'unpublished'}}</td>

                                <td>
                                    @if($school->status == 1 )
                                    <a href="{{route('school-unpublished',['id'=>$school->id])}}" class="btn btn-sm btn-success" title="Published"><span class="fa fa-arrow-up"></span></a>
                                    @else
                                    <a href="{{route('school-published',['id'=>$school->id])}}" class="btn btn-sm btn-warning" title="Unpublished"><span class="fa fa-arrow-down"></span></a>
                                    @endif
                                    <a href="{{route('edit-school',['id'=>$school->id])}}" class="btn btn-sm btn-info" title="Edit"><span class="fa fa-edit"></span></a>
                                    <a href="{{route('school-delete',['id'=>$school->id])}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete press ok ?')" title="Delete" )><span class="fa fa-trash"></span></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection