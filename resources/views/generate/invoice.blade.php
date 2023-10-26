<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SiPandu - Invoice Detail</title>
    <link rel="shortcut icon" href="/image/logo.svg" type="image/x-icon">
    @vite('resources/css/app.css')
</head>
<body class="bg-[#F0F0F0] flex justify-center">
    <div class="bg-white w-[40vw] pb-[10vw] px-[2vw] relative"i d="pdf-content">
        <div class="flex w-full items-center mt-[5vw]">
            <img src="/image/profil-dummy.png" class="w-[4vw]" alt="">
            <h1 class="ml-[2vw] text-[2vw]">INVOICE #{{ $invoice->id }}</h1>
        </div>
        <p class="mt-[3vw] text-[1.2vw]">
            Client Name : {{ $invoice->custname }}
        </p>
        <p class="text-biru text-[0.8vw]">
            {{ $invoice->created_at->isoFormat('D MMMM Y', 'Do MMMM Y') }}
        </p>


        {{-- Table --}}
        <table class="w-full mt-[3vw]">
            <thead>
                <tr class="border-b-[0.02vw] border-[#bbc6e4] h-[4vw] text-[#A3AED0] text-[0.9vw]">
                    <th class="w-[30%]">
                        <div class="flex items-center font-normal text-start">
                            <p class="mx-[1vw]">Items</p>
                            <img src="/image/icons/dropdown.svg" class="w-[0.8vw]" alt="">
                        </div>
                    </th>
                    <th class="w-[20%]">
                        <div class="flex items-center font-normal text-start">
                            <p class="mx-[1vw]">Prices</p>
                            <img src="/image/icons/dropdown.svg" class="w-[0.8vw]" alt="">
                        </div>
                    </th>
                    <th class="w-[20%]">
                        <div class="flex items-center font-normal text-start">
                            <p class="mx-[1vw]">Quantity</p>
                            <img src="/image/icons/dropdown.svg" class="w-[0.8vw]" alt="">
                        </div>
                    </th>
                    <th class="w-[20%]">
                        <div class="flex items-center font-normal text-start">
                            <p class="mx-[1vw]">Total</p>
                            <img src="/image/icons/dropdown.svg" class="w-[0.8vw]" alt="">
                        </div>
                    </th>
                </tr>
            </thead>
        </table>
        <div class="w-full overflow-scroll max-h-[25vw] pb-[2vw] border-b-[0.02vw] border-[#bbc6e4]">
            <table class="mt-[2vw] w-full">
                <tbody>
                    @foreach ($invoiceItems as $item)
                        <tr class="text-[0.9vw] h-[3vw]">
                            <td class="w-[21%]">
                                <p class="mx-[1vw]">{{ $item->items }}</p>
                            </td>
                            <td class="w-[17%]">
                                <p class="mx-[1vw]">{{ number_format($item->prices/$item->amount) }}</p>                                
                            </td>
                            <td class="w-[10%]">
                                <p class="mx-[1vw]">{{ $item->amount}}</p>
                            </td>
                            <td class="w-[10%]">
                                <p class="mx-[1vw]">{{ number_format($item->prices) }}</p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- End Table --}}

        <h2 class="w-full mt-[3vw] text-biru text-[1.8vw] text-end">
            Total : {{  number_format($invoice->total) }}
        </h2>

        {{-- If this clicked export to pdf --}}
        <button class="flex ml-[2vw] w-[8vw] h-[3vw] border-[0.1vw] border-[#c2c2c2] items-center justify-between px-[1vw] rounded-[0.5vw] absolute top-[2vw] right-[2vw]" onclick="printAndHide()">
            <p class="text-[0.9vw]">Print</p>
            <img src="/image/icons/print.svg" class="w-[1.4vw]" alt="">
        </button>
    </div>

    <script>
        function printAndHide() {
            // document.getElementById('printButton').style.display = 'hidden'; 
            window.print(); 
            setTimeout(function () {
                document.getElementById('printButton').style.display = 'block'; 
            }, 3000); 
        }
    </script>
    
</body>
</html>