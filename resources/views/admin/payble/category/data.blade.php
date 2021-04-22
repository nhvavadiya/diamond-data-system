
<table class="table m-b-0 table-hover" id="category-table">
    <thead>
        <tr>
                <th>Sr. no</th>
                <th>Name</th>
               
                 <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($category as $row)
            <tr data-id="{{encrypt($row->id)}}">
         
            <td>
                    {{ ((($category->currentPage() - 1 ) * $category->perPage() ) + $loop->iteration) . '.' }}
                </td>
                <td>{{ $row->name}}</td>
                
                
                <td>
                @if(Auth::user()->role == 1)
               
                        <a href="#" class="delete-category a-color" data-id="{{$row->id}}">
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



