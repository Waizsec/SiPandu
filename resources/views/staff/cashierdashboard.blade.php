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
                            <div class="w-[28vw] bg-white rounded-[0.8vw] mb-[1vw] flex py-[1vw] px-[1vw] justify-between items-center item" data-type="{{ $stock->type }}">
                                <p class="text-[1vw] text-third">{{ $stock->items }}
                                    <br><span class="text-[0.8vw] text-[#535353]">{{ $stock->sell_price }}</span>
                                </p>
                                <div class="flex h-[4vw] items-center justify-start">
                                    <button class="add-button text-[1.2vw]" data-id="{{ $stock->id }}">-</button>
                                    <p class="mx-[1.2vw] text-[0.9vw] mt-[0.2vw]">0</p>
                                    <button class="add-button text-[1.2vw]" data-id="{{ $stock->id }}">+</button>
                                </div>
                                <button class="bg-biru w-[4vw] h-[2vw] text-white text-[0.9vw] rounded-[0.1vw] add-button" data-id="{{ $stock->id }}">Add</button>
                            </div>
                        @endforeach
                    </div>                    
                </div>                
            </div>

            {{-- Option Preview --}}
            <div class="w-[50%]">
                <h1 class="text-[1.8vw]">Invoice Preview</h1>
                <div class="w-full min-h-[30vh] bg-white mt-[2vw] py-[2vw] px-[2vw] flex flex-col">
                    <input type="text" id="customerName" placeholder="Cust Name" class="text-[1.1vw] pl-[0.6vw] border-l-[0.2vw] border-biru outline-none">
                    <table class="w-full border-collapse mt-[2vw]" id="invoiceTable">
                        <thead>
                            <tr class="border-b-[0.1vw] border-[#b0b0b0] h-[4vw]">
                                <th class="text-[1vw] text-start font-normal">Items</th>
                                <th class="text-[1vw] text-start font-normal">Quantity</th>
                                <th class="text-[1vw] text-start font-normal">Prices</th>
                                <th class="text-[1vw] text-start font-normal">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Rows for invoice items will be dynamically added here -->
                        </tbody>
                    </table>
                    <input type="submit" id="confirmInvoice" value="Confirm Invoice" class="self-end mt-[4vw] text-[0.9vw] text-white bg-biru h-[2.6vw] w-[10vw] rounded-[0.3vw] cursor-pointer">
                </div>
            </div>
        </div>
    </div>

  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="/js/cashier.js"></script>
</body>
</html>