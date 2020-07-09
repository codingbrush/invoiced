<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <title>Invoice </title>
    <style>
        .bg-orange{
            background-color:  #FD761A ;
        }
            @media print
    {    
        .no-print, .no-print *
        {
            display: none !important;
        }
    }
    </style>
</head>
<body class="bg-white">
    <div class="container mx-auto p-5 mt-5">
        <div class="row mb-3 flex justify-between">
            <a href="{{route('invoice.index')}}" class="px-3 py-2 rounded text-white bg-blue-700 hover:bg-blue-500 pointer no-print">&lArr;  BACK</a>
            <button class="px-3 py-2 rounded text-white bg-green-600 hover:bg-green-400 pointer no-print" onclick="window.print();return false;">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-printer" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 2H5a1 1 0 0 0-1 1v2H3V3a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2h-1V3a1 1 0 0 0-1-1zm3 4H2a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h1v1H2a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1z"/>
                    <path fill-rule="evenodd" d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1zM5 8a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H5z"/>
                    <path d="M3 7.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                  </svg></button>
        </div>
    <section class="flex justify-between mb-3">
        @foreach($invoices as $company)
        <div class="w-40 h-30 rounded">
        <img src="{{asset('images/'.$company->setting->logo)}}" alt="deklegacylogo">
        </div>
        <div class="justify-center self-center">
            
            <h3>{{$company->setting->company}}</h3>
            <h3>{{$company->setting->address}}</h3>
            <h3>{{$company->setting->telephone}}</h3>
            <h3>{{$company->setting->website}}</h3>
            <h3>{{$company->setting->email}}</h3>
            
        </div>
        @endforeach
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
        <table class="table-auto table-bordered flex-1 items-stretch">
            <thead>
              <tr class="bg-orange text-white">
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
                    <td class="border-0"></td>
                    <td class="border-0"></td>
                    <td class="p-2 border">
                        <p class="float-right px-3">Sub Total: </p>
                    </td>
                    <td class="border pl-4">
                        {{$invoice->subtotal}}
                    </td>
                </tr>
                <tr class="p-2">
                    <td class="border-0"></td>
                    <td class="border-0"></td>
                    <td class="p-2 border">
                        <p class="float-right px-3">Grand Total: </p>
                    </td class="border">
                    <td class="border pl-4">
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