<table class="table m-b-0 table-hover" id="stocktable">
    <thead>
        <tr>
                <th>Sr. no</th>
                <th>Shape</th>
                <th>Weight</th>
                <th>Clarity</th>
                <th>Fancy Color</th>
                <th>Fancy Color Intensity</th>
                <th>fancy Color Overtone </th>
                <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($gia as $row)
            <tr data-id="{{encrypt($row->id)}}">
         
            <td>
                    {{ ((($gia->currentPage() - 1 ) * $gia->perPage() ) + $loop->iteration) . '.' }}
                </td>
                <td>{{ $row->shape}}</td>
                <td>{{ $row->weight }}</td>
                <td>{{ $row->clarity }}</td>
                <td>{{ $row->fancy_color }}</td>
                <td>{{ $row->fancy_color_intensity}}</td>
                <td>{{ $row->fancy_color_overtone }}</td>
                <td>
                @if(Auth::user()->role == 1)
                    <button class="btn btn-primary btn-xs btnStockRequest" data-toggle="modal" data-target="#modalStockTransferForm" id="{{$row->id}}">Request</button>               
                @endif
                </td>
            </tr>
        @empty
            <td colspan="9" class="text-center">No records available</td>
            
        @endforelse
           
    </tbody>
</table>
<ul class="pagination pagination-primary m-b-0 deletebutton">{{$gia->links()}}
</ul>


