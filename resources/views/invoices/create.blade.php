@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-title">
            <h4>Create Invoice</h4>

        </div>
        <div class="card-body">
            <form action="{{route('invoice.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="invoice_no">Invoice No:</label>
                        <input type="text" name="invoice_no" id="invoice_no" class="form-control">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="title">Invoice Title:</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="customer">Customer:</label>
                        <select name="customer_id" id="customer" class="form-control">
                            <option value="">Select Customer</option>
                            @foreach ($customers as $customer)
                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="invoice_date">Issue Date:</label>
                        <input type="date" name="invoice_date" id="invoice_date" class="form-control">
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="due_date">Issue Date:</label>
                        <input type="date" name="due_date" id="due_date" class="form-control">
                    </div>
                </div>
                <div class="row" x-data="handler()">
                    <div class="col">
                        <table class="table table-bordered align-items-center table-sm">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template x-for="(field, index) in fields" :key="index">
                                    <tr>
                                        <td x-text="index + 1"></td>
                                        <td><input x-model="field.description" type="text" name="description[]"
                                                class="form-control"></td>
                                        <td><input x-model="field.quantity" type="number" name="quantity[]"
                                                class="form-control" min="0"></td>
                                        <td><input x-model="field.unit_price" type="number" name="unit_price[]"
                                                class="form-control" step=0.10 min="0"></td>
                                        <td><input x-model="field.total" type="number" name="total[]"
                                                class="form-control" @click="calcTotal()"></td>
                                        <td><button type="button" class="btn btn-danger btn-small"
                                                @click="removeField(index)">&times;</button></td>
                                    </tr>
                                </template>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>
                                    
                                    </td>
                                    <td>
                                        <label for="grand_total">Grand Total</label>
                                        <input type="text" name="grand_total" id="grand_total" class="form-control"
                                            readonly>
                                    </td>
                                    <td colspan="4" class="text-right"><button type="button" class="btn btn-info"
                                            @click="addNewField()">+</button></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <input type="submit" value="Create Invoice">
        </div>
        </form>
    </div>
</div>

@endsection
@push('scripts')
<script>
    const grandtotal = document.getElementById('grand_total');
    let subT = [];

    function handler() {
        return {
            fields: [],
            addNewField() {
                this.fields.push({
                    txt1: '',
                    txt2: ''
                });
            },
            removeField(index) {
                this.fields.splice(index, 1);
            },
            calcTotal() {
                this.fields.forEach(fields => {
                    fields.total = fields.quantity * fields.unit_price;
                    //console.log(fields.total);
                    this.calcSubTotal();
                });
            },
            calcSubTotal() {
                let total = 0;
                this.fields.forEach(fields => {
                    total += parseInt(fields.total, 10);

                });
                //console.log(grand_total);
                grandtotal.value = total;
            }
        }
    }

</script>
@endpush
