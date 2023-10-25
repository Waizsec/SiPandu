<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SiPandu - Welcome To Si Pandu!</title>
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
        {{-- Nav --}}
        <a href="/dashboard" class="flex items-center pl-[2vw] mb-[1.5vw] bg-[#F5F5F7] w-[80%] h-[3.5vw] rounded-[0.5vw]">
            <img src="/image/icons/dashboard-active.svg" class="w-[1.5vw] mr-[1.5vw]" alt="">
            <p class="text-third text-[1vw]">Dashboard</p>
        </a>
        <a href="/finance" class="flex items-center pl-[2vw] mb-[1.5vw] w-[80%] h-[3.5vw] rounded-[0.5vw] hover:bg-[#F5F5F7] duration-[0.6s] ease">
            <img src="/image/icons/finance.svg" class="w-[1.5vw] mr-[1.5vw]" alt="">
            <p class="text-[1vw] text-[#8E92BC]">Finance</p>
        </a>
        <a href="/setting" class="flex items-center pl-[2vw] mb-[1.5vw] w-[80%] h-[3.5vw] rounded-[0.5vw] hover:bg-[#F5F5F7] duration-[0.6s] ease">
            <img src="/image/icons/setting.svg" class="w-[1.5vw] mr-[1.5vw]" alt="">
            <p class="text-[1vw] text-[#8E92BC]">Setting</p>
        </a>
        <a href="/logout" class="flex items-center pl-[2vw] mb-[1.5vw] w-[80%] h-[3.5vw] rounded-[0.5vw] hover:bg-[#F5F5F7] duration-[0.6s] ease">
            <img src="/image/icons/user.svg" class="w-[1.5vw] mr-[1.5vw]" alt="">
            <p class="text-[1vw] text-[#8E92BC]">Logout</p>
        </a>
    </div>

    <div class="mx-[19vw] px-[3vw] w-full relative">
        <div class="w-full flex items-center justify-between mt-[3vw]">
            <p class="text-third text-[1.6vw] leading-[2vw]">
                Hi! {{  ucfirst(session('username')) }}
                <br><span class="text-[#828282] text-[1vw]">Let’s see what’s up today!</span>
            </p>
            <img src="/image/profil-dummy.png" class="w-[3.5vw]" alt="">
        </div>
        <div class="bg-hero w-full h-[20vw] mt-[2vw] rounded-[1vw] px-[3vw] py-[3vw] flex flex-col">
            <h1 class="text-[2vw] text-white">Make Report Now!</h1>
            <p class="text-[#E3DAFF] text-[1vw] w-[25vw] mt-[0.9vw] mb-[2.5vw]">See how much you earn and spend this month with specific declaration!</p>
            <a href="/finance" class="text-third bg-white w-[10vw] h-[3vw] flex items-center justify-center rounded-[0.7vw] text-[1vw]">
                Make Report
            </a>
        </div>

        {{-- Table --}}
        <div class="flex w-full mt-[3vw] justify-between">
            <h2 class=" text-[1.5vw]">Cashflow History</h2>
            <div class="flex">
                <div class="w-[15vw] bg-[#F4F7FE] flex items-center px-[1vw] rounded-[1vw] h-[3vw]">
                    <form class="flex" action="/dashboard" method="get">
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
                    <th class="w-[25%]">
                        <div class="flex items-center font-normal text-start">
                            <p class="mx-[1vw]">Nama </p>
                            <img src="/image/icons/dropdown.svg" class="w-[0.8vw]" alt="">
                        </div>
                    </th>
                    <th class="w-[20%]">
                        <div class="flex items-center font-normal text-start">
                            <p class="mx-[1vw]">Cashflow</p>
                            <img src="/image/icons/dropdown.svg" class="w-[0.8vw]" alt="">
                        </div>
                    </th>
                    <th class="w-[20%]">
                        <div class="flex items-center font-normal text-start">
                            <p class="mx-[1vw]">Type</p>
                            <img src="/image/icons/dropdown.svg" class="w-[0.8vw]" alt="">
                        </div>
                    </th>
                    <th class="w-[20%]">
                        <div class="flex items-center font-normal text-start">
                            <p class="mx-[1vw]">Total</p>
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
                    <div id="dataContainer">
                        @foreach ($cashflows as $item)                    
                        <tr class="text-[0.9vw] h-[3vw]" data-timestamp="{{ $item->created_at }}">
                            <td class="w-[25.5%]">
                                <p class="mx-[1vw]">{{ $item->cashflow }}</p>
                            </td>
                            <td class="w-[20%]">
                                <p class="mx-[1vw]">{{ $item->type }}</p>
                            </td>
                            <td class="w-[20%]">
                                <p class="mx-[1vw]">{{ $item->category }}</p>
                            </td>
                            <td class="w-[20%]">
                                <p class="mx-[1vw]">{{ $item->total }}</p>
                            </td>
                            <td class="w-[17%]">
                                <form action="/detailfinance" method="GET">
                                    @csrf
                                    <input type="text" name="id" class="hidden" id="" value="{{ $item->idfinance }}">
                                    <button class="w-[8vw] h-[2.3vw] rounded-[0.3vw] bg-biru hover:bg-[#4153b5] duration-700 ease text-white">Detail</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </div>
                </tbody>
            </table>
        </div>
    </div>

    {{-- Right Bar --}}
    <div class="w-[19vw] h-[100vh] fixed bg-white top-0 z-[1] flex flex-col items-center border-l-[0.1vw] right-0 border-[#dfdfdf] pt-[3.5vw] px-[2vw]">
       <div class="flex mb-[2vw] w-full">
            <img src="/image/icons/income.svg" alt="">
            <p class="ml-[2vw] text-[0.8vw] text-[#A3AED0]">
                Income
                <br>
                <span class="text-[1.5vw] text-third">
                    {{ $totalIncome }}
                </span>
            </p>
       </div>
       <div class="flex mb-[2vw] w-full">
        <img src="/image/icons/outcome.svg" alt="">
            <p class="ml-[2vw] text-[0.8vw] text-[#A3AED0]">
                Outcome
                 <br>
                <span class="text-[1.5vw] text-[#2B3674]">
                {{ $totalOutcome }}
                </span>
            </p>
        </div>
        {{-- <div class="flex mb-[2vw] w-full">
            <img src="/image/icons/customer.svg" alt="">
            <p class="ml-[2vw] text-[0.8vw] text-[#A3AED0]">
                Total Customer
                <br>
                <span class="text-[1.5vw] text-[#2B3674]">
                    121
                </span>
            </p>
        </div> --}}
        <div class="flex flex-col mb-[2vw] justify-start w-full ml-[3vw]">
            <p class="text-[0.8vw] text-[#A3AED0]">
                Finances
                <br>
                <span class="text-[1.5vw] text-[#2B3674]">
                    {{  $totalmoney }}K
                </span>
            </p>
            <p class="text-[0.8vw] text-[#A3AED0]">
                <span class="text-green-500">0%</span> since last month
            </p>
        </div>
    </div>
  </div>

  <script src="/js/userdashboard.js"></script>
</body>
</html>