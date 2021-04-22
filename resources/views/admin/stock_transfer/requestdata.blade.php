<table class="table m-b-0 table-hover" id="stocktable">
    <thead>
        <tr>
                <th>Sr. no</th>
                <th>Stock</th>
                <th>Send_From</th>
                <th>Send_To</th>
                <th>Status</th>
                <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($stock_transfer as $row)
            <tr data-id="{{encrypt($row->id)}}">
         
            <td>
                    {{ ((($stock_transfer->currentPage() - 1 ) * $stock_transfer->perPage() ) + $loop->iteration) . '.' }}
                </td>
                <td>{{ $row->stock}}</td>
                <td>{{ $row->send_from }}</td>
                <td>{{ $row->country_name }}</td>
                <td>{{ $row->status }}</td>
                <td>
                @if(Auth::user()->role == 1)
                    <a href="#" class="delete-stockRequest a-color " data-id="{{$row->id}}">
                        <i class="ti-trash text-danger"></i>
                    </a>               
                @endif
                </td>
            </tr>
        @empty
            <td colspan="9" class="text-center">No records available</td>
            
        @endforelse
           
    </tbody>
</table>
<ul class="pagination pagination-primary m-b-0 deletebutton">{{$stock_transfer->links()}}
</ul>


