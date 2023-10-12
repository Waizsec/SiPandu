
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SiPandu - Finance, see how much u progress!</title>
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
        <a href="/dashboard" class="flex items-center pl-[2vw] mb-[1.5vw] hover:bg-[#F5F5F7] duration-[0.6s] ease w-[80%] h-[3.5vw] rounded-[0.5vw]">
            <img src="/image/icons/dashboard.svg" class="w-[1.5vw] mr-[1.5vw]" alt="">
            <p class="text-[#8E92BC] text-[1vw]">Dashboard</p>
        </a>
        <a href="/finance" class="flex items-center pl-[2vw] mb-[1.5vw] w-[80%] h-[3.5vw] rounded-[0.5vw] bg-[#F5F5F7]">
            <img src="/image/icons/finance-active.svg" class="w-[1.5vw] mr-[1.5vw]" alt="">
            <p class="text-[1vw] text-third">Finance</p>
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

    {{-- Content --}}
    <div class="ml-[19vw] px-[3vw] w-full relative">
        {{-- Title --}}
        <h1 class="text-third text-[2vw] w-full mt-[4vw] pb-[2vw] border-b-[0.1vw] border-[#9a9a9a] ">Finance Information</h1>

        {{-- Content 1 - Table --}}
        <div class="flex w-full justify-between mt-[3vw]">
            <h2 class=" text-[1.5vw]">Cashflow History</h2>
            <div class="flex">
                <div class="w-[15vw] bg-[#F4F7FE] flex items-center px-[1vw] rounded-[1vw] h-[3vw]">
                    <div class="flex">
                        <img src="/image/icons/search.svg" class="w-[0.8vw]" alt="">
                        <input type="text" placeholder="Search" class="ml-[1vw] bg-transparent text-[0.9vw] outline-none">
                    </div>
                </div>
                <select name="" id="" class="text-[0.9vw] ml-[2vw] bg-transparent outline-none">
                    <option value="week">This Week</option>
                </select>
            </div>
        </div>
        <table class="w-full">
            <thead>
                <tr class="border-b-[0.02vw] border-[#bbc6e4] h-[4vw] text-[#A3AED0] text-[0.9vw]">
                    <th class="w-[15%]">
                        <div class="flex items-center font-normal text-start">
                            <p class="mx-[1vw]">Name</p>
                            <img src="/image/icons/dropdown.svg" class="w-[0.8vw]" alt="">
                        </div>
                    </th>
                    <th class="w-[12.5%]">
                        <div class="flex items-center font-normal text-start">
                            <p class="mx-[1vw]">Date</p>
                            <img src="/image/icons/dropdown.svg" class="w-[0.8vw]" alt="">
                        </div>
                    </th>
                    <th class="w-[12.5%]">
                        <div class="flex items-center font-normal text-start">
                            <p class="mx-[1vw]">Cashflow</p>
                            <img src="/image/icons/dropdown.svg" class="w-[0.8vw]" alt="">
                        </div>
                    </th>
                    <th class="w-[12.5%]">
                        <div class="flex items-center font-normal text-start">
                            <p class="mx-[1vw]">Type</p>
                            <img src="/image/icons/dropdown.svg" class="w-[0.8vw]" alt="">
                        </div>
                    </th>
                    <th class="w-[12.5%]">
                        <div class="flex items-center font-normal text-start">
                            <p class="mx-[1vw]">Total</p>
                            <img src="/image/icons/dropdown.svg" class="w-[0.8vw]" alt="">
                        </div>
                    </th>
                    <th class="w-[25%]">
                        <div class="flex items-center font-normal text-start">
                            <p class="mx-[1vw]">Desc</p>
                            <img src="/image/icons/dropdown.svg" class="w-[0.8vw]" alt="">
                        </div>
                    </th>
                    <th class="w-[10%]"></th>
                </tr>
            </thead>
        </table>
        <div class="w-full overflow-scroll max-h-[25vw] pb-[2vw] border-b-[0.02vw] border-[#bbc6e4]">
            <table class="mt-[2vw] w-full">
                <tbody>
                    @foreach ($cashflows as $cashflow)
                    <tr class="text-[0.9vw] h-[3vw]">
                        <td class="w-[15.5%]">
                            <p class="mx-[1vw]">{{ $cashflow->cashflow }}</p>
                        </td>
                        <td class="w-[13%]">
                            <p class="mx-[1vw]">{{ $cashflow->created_at->format('Y-m-d') }}</p>
                            
                        </td>
                        <td class="w-[12.5%]">
                            <p class="mx-[1vw]">{{ $cashflow->type }}</p>
                        </td>
                        <td class="w-[12.5%]">
                            <p class="mx-[1vw]">{{ $cashflow->category }}</p>
                        </td>
                        <td class="w-[12.5%]">
                            <p class="ml-[1.3vw]">{{ $cashflow->total }}</p>
                        </td>
                        <td class="w-[25%]">
                            <p class="ml-[1.6vw] truncate-text">
                                {{ $cashflow->desc }}
                            </p>
                        </td>
                        
                        <td class="w-[10%]">
                            <form action="/detailfinance" method="GET">
                                @csrf
                                <input type="text" name="id" class="hidden" id="" value="{{ $cashflow->idfinance }}">
                                <button class="w-[8vw] h-[2.3vw] rounded-[0.3vw] bg-biru hover:bg-[#4153b5] duration-700 ease text-white">Detail</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        @if (isset($cashflowdetail))
            {{-- Form Submit --}}
        <h2 class=" text-[1.5vw] mt-[3vw]">Add New Cashflow</h2>
        <form class="bg-white" action="/deletefinance" method="POST">
            @csrf
            <input type="text" name="id" class="hidden" id="" value="{{ $cashflow->idfinance }}">
            <div class="flex w-full mt-[1vw] rounded-[0.5vw] px-[2vw] py-[2vw] ">
                <div class="h-[4vw] w-[25%]">
                    <p class="text-[1vw] ">Cashflow</p>
                    <input type="text" name="cashflow" value="{{ $cashflowdetail->cashflow }}" class="mt-[1vw] h-[2vw] pl-[1vw] border-l-[0.2vw] border-biru text-[0.9vw] outline-none">
                </div>
                <div class="h-[4vw] w-[15%]">
                    <p class="text-[1vw] ">Total Price</p>
                    <input type="text" name="total" value="{{ $cashflowdetail->total }}" class="mt-[1vw] h-[2vw] pl-[1vw] border-l-[0.2vw] border-biru text-[0.9vw] outline-none">
                </div>
                <div class="h-[4vw]">
                    <p class="text-[1vw] ">Type</p>
                    <select id="myDropdown" name="type" class="pl-[0.3vw] mt-[0.2vw] rounded-[0.3vw] text-[0.8vw] border-[0.3px] border-[#e5e5e5] w-[15vw] mr-[3vw] h-[3vw] outline-none cursor-pointer">
                        <option value="{{ $cashflowdetail->Type }}">{{ $cashflowdetail->type }}</option>
                    </select>
                </div>
                <div class="h-[4vw]">
                    <p class="text-[1vw] ">Category</p>
                    <select id="myDropdown" name="category" class="pl-[0.3vw] mt-[0.2vw] rounded-[0.3vw] text-[0.8vw] border-[0.3px] border-[#e5e5e5] w-[15vw] mr-[3vw] h-[3vw] outline-none cursor-pointer">
                        <option value="{{ $cashflowdetail->Category }}">{{ $cashflowdetail->category }}</option>
                    </select>
                </div>
            </div>
            <div class="flex w-full mt-[1vw] rounded-[0.5vw] px-[2vw] py-[2vw] justify-between relative">
                <div class="">
                    <p class="text-[1vw] ">Description</p>
                    <textarea name="desc" id="" cols="30" rows="10" placeholder="Type Here..." class="mt-[1vw] h-[6vw] w-[40vw] pl-[1vw] border-l-[0.2vw] border-biru text-[0.9vw] outline-none" >{{ $cashflowdetail->desc }}</textarea>
                </div>
                <div class="h-f flex items-center justify-end absolute bottom-[2vw] right-[4vw]">
                    <input type="text" name="id" value="{{ $cashflow->idfinance }}" hidden>
                    <button class="flex ml-[2vw] w-[8vw] h-[2.3vw] items-center justify-center px-[1vw] rounded-[0.5vw] bg-red-400 text-white" onclick="return confirm('Are you sure to delete this data?')">
                        <p class="text-[1vw]">Delete</p>
                    </button>
                </div>
            </div>
        </form>
        @else
            {{-- Form Submit --}}
        <h2 class=" text-[1.5vw] mt-[3vw]">Add New Cashflow</h2>
        <form class="bg-white" action="/addfinance" method="POST">
            @csrf
            <div class="flex w-full mt-[1vw] rounded-[0.5vw] px-[2vw] py-[2vw] ">
                <div class="h-[4vw] w-[25%]">
                    <p class="text-[1vw] ">Cashflow</p>
                    <input type="text" name="cashflow" placeholder="Type Here.." class="mt-[1vw] h-[2vw] pl-[1vw] border-l-[0.2vw] border-biru text-[0.9vw] outline-none">
                </div>
                <div class="h-[4vw] w-[15%]">
                    <p class="text-[1vw] ">Total Price</p>
                    <input type="text" name="total" placeholder="Ex: 250000" class="mt-[1vw] h-[2vw] pl-[1vw] border-l-[0.2vw] border-biru text-[0.9vw] outline-none">
                </div>
                <div class="h-[4vw]">
                    <p class="text-[1vw] ">Type</p>
                    <select id="myDropdown" name="type" class="pl-[0.3vw] mt-[0.2vw] rounded-[0.3vw] text-[0.8vw] border-[0.3px] border-[#e5e5e5] w-[15vw] mr-[3vw] h-[3vw] outline-none cursor-pointer">
                        <option value="income">Income</option>
                        <option value="outcome">Outcome</option>
                    </select>
                </div>
                <div class="h-[4vw]">
                    <p class="text-[1vw] ">Category</p>
                    <select id="myDropdown" name="category" class="pl-[0.3vw] mt-[0.2vw] rounded-[0.3vw] text-[0.8vw] border-[0.3px] border-[#e5e5e5] w-[15vw] mr-[3vw] h-[3vw] outline-none cursor-pointer">
                        <option value="others">Others</option>
                    </select>
                </div>
            </div>
            <div class="flex w-full mt-[1vw] rounded-[0.5vw] px-[2vw] py-[2vw] justify-between relative">
                <div class="">
                    <p class="text-[1vw] ">Description</p>
                    <textarea name="desc" id="" cols="30" rows="10" placeholder="Type Here..." class="mt-[1vw] h-[6vw] w-[40vw] pl-[1vw] border-l-[0.2vw] border-biru text-[0.9vw] outline-none" ></textarea>
                </div>
                <div class="h-f flex items-center justify-end absolute bottom-[2vw] right-[4vw]">
                    <button class="flex ml-[2vw] w-[8vw] h-[3vw] border-[0.1vw] border-[#c2c2c2] items-center justify-between px-[1vw] rounded-[0.5vw] ">
                        <p class="text-[0.9vw]">Add</p>
                        <p class="text-[1.4vw] mt-[-0.3vw]">+</p>
                    </button>
                </div>
            </div>
        </form>
        @endif
        

        <div class="h-[10vw]"></div>
    </div>

  </div>
</body>
</html>


