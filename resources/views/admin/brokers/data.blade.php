
<table class="table m-b-0 table-hover" id="broker-table">
    <thead>
        <tr>
        <th>Sr. no</th>
            <th>Email</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Date of Birth</th>
            <th>Reference</th>
            <th>Address</th>
            <th>Mobile</th>
            <th>Other Mobile</th>
            <th>Fax</th>
            <th>Chat</th>
            <th>Skype</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($broker as $row)
            <tr data-id="{{encrypt($row->id)}}">
            <td>
                    {{ ((($broker->currentPage() - 1 ) * $broker->perPage() ) + $loop->iteration) . '.' }}
                </td>
                <td style="cursor: pointer;">{{ $row->email }}</td>
                <td>{{ ucfirst(strtolower($row->surname)) ." ". ucfirst(strtolower($row->name)) }}</td>
                <td>{{ $row->gender }}</td>
                <td>{{ \Carbon\Carbon::parse($row->date_of_birth)->format('d-m-Y') }}</td>                
                <td>{{ !empty($row->reference) ? $row->reference : '-' }}</td>
                <td>{{ $row->address }}</td>
                <td>{{ $row->mobile }}</td>
                <td>{{ $row->other_mobile }}</td>
                <td>{{ $row->fax }}</td>
                <td>{{ $row->chat }}</td>
                <td>{{ $row->skype }}</td>
                <td>
                @if(Auth::user()->role == 1)
                        <a href="#" class="delete-broker a-color " data-id="{{$row->id}}">
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
<ul class="pagination pagination-primary m-b-0 deletebutton">{{$broker->links()}}
</ul>

    