<table>
    <thead>
        <th>SL.No</th>
        <th>Batch Name</th>
        <th>Batch Capacity</th>
        <th>Action</th>
    </thead>
    <tbody>
        @php($i=1)
        @foreach($batches as $batch)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$batch->batch_name}}</td>
            <td>{{$batch->student_capacity}}</td>
            <td>
                @if($batch->status == 1 )
                    <button onclick='unpublished("{{$batch->id}}","{{$batch->class_id}}")' class="btn btn-sm btn-success" id="unpublished" title="Unpublished"><span><i class="fa fa-arrow-up"></i></span></button>
                @else
                    <button onclick='published("{{$batch->id}}","{{$batch->class_id}}")' class="btn btn-sm btn-warning" id="published" title="Published"><span><i class="fa fa-arrow-down"></i></span></button>
                @endif
                <a href="{{route('batch-edit',['id'=>$batch->id])}}" class="btn btn-sm btn-info" title="Edit"><span class="fa fa-edit"></span></a>
                    <button onclick='deleted("{{$batch->id}}","{{$batch->class_id}}")' class="btn btn-sm btn-danger" id="delete" title="delete"><span><i class="fa fa-trash"></i></span></button>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>


<script>
    function unpublished(batchId,classId) {
       var check = confirm('If you want to unpublished ,press Ok');
       if (check){
           $.get("{{route('batch-unpublished')}}",{batch_id:batchId,class_id:classId},function (data) {
               console.log(data);
               $("#batchList").html(data);
           })
       }
    }
    function published(batchId,classId) {
       var check = confirm('If you want to Published ,press Ok');
       if (check){
           $.get("{{route('batch-published')}}",{batch_id:batchId,class_id:classId},function (data) {
               console.log(data);
               $("#batchList").html(data);
           })
       }
    }
    function deleted(batchId,classId) {
       var check = confirm('If you want to Delete ,press Ok');
       if (check){
           $.get("{{route('batch-delete')}}",{batch_id:batchId,class_id:classId},function (data) {
               console.log(data);
               $("#batchList").html(data);
           })
       }
    }
</script>
