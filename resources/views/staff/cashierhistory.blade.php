<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SiPandu - Invoice History</title>
    <link rel="shortcut icon" href="/image/logo.svg" type="image/x-icon">
    @vite('resources/css/app.css')
</head>
<body class="bg-[#FAFAFA]"> 
  <div class="flex w-full">
    {{-- Siderbar --}}
    <div class="w-[19vw] h-[100vh] fixed bg-white top-0 z-[1] flex flex-col items-center border-r-[0.1vw] border-[#dfdfdf]">
        <div class="w-full h-[8vw] mb-[2vw] flex items-center justify-center">
            <img src="/image/logo.svg" class="w-[3vw] mr-[1vw] text-[#141522]" alt="">
            <h1 class="text-[2vw]">SiPandu</h1>
        </div>
        <a href="/cashier/dashboard" class="flex items-center pl-[2vw] mb-[1.5vw]  w-[80%] h-[3.5vw] rounded-[0.5vw] hover:bg-[#F5F5F7] duration-[0.6s] ease">
            <img src="/image/icons/dashboard.svg" class="w-[1.5vw] mr-[1.5vw] text-[#8E92BC]" alt="">
            <p class="text-[#8E92BC] text-[1vw]">Dashboard</p>
        </a>
        <a href="/cashier/history" class="flex items-center pl-[2vw] mb-[1.5vw] w-[80%] h-[3.5vw] rounded-[0.5vw] bg-[#F5F5F7] ">
            <img src="/image/icons/history-active.svg" class="w-[1.5vw] mr-[1.5vw] active-icons" alt="">
            <p class="text-[1vw] text-third">History</p>
        </a>
        <a href="/staff/logout" class="flex items-center pl-[2vw] mb-[1.5vw] w-[80%] h-[3.5vw] rounded-[0.5vw] hover:bg-[#F5F5F7] duration-[0.6s] ease">
            <img src="/image/icons/user.svg" class="w-[1.5vw] mr-[1.5vw]" alt="">
            <p class="text-[1vw] text-[#8E92BC]">Logout</p>
        </a>
    </div>

    <div class="ml-[19vw] px-[3vw] w-full relative">
        <img src="/image/profil-dummy.png" class="absolute right-[2vw] top-[2vw] w-[3.5vw]" alt="">
        {{-- Title --}}
        <h1 class="text-third text-[2vw] w-full mt-[4vw] pb-[2vw] border-b-[0.1vw] border-[#9a9a9a]">Invoice History</h1>

        
        {{-- Content 1 - Table Invoice --}}
        <div class="flex w-full mt-[3vw] justify-between">
            <h2 class=" text-[1.5vw]">Invoice List</h2>
            <div class="flex">
                <div class="w-[20vw] bg-[#F4F7FE] flex items-center px-[1vw] rounded-[1vw] h-[3vw]">
                    <form action="" method="get" class="flex">
                        <img src="/image/icons/search.svg" class="w-[0.8vw]" alt="">
                        @if (isset($searchTerm))
                            <input type="text" name="search" value="{{ $searchTerm }}" class="ml-[1vw] bg-transparent text-[0.9vw] outline-none">
                        @else 
                            <input type="text" name="search" value="" placeholder="Search" class="ml-[1vw] bg-transparent text-[0.9vw] outline-none">
                        @endif
                    </form>
                </div>
            </div>
        </div>
        <table class="w-full">
            <thead>
                <tr class="border-b-[0.02vw] border-[#bbc6e4] h-[4vw] text-[#A3AED0] text-[0.9vw]">
                    <th class="w-[25%]">
                        <div class="flex items-center font-normal text-start">
                            <p class="mx-[1vw]">Cust Name</p>
                            <img src="/image/icons/dropdown.svg" class="w-[0.8vw]" alt="">
                        </div>
                    </th>
                    <th class="w-[20%]">
                        <div class="flex items-center font-normal text-start">
                            <p class="mx-[1vw]">Total Payment</p>
                            <img src="/image/icons/dropdown.svg" class="w-[0.8vw]" alt="">
                        </div>
                    </th>
                    <th class="w-[20%]">
                        <div class="flex items-center font-normal text-start">
                            <p class="mx-[1vw]">Date</p>
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
                    @foreach ($invoices as $item)
                        <tr class="text-[0.9vw] h-[3vw]">
                            <td class="w-[25.5%]">
                                <p class="mx-[1vw]">{{ $item->custname }}</p>
                            </td>
                            <td class="w-[20%]">
                                <p class="mx-[1vw]">IDR {{ number_format($item->total) }}</p>                                
                            </td>
                            <td class="w-[20%]">
                                <p class="mx-[1vw]">{{ $item->created_at }}</p>
                            </td>
                            <td class="w-[17%]">
                                <div class="flex">
                                    <form action="/invoice/delete" method="post">
                                        @csrf
                                        <input type="number" name="id" value="{{ $item->id }}" hidden>
                                        <button class="w-[6vw] h-[2.3vw] mx-[0.2vw] rounded-[0.3vw] bg-red-400 hover:bg-[#d76c6c] duration-700 ease text-white" onclick="return confirm('Are you sure to delete this invoice?')">Delete</button>
                                    </form>
                                    <form action="/invoice/detail" method="get">
                                        <input type="number" name="id" value="{{ $item->id }}" hidden>
                                        <button class="w-[6vw] h-[2.3vw] mx-[0.2vw] rounded-[0.3vw] bg-biru hover:bg-[#4153b5] duration-700 ease text-white">Detail</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="h-[10vw]"></div>
    </div>

  </div>
</body>
</html>