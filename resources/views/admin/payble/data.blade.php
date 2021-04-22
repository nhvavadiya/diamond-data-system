<table class="table m-b-0 table-hover" id="payble-table">
    <thead>
        <tr >
            <th>Date</th>
            <th>Invoice id</th>
            <th>Notes</th>
           
            <th>Action</th>
        
        </tr>
    </thead>
    <tbody>
        @forelse($payble as $row)
            <tr data-id="{{encrypt($row->id)}}">
                <td>{{\Carbon\Carbon::parse($row->date)->format('d-m-Y')}}</td>
                <td>{{$row->invoice_id}}</td>
                <td>{{$row->note}}</td>
                
                <td>
                @if(Auth::user()->role == 1)
                        <a href="#" class="delete-payble a-color" data-id="{{$row->id}}">
                            <i class="ti-trash text-danger"></i>
                        </a>
                    @endif
                </td>
            </tr>
        @empty
            <td colspan='11' class="text-center">No records available</td>
        @endforelse
    </tbody>
</table>
