<table class="table m-b-0 table-hover" id="invoice-table">
    <thead>
        <tr>
        <th>No</th>
        <th>l invoice</th>
            <th>E invoice</th>
            <th>Customer id</th>
            <th>country</th>
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
        </tr>
    </thead>
    <tbody>
  
    @forelse($invoice as $row)
        <tr data-id="{{encrypt($row->id)}}">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $row->l_invoice }}</td>
            <td>{{ $row->e_invoice }}</td>
            <td>{{ $row->customer_name }}</td>
            <td>{{ $row->country->country_name }}</td>
            <td>{{ $row->reference }}</td>
            <td>{{ $row->is_broker }}</td>
            <td>{{ $row->percentage }}</td>
            <td>{{ \Carbon\Carbon::parse($row->date)->format('d-m-Y') }}</td>  
            <td>{{ $row->term }}</td>
            <td>{{ $row->duedate }}</td>
            <td>{{ $row->payment_in }}</td>
            <td>{{ $row->carat_total }}</td>
            <td>{{ $row->total }}</td>
            <td>
                @if(Auth::user()->role == 1)
                    <a href="#" class="delete-invoice a-color" data-id="{{$row->id}}">
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
    

    
 
   
                  
             