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
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template x-for="(field, index) in fields" :key="index">
                                    <tr>
                                        <td x-text="index + 1"></td>
                                        <td><input x-model="field.quantity" type="number" name="quantity[]"
                                                class="form-control" onkeyup="calc()"></td>
                                        <td><input x-model="field.unit_price" type="number" name="unit_price[]"
                                                class="form-control" onkeyup="calc()"></td>
                                        <td><input x-model="field.total" type="number" name="total[]"
                                                class="form-control"></td>
                                        <td><button type="button" class="btn btn-danger btn-small"
                                                @click="removeField(index)">&times;</button></td>
                                    </tr>
                                </template>
                            </tbody>
                            <tfoot>
                                <div class="form-group">
                                    <label for="subtotal">SubTotal</label>
                                    <input type="text" name="subtotal" id="subtotal">
                                    <label for="grand_total">Grand Total</label>
                                    <input type="text" name="grand_total" id="grand_total">
                                </div>
                                <tr>
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
    const subtotal = document.querySelector('#subtotal');
    const grandtotal = document.querySelector('#grand_total');

    function calc()
    {
        let qty = document.getElementById('quantity');
        console.log(qty);
        
    }

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
            }
        }
    }

</script>
@endpush
