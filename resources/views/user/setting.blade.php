
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
        <a href="/finance" class="flex items-center pl-[2vw] mb-[1.5vw] w-[80%] h-[3.5vw] rounded-[0.5vw] hover:bg-[#F5F5F7] duration-[0.6s] ease  ">
            <img src="/image/icons/finance.svg" class="w-[1.5vw] mr-[1.5vw]" alt="">
            <p class="text-[1vw] text-[#8E92BC]">Finance</p>
        </a>
        <a href="/setting" class="flex items-center pl-[2vw] mb-[1.5vw] w-[80%] h-[3.5vw] rounded-[0.5vw] bg-[#F5F5F7]">
            <img src="/image/icons/setting-active.svg" class="w-[1.5vw] mr-[1.5vw]" alt="">
            <p class="text-[1vw] text-third">Setting</p>
        </a>
        <a href="/logout" class="flex items-center pl-[2vw] mb-[1.5vw] w-[80%] h-[3.5vw] rounded-[0.5vw] hover:bg-[#F5F5F7] duration-[0.6s] ease">
            <img src="/image/icons/user.svg" class="w-[1.5vw] mr-[1.5vw]" alt="">
            <p class="text-[1vw] text-[#8E92BC]">Logout</p>
        </a>
    </div>

    <div class="ml-[19vw] px-[3vw] w-full relative">
        <div class="w-full min-h-[10vw] bg-white mt-[2vw] flex px-[2vw] py-[3vw] rounded-[1vw] items-center">
            <img src="/image/profil-dummy.png" class="w-[15vw]" alt="">
            <div class="ml-[6vw]">
                <p class="flex text-[1.7vw] items-center">{{ ucfirst($userInfo->name) }}<img src="/image/icons/star.svg" class="ml-[1vw]" alt=""></p>
                <p class="mb-[1vw] mt-[0.3vw] text-[1.1vw] text-[#6F6F6F]"><?php if ($years < 1) { echo 'Less Than 1'; }else{echo $years;} ?> Year (Joined)</p>
                <p class="flex items-center text-[1.1vw] mb-[0.3vw] text-[#6F6F6F]">
                    <img src="/image/icons/profil-user.svg" class="w-[1.4vw] mr-[1vw]" alt="">
                    {{ $userInfo->phone }}
                </p>
                <p class="flex items-center text-[1.1vw] text-[#6F6F6F]">
                    <img src="/image/icons/alamat-user.svg" class="w-[1.4vw] mr-[1vw]" alt="">
                    {{ $userInfo->email }}
                </p>
            </div>
            <div class="ml-[9vw] flex flex-col justify-center text-center items-center w-[16vw]">
                <p class="flex text-[1.2vw] items-center mb-[-1vw]">Your Total Earning</p>
                <p class="text-[5.5vw] text-biru">{{ $totalmoney }}JT</p>
                <p class="flex items-center text-[0.7vw] text-[#6F6F6F] mt-[-1vw]">
                    *Earn 2JT more to reach 2 star!
                </p>
            </div>
        </div>

        {{-- Company Mode --}}
        @if (session('type') == 'user')
            @if (isset($tokencashier))
            <form class="flex mt-[3vw] items-center" action="/updatestatus" method="post">
                @csrf
                <h2 class="text-[1.7vw]">Company Mode {{ session('type') }}</h2>
                <button class="w-[4vw] h-[1.8vw] bg-[#70FF75] ml-[2vw] rounded-full relative cursor-pointer" onclick="return confirm('Change to user mode?')">
                    <div class="inner-div w-[1.8vw] h-full rounded-full bg-white border-[#70FF75] border-[0.1vw] move-right move-right"></div>
                </button>
            </form>
            @else
            <form class="flex mt-[3vw] items-center" action="/updatestatus" method="post">
                @csrf
                <h2 class="text-[1.7vw]">Company Mode</h2>
                <button class="w-[4vw] h-[1.8vw] bg-[#FF7373] ml-[2vw] rounded-full relative cursor-pointer" onclick="return confirm('Change to company mode? (You will not be able to revert this process)')">
                    <div class="inner-div w-[1.8vw] h-full rounded-full bg-white border-[#FF7373] border-[0.1vw]"></div>
                </button>
            </form>
            @endif
        @endif
       
        
        <div class="flex mt-[2vw] mb-[4vw]">
            <div class="flex flex-col px-[2vw] bg-white py-[1.5vw] rounded-[0.2vw] w-[27vw] mr-[3vw]">
                <div class="flex justify-between w-full">
                    <p class="text-third text-[1.2vw] leading-[1.3vw]">Cashier <br> <span class="text-[0.9vw] text-[#A3AED0]">Invoice Making</span></p>
                    @if (isset($tokenstock))
                        <p class="text-[0.9vw] text-hijau" id="statusb">Active</p>
                    @else
                        <p class="text-[0.9vw] text-merah" id="statusb">Inactive</p>
                    @endif
                </div>

                @if (isset($tokencashier))
                <div class="flex justify-between w-full items-center mt-[2.2vw]" id="tokensa">
                    <p class="text-secondary text-[1.1vw]">Token : {{ $tokencashier }}</p>
                    <a href="/staff/login" target="_blank" class="items-center justify-center bg-biru flex h-[2.7vw] rounded-full w-[40%] text-[0.9vw] text-white">Open Browser</a>
                </div>
                @endif
                
            </div>
            <div class="flex flex-col px-[2vw] bg-white py-[1.5vw] rounded-[0.2vw] w-[27vw]">
                <div class="flex justify-between w-full">
                    <p class="text-third text-[1.2vw] leading-[1.3vw]">Stock Admin <br> <span class="text-[0.9vw] text-[#A3AED0]">Stock Managing</span></p>
                    @if (isset($tokenstock))
                        <p class="text-[0.9vw] text-hijau" id="statusb">Active</p>
                    @else
                        <p class="text-[0.9vw] text-merah" id="statusb">Inactive</p>
                    @endif
                </div>
                @if (isset($tokenstock))
                <div class="flex justify-between w-full items-center mt-[2.2vw]" id="tokensa">
                    <p class="text-secondary text-[1.1vw]">Token : {{ $tokenstock }}</p>
                    <a href="/staff/login" target="_blank" class="items-center justify-center bg-biru flex h-[2.7vw] rounded-full w-[40%] text-[0.9vw] text-white">Open Browser</a>
                </div>
                @endif
            </div>
        </div>
        <div class="bg-hero w-full h-[20vw] mt-[2vw] rounded-[1vw] px-[3vw] py-[3vw] flex flex-col">
            <h1 class="text-[2vw] text-white">Make Report Now!</h1>
            <p class="text-[#E3DAFF] text-[1vw] w-[25vw] mt-[0.9vw] mb-[2.5vw]">See how much you earn and spend this month with specific declaration!</p>
            <a href="/finance" class="text-third bg-white w-[10vw] h-[3vw] flex items-center justify-center rounded-[0.7vw] text-[1vw]">
                Make Report
            </a>
        </div>
    </div>
  </div>
</body>
</html>


