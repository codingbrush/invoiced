<div class="container">
    {{-- In work, do what you enjoy. --}}
    <div class="row mb-4">
        <a href="{{route('invoice.create')}}" class="btn btn-info btn-md">Add New Invoice</a>
        <div class="col form-inline">
            Per Page: &nbsp;
            <select wire:model="perPage" class="form-control">
                <option>10</option>
                <option>20</option>
                <option>30</option>
            </select>
        </div>

        <div class="col">
            <input wire:model="search" class="form-control" type="text" placeholder="Search invoices...">
        </div>
    </div>
    <div class="">
        <div class="card-body">
            <h4 class="card-title text-uppercase">invoiceS</h4>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>TITLE</th>
                    <th>ISSUE DATE</th>
                    <th>DUE DATE</th>
                    <th>SUBTOTAL</th>
                    <th>GRANDTOTAL</th>
                    <th>MODIFY</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($invoices as $invoice)

                    <tr>
                        <td>{{$invoice->title}}</td>
                        <td class="text-info">{{$invoice->invoice_date}}</td>
                        <td class="text-warning">{{$invoice->due_date}}</td>
                        <td>{{$invoice->subtotal}}</td>
                        <td>{{$invoice->grand_total}}</td>
                        <td>
                            {{-- <a href="{{route('invoice.index',$invoice->id)}}" class="btn btn-outline-warning"><img src="{{asset('bootstrap-icons/file-check.svg')}}" alt="" width="16" height="16" title="Bootstrap"></a> --}}

                            <a href="{{route('invoice.show',$invoice->id)}}" class="btn btn-outline-info btn-sm"><svg class="bi bi-person-plus" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M11 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM1.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002.002zM6 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm4.5 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                                    <path fill-rule="evenodd" d="M13 7.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0v-2z"/>
                                </svg></a>

                            <a class="btn btn-primary btn-sm"  href="{{route('invoice.edit',$invoice->id)}}"><svg class="bi bi-pencil-square" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg></a>

                        <!-- <a class="btn btn-danger btn-sm" wire:click="deleteinvoice({{$invoice->id}})" class="delete" data-confirm="Are you sure to delete this item?"><svg class="bi bi-x-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
  <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>

</svg></a> -->
                            @if($confirming===$invoice->id)
                                <button wire:click="kill({{ $invoice->id }})"
                                        class="btn btn-danger btn-sm text-white">
                                    <svg class="bi bi-x-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
                                        <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>

                                    </svg>
                                </button>
                            @else
                                <button wire:click="confirmDelete({{ $invoice->id }})"
                                        class="btn btn-danger btn-sm text-white"><svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg></button>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col">
                    {{ $invoices->links() }}
                </div>

                <div class="col text-right text-muted">
                    Showing {{ $invoices->firstItem() }} to {{ $invoices->lastItem() }} out of {{ $invoices->total() }} results
                </div>
            </div>
        </div>
    </div>
</div>
