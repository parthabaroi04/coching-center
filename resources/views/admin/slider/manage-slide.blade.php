@extends('admin.master')

@section('body')

    <section class="container-fluid">
        <div class="row content">
            <div class="col-12 card ">
                <div class="form-group">
                    <div class="card-body">
                        <div class="col-sm-12">
                            @if(Session::get('message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Message : </strong> {{ Session::get('message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <h4 class="text-center font-weight-bold font-italic mt-3">Manage Slider</h4>
                        </div>


                <div class="table-responsive p-1">
                    <table id="example" class="table table-striped table-bordered dt-responsive text-center" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Sl.</th>
                                <th>Slide title</th>
                                <th>Slide Description</th>
                                <th>Slide Image</th>
                                <th>Status</th>
                                <th style="width: 100px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($slides as $slide)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$slide->slide_title}}</td>
                                <td>{{$slide->slide_description}}</td>
                                <td><img src="{{asset('/')}}{{$slide->slide_image}}" style="width: 150px" alt="slide_image"></td>
                                <td>{{$slide->status == 1 ? 'published' : 'Unpublished'}}</td>
                                <td>
                                    @if($slide->status == 1)
                                    <a  href="{{route('slide-unpublished',['id'=>$slide->id])}}" title="Deactivated" style="" class="btn btn-sm btn-success"><span><i class="fa fa-arrow-up"></i></span></a>
                                    @else
                                    <a  href="{{route('slide-published',['id'=>$slide->id])}}" title="Activated" style="" class="btn btn-sm btn-warning"><span><i class="fa fa-arrow-down"></i></span></a>
                                    @endif
                                    <a  href="{{route('slide-update',['id'=>$slide->id])}}" style="" class="btn btn-sm btn-primary"><span><i class="fa fa-eye"></i></span></a>
                                    <a  href="{{route('slide-delete',['id'=>$slide->id])}}" style="" class="btn btn-sm btn-danger"><span><i class="fa fa-trash"></i></span></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection