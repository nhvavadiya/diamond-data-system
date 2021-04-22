
<table class="table m-b-0 table-hover" id="purchaser-table">
    <thead>
        <tr>
            <th>Sr. no</th>
            <th>Email</th>
            <th>Name</th>
            <th>Nick name</th>
            <th>Mobile</th>
            <th>Position</th>
            <th>Branch</th>
            <th>Chat</th>
            <th>Skype</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($purchaser as $row)
            <tr data-id="{{encrypt($row->id)}}">
                <td>
                    {{ ((($purchaser->currentPage() - 1 ) * $purchaser->perPage() ) + $loop->iteration) . '.' }}
                </td>
                <td style="cursor: pointer;">{{ $row->email }}</td>
                <td>{{ ucfirst(strtolower($row->surname)) ." ". ucfirst(strtolower($row->name)) }}</td>
                <td>{{ ucfirst(strtolower($row->nick_name)) }}</td>
                <td>{{ $row->mobile }}</td>
                <td>{{ $row->position }}</td>
                <td>{{ $row->branch }}</td>
                <td>{{ $row->chat }}</td>
                <td>{{ $row->skype }}</td>
                <td>
                    @if(Auth::user()->role == 1)
                        <a href="#" class="delete-purchaser a-color" data-id="{{$row->id}}">
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
<ul class="pagination pagination-primary m-b-0 deletebutton">{{$purchaser->links()}}
</ul>
