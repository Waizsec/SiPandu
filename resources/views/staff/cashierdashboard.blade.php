<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SiPandu - Add new selling invoice</title>
    <link rel="shortcut icon" href="/image/logo.svg" type="image/x-icon">
    @vite('resources/css/app.css')
</head>
<body class="bg-[#FAFAFA]"> 
  <div class="flex w-full">
    {{-- Siderbar --}}
    <div class="w-[19vw] h-[100vh] fixed bg-white top-0 z-[1] flex flex-col items-center border-r-[0.1vw] border-[#dfdfdf]">
        <div class="w-full h-[8vw] mb-[2vw] flex items-center justify-center">
            <img src="/image/logo.svg" class="w-[3vw] mr-[1vw]" alt="">
            <h1 class="text-[2vw]">SiPandu</h1>
        </div>
        <a href="" class="flex items-center pl-[2vw] mb-[1.5vw] bg-[#F5F5F7] w-[80%] h-[3.5vw] rounded-[0.5vw]">
            <img src="/image/icons/dashboard-active.svg" class="w-[1.5vw] mr-[1.5vw]" alt="">
            <p class="text-third text-[1vw]">Dashboard</p>
        </a>
        <a href="/cashier/history" class="flex items-center pl-[2vw] mb-[1.5vw] w-[80%] h-[3.5vw] rounded-[0.5vw] hover:bg-[#F5F5F7] duration-[0.6s] ease">
            <img src="/image/icons/history.svg" class="w-[1.5vw] mr-[1.5vw]" alt="">
            <p class="text-[1vw] text-[#8E92BC]">History</p>
        </a>
        <a href="/staff/logout" class="flex items-center pl-[2vw] mb-[1.5vw] w-[80%] h-[3.5vw] rounded-[0.5vw] hover:bg-[#F5F5F7] duration-[0.6s] ease">
            <img src="/image/icons/user.svg" class="w-[1.5vw] mr-[1.5vw]" alt="">
            <p class="text-[1vw] text-[#8E92BC]">Logout</p>
        </a>
    </div>

    <div class="ml-[19vw] px-[3vw] w-full relative">
        <img src="/image/profil-dummy.png" class="absolute right-[2vw] top-[2vw] w-[3.5vw]" alt="">
        {{-- Title --}}
        <h1 class="text-third text-[2vw] w-full mt-[4vw] pb-[2vw] border-b-[0.1vw] border-[#9a9a9a]">Dashboard</h1>

        {{-- Generate Invoice --}}
        <div class="flex w-full mt-[2vw]">

            {{-- Menu Option --}}
            <div class="w-[50%] pr-[2vw]">
                <div class="flex justify-between items-center">
                    <h1 class="text-[1.8vw]">Items</h1>
                    <div class="w-[15vw] bg-[#F4F7FE] flex items-center px-[1vw] rounded-[1vw] h-[3vw]">
                        <form class="flex" action="/cashier/dashboard" method="get">
                            @csrf
                            <button>
                                <img src="/image/icons/search.svg" class="w-[0.8vw]" alt="">
                            </button>
                            <input type="text" name="search" placeholder="Search" class="ml-[1vw] bg-transparent text-[0.9vw] outline-none" id="searchInput" value="<?php if(isset($searchTerm)) { echo $searchTerm; } ?>">
                        </form>
                    </div>
                </div>
                <div class="flex mt-[1.8vw] justify-between">
                    <div class="flex flex-col items-start">
                        @foreach ($types as $type)
                            <button class="pl-[0.7vw] text-[#707070] text-[1.15vw] mb-[1.5vw] hover:border-l-[0.25vw] hover:border-biru hover:text-third duration-[0.2s] ease-out filter-button" data-type="{{ $type }}">
                                {{ $type }}
                            </button>
                        @endforeach
                    
                        <button class="pl-[0.7vw] text-[#707070] text-[1.15vw] mb-[1.5vw] hover:border-l-[0.25vw] hover:border-biru hover:text-third duration-[0.2s] ease-out filter-button selected" data-type="all">
                            All
                        </button>
                    </div>
                    <div class="max-h-[65vh] overflow-scroll" id="item-list">
                        @foreach ($stocks as $stock)
                            @if ($stock->stock >= 1)
                                <form action="/cashier/dashboard/add" method="post" class="w-[28vw] bg-white rounded-[0.8vw] mb-[1vw] flex py-[1vw] px-[1.2vw] justify-between items-center item" data-type="{{ $stock->type }}">
                                    @csrf
                                    <p class="text-[1vw] text-third w-[30%]">{{ $stock->items }}
                                        <br><span class="text-[0.8vw] text-[#535353]">{{ number_format($stock->sell_price) }}</span>
                                    </p>
                                    <div class="flex h-[4vw] items-center justify-start">
                                        @if (session()->has('cart'))
                                            @php
                                            $cart = session('cart');
                                            $itemInCart = false;
                                            $cartAmount = 0;
                                        
                                            foreach ($cart as $item) {
                                                if ($item['id'] == $stock->stockid) {
                                                    $itemInCart = true;
                                                    $cartAmount = $item['amount'];
                                                    break;
                                                }
                                            }
                                            @endphp
                                        
                                            <input type="number" class="outline-none w-[2vw] text-[1vw]" name="amount" id="myNumber" value="0" 
                                                max="{{ $stock->stock - $cartAmount }}" min="0" oninput="this.setCustomValidity(this.validity.valueMissing ? 'Please enter an amount' : 
                                                this.validity.rangeOverflow ? 'not enought stock' : '');" required>
                                        @else
                                            <input type="number" class="outline-none w-[2vw] text-[1vw]" name="amount" id="myNumber" value="0" 
                                                max="{{ $stock->stock }}" 
                                                oninput="this.setCustomValidity(this.validity.valueMissing ? 'Please enter an amount' : 
                                                this.validity.rangeOverflow ? 'not enought stock' : '');" min="0" required>
                                        @endif
                                    </div>
                                    <input type="text" name="id" value="{{ $stock->stockid }}" hidden>
                                    <button class="bg-biru w-[4vw] h-[2vw] text-white text-[0.9vw] rounded-[0.1vw] add-button">Add</button>
                                </form>
                            @endif
                        @endforeach
                    </div>                    
                </div>                
            </div>

            {{-- Option Preview --}}
            <div class="w-[50%]">
                <h1 class="text-[1.8vw]">Invoice Preview</h1>
                <div class="w-full min-h-[30vh] bg-white mt-[2vw] py-[2vw] px-[2vw] flex flex-col">
                    <input type="text" id="customerName" placeholder="Cust Name" class="text-[1.1vw] pl-[0.6vw] border-l-[0.2vw] border-biru outline-none" required>
                    <table class="w-full border-collapse mt-[2vw]" id="invoiceTable">
                        <thead>
                            <tr class=" h-[4vw]">
                                <th class="text-[1vw] text-start font-normal">Items</th>
                                <th class="text-[1vw] text-center font-normal">Quantity</th>
                                <th class="text-[1vw] text-center font-normal">Prices</th>
                                <th class="text-[1vw] text-center font-normal">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($carts))
                                @foreach ($carts as $item)
                                    <tr class="h-[2vw]">
                                        <td class="text-[1vw] text-start font-normal">{{ $item['items'] }}</td>
                                        <td class="text-[1vw] text-center font-normal">{{ $item['amount'] }}</td>
                                        <td class="text-[1vw] text-center font-normal">{{ $item['prices'] }}</td>
                                        <td class="text-[1vw] text-center font-normal">{{ $item['total'] }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    @if (isset($totalPrice))
                        <p class="text-[1vw] text-biru mt-[2vw]">
                            Total Price : {{ $totalPrice }}
                        </p>    
                    @endif
                    <div class="flex w-full justify-end">
                        <form action="/cashier/invoice/reset" method="post" onclick="return confirm('Yakin untuk mereset invoice ini?')">
                            @csrf
                            <input type="submit" value="Reset" class="self-end mt-[4vw] text-[0.9vw] text-white bg-red-400 h-[2.6vw] w-[6vw] mr-[1vw] rounded-[0.3vw] cursor-pointer">
                        </form>
                        <form action="/cashier/invoice/create" method="post">
                            @csrf
                            <input type="text" name="custname" value="" id="custname" hidden>
                            @if (isset($plainTotalPrice))
                                <input type="number" name="total" value="{{ $plainTotalPrice }}" id="custname" hidden>   
                            @else
                                <input type="number" name="total" value="0" id="custname" hidden>   
                            @endif
                            <input type="submit" value="Confirm Invoice" class="self-end mt-[4vw] text-[0.9vw] text-white bg-biru h-[2.6vw] w-[8vw] rounded-[0.3vw] cursor-pointer">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="/js/cashier.js"></script>
</body>
</html>