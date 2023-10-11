<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SiPandu - Modify Your Stock</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-[#FAFAFA]"> 
  <div class="flex w-full">
    {{-- Siderbar --}}
    <div class="w-[19vw] h-[100vh] fixed bg-white top-0 z-[1] flex flex-col items-center border-r-[0.1vw] border-[#dfdfdf]">
        <div class="w-full h-[8vw] mb-[2vw] flex items-center justify-center">
            <img src="image/logo.svg" class="w-[3vw] mr-[1vw]" alt="">
            <h1 class="text-[2vw]">SiPandu</h1>
        </div>
        <a href="" class="flex items-center pl-[2vw] mb-[1.5vw] bg-[#F5F5F7] w-[80%] h-[3.5vw] rounded-[0.5vw]">
            <img src="/image/icons/dashboard.svg" class="w-[1.5vw] mr-[1.5vw]" alt="">
            <p class="text-third text-[1vw]">Dashboard</p>
        </a>
        <a href="" class="flex items-center pl-[2vw] mb-[1.5vw] w-[80%] h-[3.5vw] rounded-[0.5vw] hover:bg-[#F5F5F7] duration-[0.6s] ease">
            <img src="/image/icons/user.svg" class="w-[1.5vw] mr-[1.5vw]" alt="">
            <p class="text-[1vw] text-[#8E92BC]">Logout</p>
        </a>
    </div>

    {{-- Content --}}
    <div class="ml-[19vw] px-[3vw] w-full relative">
        <img src="image/profil-dummy.png" class="absolute right-[2vw] top-[2vw] w-[3.5vw]" alt="">
        {{-- Title --}}
        <h1 class="text-third text-[2vw] w-full mt-[4vw] pb-[2vw] border-b-[0.1vw] border-[#9a9a9a] font-semibold">Dashboard</h1>

        {{-- Content 1 - Table --}}
        <div class="flex w-full justify-between mt-[3vw]">
            <h2 class="font-semibold text-[1.5vw]">Items List</h2>
            <div class="w-[20vw] bg-[#F4F7FE] flex items-center px-[1vw] rounded-[1vw] h-[3vw]">
                <img src="" alt="">
                <div class="flex">
                    <img src="image/icons/search.svg" class="w-[0.8vw]" alt="">
                    <input type="text" placeholder="Search" class="ml-[1vw] bg-transparent text-[0.9vw] outline-none">
                </div>
            </div>
        </div>
        <table class="w-full">
            <thead>
                <tr class="border-b-[0.02vw] border-[#bbc6e4] h-[4vw] text-[#A3AED0] text-[0.9vw]">
                    <th class="w-[20%]">
                        <div class="flex items-center font-normal text-start">
                            <p class="mx-[1vw]">Items</p>
                            <img src="image/icons/dropdown.svg" class="w-[0.8vw]" alt="">
                        </div>
                    </th>
                    <th class="w-[17%]">
                        <div class="flex items-center font-normal text-start">
                            <p class="mx-[1vw]">Sell Price</p>
                            <img src="image/icons/dropdown.svg" class="w-[0.8vw]" alt="">
                        </div>
                        
                    </th>
                    <th class="w-[17%]">
                        <div class="flex items-center font-normal text-start">
                            <p class="mx-[1vw]">Buy Price</p>
                            <img src="image/icons/dropdown.svg" class="w-[0.8vw]" alt="">
                        </div>
                    </th>
                    <th class="w-[17%]">
                        <div class="flex items-center font-normal text-start">
                            <p class="mx-[1vw]">Stock</p>
                            <img src="image/icons/dropdown.svg" class="w-[0.8vw]" alt="">
                        </div>
                    </th>
                    <th class="font-normal text-start">
                        <div class="flex items-center">
                            <p class="mx-[1vw]">Type</p>
                            <img src="image/icons/dropdown.svg" class="w-[0.8vw]" alt="">
                        </div>
                    </th>
                    <th class="w-[17%]"></th>
                </tr>
            </thead>
        </table>
        <div class="w-full overflow-scroll max-h-[25vw] pb-[2vw] border-b-[0.02vw] border-[#bbc6e4]">
            <table class="mt-[2vw] w-full">
                <tbody>
                    <tr class="text-[0.9vw] h-[3vw]">
                        <td class="w-[20.2%]">
                            <p class="mx-[1vw]">Items</p>
                        </td>
                        <td class="w-[17%]">
                            <p class="mx-[1vw]">Sell Price</p>
                            
                        </td>
                        <td class="w-[17%]">
                            <p class="mx-[1vw]">Buy Price</p>
                        </td>
                        <td class="w-[17%]">
                            <p class="mx-[1vw]">Stock</p>
                        </td>
                        <td class="font-normal text-start">
                            <p class="mx-[1vw]">Type</p>
                        </td>
                        <td class="w-[17%]">
                            <button class="w-[8vw] h-[2.3vw] rounded-[0.3vw] bg-biru hover:bg-[#4153b5] duration-700 ease text-white">Update</button>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>

        {{-- Form Submit --}}
        <h2 class="font-semibold text-[1.5vw] mt-[3vw]">Add Items</h2>
        <form class="flex w-full mt-[1vw] rounded-[0.5vw] px-[2vw] py-[2vw] bg-white">
            <div class="h-[4vw] w-[25%]">
                <p class="text-[1vw] font-semibold">Items Name</p>
                <input type="text" placeholder="Type Here.." class="mt-[1vw] h-[2vw] pl-[1vw] border-l-[0.2vw] border-biru text-[0.9vw] outline-none">
            </div>
            <div class="h-[4vw] w-[15%]">
                <p class="text-[1vw] font-semibold">Sell Price</p>
                <input type="text" placeholder="Ex: 250000" class="mt-[1vw] h-[2vw] pl-[1vw] border-l-[0.2vw] border-biru text-[0.9vw] outline-none">
            </div>
            <div class="h-[4vw] w-[15%]">
                <p class="text-[1vw] font-semibold">Buy Price</p>
                <input type="text" placeholder="Ex: 250000" class="mt-[1vw] h-[2vw] pl-[1vw] border-l-[0.2vw] border-biru text-[0.9vw] outline-none">
            </div>
            <div class="h-[4vw] w-[15%]">
                <p class="text-[1vw] font-semibold">Items Stock</p>
                <div class="flex h-[4vw] items-center justify-start">
                    <button class=" text-[1.2vw]">-</button>
                    <p class="mx-[1.2vw] text-[0.9vw] mt-[0.2vw]">0</p>
                    <button class=" text-[1.2vw]">+</button>
                </div>
            </div>
            <div class="h-[4vw] w-[15%]">
                <p class="text-[1vw] font-semibold">Items Type</p>
                <select id="myDropdown" name="fruit" class="pl-[0.3vw] mt-[0.2vw] rounded-[0.3vw] text-[0.8vw] border-[0.3px] border-[#e5e5e5] w-[10vw] h-[3vw] outline-none cursor-pointer">
                    <option value="apple">Apple</option>
                    <option value="banana">Banana</option>
                    <option value="cherry">Cherry</option>
                    <option value="orange">Orange</option>
                </select>
            </div>
            <div class="h-[6vw] flex items-center justify-center">
                <button class="flex ml-[2vw] w-[8vw] h-[3vw] border-[0.1vw] border-[#c2c2c2] items-center justify-between px-[1vw] rounded-[0.5vw] ">
                    <p class="text-[0.9vw]">Add</p>
                    <p class="text-[1.4vw] mt-[-0.3vw]">+</p>
                </button>
            </div>
        </form>
        <div class="h-[10vw]"></div>
    </div>

  </div>
</body>
</html>