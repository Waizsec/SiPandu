<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SiPandu - Modify Your Stock</title>
    <link rel="shortcut icon" href="/image/logo.svg" type="/image/x-icon">
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
        <a href="/staff/logout" class="flex items-center pl-[2vw] mb-[1.5vw] w-[80%] h-[3.5vw] rounded-[0.5vw] hover:bg-[#F5F5F7] duration-[0.6s] ease">
            <img src="/image/icons/user.svg" class="w-[1.5vw] mr-[1.5vw]" alt="">
            <p class="text-[1vw] text-[#8E92BC]">Logout</p>
        </a>
    </div>

    {{-- Content --}}
    <div class="ml-[19vw] px-[3vw] w-full relative">
        <img src="/image/profil-dummy.png" class="absolute right-[2vw] top-[2vw] w-[3.5vw]" alt="">
        {{-- Title --}}
        <h1 class="text-third text-[2vw] w-full mt-[4vw] pb-[2vw] border-b-[0.1vw] border-[#9a9a9a] ">Dashboard</h1>

        @if (isset($stockdetail))
            {{-- Form Submit --}}
            <h2 class=" text-[1.5vw] mt-[3vw]">Add Items</h2>
            <div class="relative">
                <form action="/stock/update" method="post" class="flex flex-col w-full mt-[1vw] rounded-[0.5vw] px-[2vw] py-[2vw] bg-white">
                    @csrf
                    <div class="flex">
                        <div class="h-[4vw] w-[18%]">
                            <p class="text-[1vw] ">Items Name</p>
                            <input type="text" name="items" value="{{ $stockdetail->items }}" class="mt-[1vw] h-[2vw] pl-[1vw] border-l-[0.2vw] border-biru text-[0.9vw] outline-none">
                        </div>
                        <div class="h-[4vw] w-[15%]">
                            <p class="text-[1vw] ">Sell Price</p>
                            <input type="text" name="sell_price" value="{{ $stockdetail->sell_price }}" class="mt-[1vw] h-[2vw] pl-[1vw] border-l-[0.2vw] border-biru text-[0.9vw] outline-none">
                        </div>
                        <div class="h-[4vw] w-[15%]">
                            <p class="text-[1vw] ">Buy Price</p>
                            <input type="text" name="buy_price" value="{{ $stockdetail->buy_price }}" class="mt-[1vw] h-[2vw] pl-[1vw] border-l-[0.2vw] border-biru text-[0.9vw] outline-none">
                        </div>
                        <div class="h-[4vw] w-[15%]">
                            <p class="text-[1vw] ">Items Stock</p>
                            <div class="flex h-[4vw] items-center justify-start">
                                <span class=" text-[1.2vw] cursor-pointer" id="minus">-</span>
                                <p  class="mx-[1.2vw] text-[0.9vw] mt-[0.2vw]" id="stockvalue">{{ $stockdetail->stock }}</p>
                                <input type="number" name="stock" class="w-[2vw] hidden" value="{{ $stockdetail->stock }}" id="stock">
                                <span class=" text-[1.2vw] cursor-pointer" id="plus">+</span>
                            </div>
                        </div>
                        <div class="h-[4vw] w-[15%]">
                            <p class="text-[1vw] ">Items Type</p>
                            <div class="flex items-center">
                                <select id="myDropdown" name="type" class="pl-[0.3vw] mt-[0.2vw] rounded-[0.3vw] text-[0.8vw] border-[0.3px] border-[#e5e5e5] w-[10vw] h-[3vw] outline-none cursor-pointer" onchange="toggleCustomInput()">
                                    <option value="{{ $stockdetail->type }}">{{ $stockdetail->type }}</option>
                                    @foreach ($types as $type)
                                    <option value="{{ $type }}">{{ $type }}</option>
                                    @endforeach
                                    <option value="others">Others</option>
                                </select>
                                <input type="text" name="customtype" id="customtype" class="ml-[1vw] pl-[0.3vw] mt-[0.2vw] rounded-[0.3vw] text-[0.8vw] border-[0.3px] border-[#e5e5e5] w-[10vw] h-[3vw] outline-none cursor-pointer" placeholder="Custom Items Type">                        
                            </div>                
                        </div>
                    </div>
                    <div class="flex justify-end mt-[2vw]">
                        <div class="h-[6vw] flex items-center justify-center">
                            <input type="text" name="id" value="{{ $stockdetail->stockid }}" id="" hidden>
                            <button class="flex ml-[2vw] w-[8vw] h-[2.3vw] bg-biru text-white items-center justify-center px-[1vw] rounded-[0.5vw] ">
                                <p class="text-[0.9vw]">Update</p>
                            </button>
                        </div>
                    </div>
                </form>
                <a href="/stock/dashboard" method="post" class="absolute top-[-1vw] right-[-1vw]">
                    @csrf
                    <button class="flex ml-[2vw] w-[2.4vw] rounded-full h-[2.3vw] items-center justify-center px-[1vw] bg-red-500 text-white">
                        <p class="text-[1.3vw] font-semibold">x</p>
                    </button>
                </a>
                <form action="/stock/delete" method="post" class="absolute bottom-[3.8vw] right-[11vw]">
                    @csrf
                    <input type="text" name="id" value="{{ $stockdetail->stockid }}" hidden>
                    <button class="flex ml-[2vw] w-[8vw] h-[2.3vw] items-center justify-center px-[1vw] rounded-[0.5vw] bg-red-400 text-white" onclick="return confirm('Are you sure to delete this data?')">
                        <p class="text-[1vw]">Delete</p>
                    </button>
                </form>
            </div>
            
        @else
            {{-- Form Submit --}}
            <h2 class=" text-[1.5vw] mt-[3vw]">Add Items</h2>
            <form action="/add/stock" method="post" class="flex flex-col w-full mt-[1vw] rounded-[0.5vw] px-[2vw] py-[2vw] bg-white">
                @csrf
                <div class="flex">
                    <div class="h-[4vw] w-[18%]">
                        <p class="text-[1vw] ">Items Name</p>
                        <input type="text" name="items" placeholder="Type Here.." class="mt-[1vw] h-[2vw] pl-[1vw] border-l-[0.2vw] border-biru text-[0.9vw] outline-none">
                    </div>
                    <div class="h-[4vw] w-[15%]">
                        <p class="text-[1vw] ">Sell Price</p>
                        <input type="text" name="sell_price" placeholder="Ex: 250000" class="mt-[1vw] h-[2vw] pl-[1vw] border-l-[0.2vw] border-biru text-[0.9vw] outline-none">
                    </div>
                    <div class="h-[4vw] w-[15%]">
                        <p class="text-[1vw] ">Buy Price</p>
                        <input type="text" name="buy_price" placeholder="Ex: 250000" class="mt-[1vw] h-[2vw] pl-[1vw] border-l-[0.2vw] border-biru text-[0.9vw] outline-none">
                    </div>
                    <div class="h-[4vw] w-[15%]">
                        <p class="text-[1vw] ">Items Stock</p>
                        <div class="flex h-[4vw] items-center justify-start">
                            <span class=" text-[1.2vw] cursor-pointer" id="minus">-</span>
                            <p  class="mx-[1.2vw] text-[0.9vw] mt-[0.2vw]" id="stockvalue">0</p>
                            <input type="number" name="stock" class="w-[2vw] hidden" value="0" id="stock">
                            <span class=" text-[1.2vw] cursor-pointer" id="plus">+</span>
                        </div>
                    </div>
                    <div class="h-[4vw] w-[15%]">
                        <p class="text-[1vw] ">Items Type</p>
                        <div class="flex items-center">
                            <select id="myDropdown" name="type" class="pl-[0.3vw] mt-[0.2vw] rounded-[0.3vw] text-[0.8vw] border-[0.3px] border-[#e5e5e5] w-[10vw] h-[3vw] outline-none cursor-pointer" onchange="toggleCustomInput()">
                                @foreach ($types as $type)
                                <option value="{{ $type }}">{{ $type }}</option> 
                                @endforeach
                                <option value="others">Others</option>
                            </select>
                            <input type="text" name="customtype" id="customtype" class="ml-[1vw] pl-[0.3vw] mt-[0.2vw] rounded-[0.3vw] text-[0.8vw] border-[0.3px] border-[#e5e5e5] w-[10vw] h-[3vw] outline-none cursor-pointer" placeholder="Custom Items Type">                        
                        </div>                
                    </div>
                </div>
                <div class="flex justify-end mt-[2vw]">
                    <div class="h-[6vw] flex items-center justify-center">
                        <button class="flex ml-[2vw] w-[8vw] h-[3vw] border-[0.1vw] border-[#c2c2c2] items-center justify-between px-[1vw] rounded-[0.5vw] ">
                            <p class="text-[0.9vw]">Add</p>
                            <p class="text-[1.4vw] mt-[-0.3vw]">+</p>
                        </button>
                    </div>
                </div>
            </form>
        @endif


        {{-- Content 1 - Table --}}
        <div class="flex w-full justify-between mt-[3vw]">
            <h2 class=" text-[1.5vw]">Items List</h2>
            <div class="w-[20vw] bg-[#F4F7FE] flex items-center px-[1vw] rounded-[1vw] h-[3vw]">
                <div class="flex">
                    <form class="flex" action="/stock/dashboard" method="get">
                        @csrf
                        <button>
                            <img src="/image/icons/search.svg" class="w-[0.8vw]" alt="">
                        </button>
                        <input type="text" name="search" placeholder="Search" class="ml-[1vw] bg-transparent text-[0.9vw] outline-none" id="searchInput" value="<?php if(isset($searchTerm)) { echo $searchTerm; } ?>">
                    </form>
                </div>
            </div>
        </div>
        <table class="w-full">
            <thead>
                <tr class="border-b-[0.02vw] border-[#bbc6e4] h-[4vw] text-[#A3AED0] text-[0.9vw]">
                    <th class="w-[20%]">
                        <div class="flex items-center font-normal text-start">
                            <p class="mx-[1vw]">Items</p>
                            <img src="/image/icons/dropdown.svg" class="w-[0.8vw]" alt="">
                        </div>
                    </th>
                    <th class="w-[17%]">
                        <div class="flex items-center font-normal text-start">
                            <p class="mx-[1vw]">Sell Price</p>
                            <img src="/image/icons/dropdown.svg" class="w-[0.8vw]" alt="">
                        </div>
                    </th>
                    <th class="w-[17%]">
                        <div class="flex items-center font-normal text-start">
                            <p class="mx-[1vw]">Buy Price</p>
                            <img src="/image/icons/dropdown.svg" class="w-[0.8vw]" alt="">
                        </div>
                    </th>
                    <th class="w-[17%]">
                        <div class="flex items-center font-normal text-start">
                            <p class="mx-[1vw]">Stock</p>
                            <img src="/image/icons/dropdown.svg" class="w-[0.8vw]" alt="">
                        </div>
                    </th>
                    <th class="font-normal text-start">
                        <div class="flex items-center">
                            <p class="mx-[1vw]">Type</p>
                            <img src="/image/icons/dropdown.svg" class="w-[0.8vw]" alt="">
                        </div>
                    </th>
                    <th class="w-[17%]"></th>
                </tr>
            </thead>
        </table>
        <div class="w-full overflow-scroll max-h-[25vw] pb-[2vw] border-b-[0.02vw] border-[#bbc6e4]">
            <table class="mt-[2vw] w-full">
                <tbody>
                    @foreach ($stocks as $stock)
                    <tr class="text-[0.9vw] h-[3vw]">
                        <td class="w-[20.2%]">
                            <p class="mx-[1vw]">{{ $stock->items }}</p>
                        </td>
                        <td class="w-[17%]">
                            <p class="mx-[1vw]">{{ $stock->sell_price }}</p>
                            
                        </td>
                        <td class="w-[17%]">
                            <p class="mx-[1vw]">{{ $stock->buy_price }}</p>
                        </td>
                        <td class="w-[17%]">
                            <p class="mx-[1vw]">{{ $stock->stock }}</p>
                        </td>
                        <td class="font-normal text-start">
                            <p class="mx-[1vw]">{{ $stock->type }}</p>
                        </td>
                        <td class="w-[17%]">
                            <form action="/stock/detailstock" method="GET">
                                @csrf
                                <input type="text" name="id" class="hidden" id="" value="{{ $stock->stockid }}">
                                <button class="w-[8vw] h-[2.3vw] rounded-[0.3vw] bg-biru hover:bg-[#4153b5] duration-700 ease text-white">Detail</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <div class="h-[10vw]"></div>
    </div>
  </div>

  <script src="/js/stock.js"></script>
</body>
</html>








