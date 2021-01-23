@extends('admin.master')

@section('body')

    <section class="container-fluid">
        <div class="row content">
            <div class="col-12 pl-0 pr-0">
                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">Student Type List -<button class="btn btn-success text-light" data-toggle="modal" data-target="#studentTypeAddModal">Add New</button> </h4>
                    </div>
                </div>

                <div class="table-responsive p-1">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                        <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Class Name</th>
                            <th>Student Type</th>
                            <th>Status</th>
                            <th style="width: 100px;">Action</th>
                        </tr>
                        </thead>
                        <tbody id="studentTypeTable">
                            @include('admin.settings.student-type.student-type-table')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>


    <!-- Modal -->
   @include('admin.settings.student-type.modal.add-form-model')
   @include('admin.settings.student-type.modal.edit-form-modal')

    <script>
         $('#studentTypeInsert').submit(function (e) {
           e.preventDefault();
           var url = $(this).attr('action');
           var data = $(this).serialize();
           var method =$(this).attr('method');
           $('#studentTypeAddModal #reset').click();
           $('#studentTypeAddModal').modal('hide');
           $.ajax({
               data:data,
               type:method,
               url:url,
               success: function () {
                   $.get("{{route('student-type-list')}}",function (data) {
                       $('#studentTypeTable').empty().html(data);
                   })
               }
           })
         })
        function studentTypeUnpublished(id) {
             $.get("{{route('student-type-un-published')}}",{type_id:id},function (data) {
                 console.log(data);
                 $('#studentTypeTable').empty().html(data);
             })

        }
        function studentTypePublished(id) {
            $.get("{{route('student-type-published')}}",{type_id:id},function (data) {
                console.log(data);
                $('#studentTypeTable').empty().html(data);
            })
        }
        function studentTypeEdit(id,name) {
            $('#studentTypeEditModal').find('#studentType').val(name);
            $('#studentTypeEditModal').find('#typeId').val(id);
            $('#studentTypeEditModal').modal('show');
        }

        $('#studentTypeUpdate').submit(function (e) {
            e.preventDefault();
            var url = $(this).attr('action');
            var data = $(this).serialize();
            var method =$(this).attr('method');
            $('#studentTypeEditModal #reset').click();
            $('#studentTypeEditModal').modal('hide');
            $.ajax({
                data:data,
                type:method,
                url:url,
                success: function (data) {
                    $('#studentTypeTable').empty().html(data);
                }
            })
        })

         onclick="return confirm('')"
        function studentTypeDelete(id) {
            var msg = 'Are you sure want to delete press ok ?';
            if (confirm(msg)){
                $.get("{{route('student-type-delete')}}",{type_id:id},function (data) {
                    console.log(data);
                    $('#studentTypeTable').empty().html(data);
                })
            }
        }
    </script>
@endsection