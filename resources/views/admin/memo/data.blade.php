<table class="table m-b-0 table-hover" id="memo-table">
    <thead>
        <tr>
            <th>No</th>
            <th>Customer</th>
            <th>Reference</th>
            <th>Date</th>
            <th>Payment in</th>
            <th>Carat total</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($memo as $row)
        @php
            // dd($row->customer->customer_name)
        @endphp
            <tr data-id="{{encrypt($row->id)}}">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $row->customer->customer_name  ?? ''}}</td>
                <td>{{ $row->reference }}</td>
                <td>{{ \Carbon\Carbon::parse($row->date)->format('d-m-Y') }}</td>  
                <td>{{ $row->payment_in }}</td>
                <td>{{ $row->carat_total }}</td>
                <td>{{ $row->total }}</td>
                <td>
                    @if(Auth::user()->role == 1)
                        <a href="#" class="delete-memo a-color" data-id="{{$row->id}}">
                            <i class="ti-trash text-danger"></i>
                        </a>
                    @endif
                </td>
            </tr>
        @empty
            <td colspan='16' class="text-center">No records available</td>
        @endforelse
    </tbody>
</table>
