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
        <a href="" class="flex items-center pl-[2vw] mb-[1.5vw] bg-[#F5F5F7] w-[80%] h-[3.5vw] rounded-[0.5vw]">
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
        <a href="" class="flex items-center pl-[2vw] mb-[1.5vw] w-[80%] h-[3.5vw] rounded-[0.5vw] hover:bg-[#F5F5F7] duration-[0.6s] ease">
            <img src="/image/icons/user.svg" class="w-[1.5vw] mr-[1.5vw]" alt="">
            <p class="text-[1vw] text-[#8E92BC]">Logout</p>
        </a>
    </div>

    <div class="mx-[19vw] px-[3vw] w-full relative">
        <div class="w-full flex items-center justify-between mt-[3vw]">
            <p class="text-third text-[1.6vw] leading-[2vw]">
                Hi! Company Name
                <br><span class="text-[#828282] text-[1vw]">Let’s see what’s up today!</span>
            </p>
            <img src="/image/profil-dummy.png" class="w-[3.5vw]" alt="">
        </div>
        <div class="bg-hero w-full h-[20vw] mt-[2vw] rounded-[1vw] px-[3vw] py-[3vw] flex flex-col">
            <h1 class="text-[2vw] text-white">Make Report Now!</h1>
            <p class="text-[#E3DAFF] text-[1vw] w-[25vw] mt-[0.9vw] mb-[2.5vw]">See how much you earn and spend this month with specific declaration!</p>
            <a href="" class="text-third bg-white w-[10vw] h-[3vw] flex items-center justify-center rounded-[0.7vw] text-[1vw]">
                Make Report
            </a>
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
                    2.329K
                </span>
            </p>
       </div>
       <div class="flex mb-[2vw] w-full">
        <img src="/image/icons/outcome.svg" alt="">
            <p class="ml-[2vw] text-[0.8vw] text-[#A3AED0]">
                Outcome
                 <br>
                <span class="text-[1.5vw] text-[#2B3674]">
                2.329K
                </span>
            </p>
        </div>
        <div class="flex mb-[2vw] w-full">
            <img src="/image/icons/customer.svg" alt="">
            <p class="ml-[2vw] text-[0.8vw] text-[#A3AED0]">
                Total Customer
                <br>
                <span class="text-[1.5vw] text-[#2B3674]">
                    121
                </span>
            </p>
        </div>
        <div class="flex flex-col mb-[2vw] justify-start w-full ml-[3vw]">
            <p class="text-[0.8vw] text-[#A3AED0]">
                Finances
                <br>
                <span class="text-[1.5vw] text-[#2B3674]">
                    3.200K
                </span>
            </p>
            <p class="text-[0.8vw] text-[#A3AED0]">
                <span class="text-green-500">+23%</span> since last month
            </p>
        </div>
    </div>
  </div>
</body>
</html>