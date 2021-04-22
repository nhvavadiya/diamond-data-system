
<table class="table m-b-0 table-hover" id="purchas-table">
    <thead>
        <tr>
            <th>No</th>
            <th>l invoice</th>
            <th>E invoice</th>
            <th>Seller</th>
            <th>Reference</th>
            <th>Is broker</th>
            <th>Percentage</th>
            <th>Date</th>
            <th>Term</th>
            <th>Duedate</th>
            <th>Payment in</th>
            <th>Carat total</th>
            <th>Total</th>
            <th>Action</th>
    </thead>
    <tbody>
        @forelse($purchas as $row)
            <tr  data-id="{{encrypt($row->id)}}">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $row->l_invoice }}</td>
                <td>{{ $row->e_invoice }}</td>
                <td>{{ $row->saler->seller_name}}</td>
                <td>{{ $row->reference }}</td>
                <td>{{ ($row->is_broker == 1) ? 'Yes' : 'No'}}</td>
                <td>{{ $row->percentage }}</td>
                <td>{{ \Carbon\Carbon::parse($row->date)->format('d-m-Y') }}</td>  
                <td>{{ $row->term }}</td>
                <td>{{ \Carbon\Carbon::parse($row->duedate)->format('d-m-Y') }}</td>  
                <td>{{ $row->payment_in }}</td>
                <td>{{ $row->carat_total }}</td>
                <td>{{ $row->total }}</td>
                <td>
                @if(Auth::user()->role == 1)
                    <a href="#" class="delete-purchas a-color" data-id="{{($row->id)}}">
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

 