<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <title>Invoice </title>
</head>
<body>
    {{-- {{dd($invoices)}} --}}
    <div class="container mx-auto p-5">
    <section class="flex justify-between mb-3">
        <div class="w-auto h-auto rounded shadow-lg">
        <img src="{{asset('images/logo.png')}}" alt="deklegacylogo">
        </div>
        <div class="justify-center self-center">
            @foreach ($settings as $setting)
            <h3>{{$setting->company}}</h3>
            <h3>{{$setting->address}}</h3>
            <h3>{{$setting->telephone}}</h3>
            <h3>{{$setting->website}}</h3>
            <h3>{{$setting->email}}</h3>
            @endforeach
            
        </div>
        
    </section>
    <section class="flex justify-between mb-3">
        @foreach ($invoices as $invoice)
            @foreach ($invoice->customer as $customer)
                
            <div class="justify-center self-center">
                <h2 class="font-bold text-2xl mb-4">RECEIPIENT</h2>
                <h4>{{$customer->name}}</h4>
                <h4>{{$customer->company}}</h4>
                <h4>{{$customer->address}}</h4>
                <h4>{{$customer->phone}}</h4>              
            </div>
            @endforeach
        
        <div class="justify-center self-center">
            <h2 class="font-bold text-3xl mb-4">INVOICE</h2>
            <label for="">INVOICE DATE:</label>
            <h4>{{$invoice->invoice_date}}</h4>
            <label for="">INVOICE NO:</label>
            <h4>{{$invoice->invoice_no}}</h4>
        </div>
        @endforeach
    </section>
    <section class="mb-3">
        <div class="flex justify-center flex-1 w-100">
        <table class="table-auto flex-1 items-stretch">
            <thead>
              <tr class="bg-gray-900 text-white">
                <th class="px-4 py-2">DESCRIPTION</th>
                <th class="px-4 py-2">QUANTITY</th>
                <th class="px-4 py-2">UNIT PRICE</th>
                <th class="px-4 py-2">TOTAL</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($invoices as $invoice)
                    @foreach ($invoice->invoiceItem as $item)
                    <tr>
                        <td class="border px-4 py-2">{{$item->description}}</td>
                        <td class="border px-4 py-2">{{$item->quantity}}</td>
                        <td class="border px-4 py-2">{{$item->unit_price}}</td>
                        <td class="border px-4 py-2">{{$item->total}}</td>
                      </tr>
                    @endforeach
                @endforeach
                
            </tbody>
            <tfoot>
                @foreach ($invoices as $invoice)
                <tr class="mt-3">
                    <td colspan="3" class="p-2">
                        <p class="float-right px-3">Sub Total: </p>
                    </td>
                    <td>
                        {{$invoice->subtotal}}
                    </td>
                </tr>
                <tr class="p-2">
                    <td colspan="3">
                        <p class="float-right px-3">Grand Total: </p>
                    </td>
                    <td>
                        {{$invoice->grand_total}}
                    </td>
                </tr>
                @endforeach
            </tfoot>
          </table>
        </div>
    </section>
</div>
</body>
</html>