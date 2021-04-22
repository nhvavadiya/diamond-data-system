
<table class="table m-b-0 table-hover" id="saler-table">
    <thead>
        <tr>
        
            <th>Sr. no</th>
            <th>Email</th>
            <th>Name</th>
            <th>Nick name</th>
            <th>Gender</th>
            <th>Date of Birth</th>
            <th>Mobile</th>
            <th>Position</th>
            <th>Branch</th>
            <th>Chat</th>
            <th>Skype</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($saler as $row)
            <tr data-id="{{encrypt($row->id)}}">
            <td>
                    {{ ((($saler->currentPage() - 1 ) * $saler->perPage() ) + $loop->iteration) . '.' }}
                </td>
            <td style="cursor: pointer;">{{ $row->email }}</td>
                <td>{{ ucfirst(strtolower($row->surname)) ." ". ucfirst(strtolower($row->name)) }}</td>
                <td>{{ ucfirst(strtolower($row->nick_name)) }}</td>
                <td>{{ ($row->gender == 1) ? 'Male' : 'Female' }}</td>
                <td>{{ \Carbon\Carbon::parse($row->date_of_birth)->format('d-m-Y') }}</td>    
                <td>{{ $row->mobile }}</td>
                <td>{{ $row->position }}</td>
                <td>{{ $row->branch }}</td>
                <td>{{ $row->chat }}</td>
                <td>{{ $row->skype }}</td>
                <td>
                @if(Auth::user()->role == 1)
                        <a href="#" class="delete-saler a-color" data-id="{{($row->id)}}">
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
<ul class="pagination pagination-primary m-b-0 deletebutton">{{$saler->links()}}
</ul>