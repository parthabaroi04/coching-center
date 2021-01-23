@if(count($studentTypes)>0)
    @php($i=1)
    @foreach($studentTypes as $studentType)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$studentType->add_class}}</td>
            <td>{{$studentType->student_type}}</td>
            <td>{{$studentType->status == 1 ? 'Active' : 'Inactive'}}</td>

            <td>
                @if($studentType->status == 1 )
                    <button onclick="studentTypeUnpublished('{{$studentType->id}}')"  class="btn btn-sm btn-success" title="Published"><span class="fa fa-arrow-up"></span></button>
                @else
                    <button onclick="studentTypePublished('{{$studentType->id}}')" class="btn btn-sm btn-warning" title="Unpublished"><span class="fa fa-arrow-down"></span></button>
                @endif
                <button onclick="studentTypeEdit('{{$studentType->id}}','{{$studentType->student_type}}')" class="btn btn-sm btn-info" title="Edit"><span class="fa fa-edit"></span></button>
                <button onclick="studentTypeDelete('{{$studentType->id}}')" class="btn btn-sm btn-danger"  title="Delete" )><span class="fa fa-trash"></span></button>
            </td>
        </tr>
    @endforeach
@else
    <tr class="text-danger" >
        <td colspan="5">Student Type Not Found!!!</td>
    </tr>
@endif