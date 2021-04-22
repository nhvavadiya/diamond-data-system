
<table class="table m-b-0 table-hover" id="customer-table">
    <thead>
        <tr>
        <th>Sr. no</th>
        <th>Email</th>
         <th>Name</th>
         <th>Company Name</th>
         <th>Gender</th>
         <th>Position</th>
         <th>Date of Birth</th>
         <th>Reference</th>
         <th>Address</th>
         <th>Mobile</th>
         <th>Other_mobile</th>
         <th>Fax</th> 
         <th>Chat</th>
         <th>Skype</th>
         <th>Rapnet id</th>
         <th>Website</th>
         <th>Whatsapp</th>
         <th>Remark</th>
         <th>Contact Person</th>
         <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($customer as $row)
            <tr data-id="{{encrypt($row->id)}}">
            <td>
                    {{ ((($customer->currentPage() - 1 ) * $customer->perPage() ) + $loop->iteration) . '.' }}
                </td>
                <td style="cursor: pointer;" >{{ $row->email }}</td>
                <td>{{ ucfirst(strtolower($row->surname)) ." ". ucfirst(strtolower($row->name)) }}</td>
                <td>{{ $row->company_name }}</td>
                <td>{{ $row->gender}}</td>
                <td>{{ $row->position }}</td>
                <td>{{ \Carbon\Carbon::parse($row->date_of_birth)->format('d-m-Y') }}</td>                
                <td>{{ !empty($row->reference) ? $row->reference : '-' }}</td>
                <td>{{ $row->address }}</td>
                <td>{{ $row->mobile }}</td>
                <td>{{ $row->other_mobile }}</td>
                <td>{{ $row->fax }}</td>
                <td>{{ $row->chat }}</td>
                <td>{{ $row->skype }}</td>
                <td>{{ $row->rapnet_id }}</td>
                <td>{{ $row->website }}</td>
                <td>{{ $row->whatsapp }}</td>
                <td>{{ $row->remark }}</td>
                <td>{{ $row->contact_person }}</td>
                
                <td>
                @if(Auth::user()->role == 1)
               
                        <a href="#" class="delete-customer a-color" data-id="{{$row->id}}">
                            <i class="ti-trash text-danger"></i>
                        </a>
                    @endif
                </td>
            </tr>
        @empty
            <td colspan="16" class="text-center">No records available</td>
        @endforelse
    </tbody>
</table>
<ul class="pagination pagination-primary m-b-0 deletebutton">{{$customer->links()}}
</ul>

