
<table class="table m-b-0 table-hover" id="nogia-table">
    <thead>
        <tr>
            <th>Sr. no</th>
            <th>details</th>
            <th>pc</th>
            <th>carat</th>
            <th>price</th>
            <th>total</th>
            <th>Action</th>
         
        </tr>
    </thead>
    <tbody>
        @forelse($nogia as $row)
            <tr data-id="{{encrypt($row->id)}}">
            <td>
                    {{ ((($nogia->currentPage() - 1 ) * $nogia->perPage() ) + $loop->iteration) . '.' }}
                </td>
                <td >{{ $row->details }}</td>
                <td>{{ $row->pc }}</td>
                <td>{{ $row->carat }}</td>
                <td>{{ $row->price }}</td>
                <td>{{ $row->total }}</td>
                <td>
                @if(Auth::user()->role == 1)
                        <a href="#" class="delete-nogia a-color " data-id="{{$row->id}}">
                        <i class="ti-trash text-danger"></i>
                        </a>
                    @endif
                </td>
            </tr>
        @empty
            <td colspan="11" class="text-center">No records available</td>
        @endforelse
    </tbody>
</table>
<ul class="pagination pagination-primary m-b-0 deletebutton">{{$nogia->links()}}
</ul>

    