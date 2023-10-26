<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SiPandu - Report Detail</title>
    <link rel="shortcut icon" href="/image/logo.svg" type="image/x-icon">
    @vite('resources/css/app.css')
</head>
<body class="bg-[#F0F0F0]">
   <div class="flex px-[2vw] py-[2vw] w-full justify-between">
    <div class="w-[25vw] h-[52vw] bg-white border-[0.1vw] border-[#e9e9e9] px-[3vw] py-[5vw]">
        <p class="text-biru text-[1.1vw]">Report</p>
        <p class="text-[1.9vw] mt-[0.3vw]">This Month</p>
        <p class="text-[0.9vw] font-thin">May 2023</p>
        <div class="flex items-center justify-center w-full mt-[5vw] flex-col">
            <img src="/image/icons/performance.svg" class="w-[70%]" alt="">
            <p class="mt-[-6vw] flex text-[4vw] items-center">35% <span><img src="/image/icons/up.svg" class="w-[2.5vw] ml-[1vw]" alt=""></span></p>
            <p class="text-[0.8vw]">Performance From Last Month</p>
        </div>
        <div class="w-full flex flex-col items-center justify-center border-t-[0.1vw] border-[#6b6b6b] mt-[3vw]">
            <p class="w-full text-justify mt-[1vw] text-[0.8vw]">In the pursuit of significant improvement in life, it is essential to focus on continuous skill development and unwavering determination. With a spirit of innovation and unyielding hard work, we can overcome every obstacle that arises along the </p>
            <a href="/finance" class="w-full flex items-center justify-center h-[4vw] border-[0.1vw] border-[#6b6b6b] rounded-[0.2vw] mt-[2vw]">
                Back To Home
            </a>
        </div>
        
    </div>

    <div class="w-[70vw] flex flex-col justify-between">
        <div class="flex w-full justify-between">
            <div class="w-[31%] flex h-[9vw] bg-white border-[0.1vw] items-center justify-center border-[#e9e9e9]">
                <img src="/image/icons/income.svg" class="w-[4vw]" alt="">
                <p class="ml-[2vw] text-[0.8vw] text-[#A3AED0]">
                    Income
                    <br>
                    <span class="text-[1.5vw] text-third">
                        {{ $totalIncome }}
                    </span>
                </p>
            </div>
            <div class="w-[31%] flex h-[9vw] bg-white border-[0.1vw] items-center justify-center border-[#e9e9e9]">
                <img src="/image/icons/outcome.svg" class="w-[4vw]" alt="">
                <p class="ml-[2vw] text-[0.8vw] text-[#A3AED0]">
                    Outcome
                    <br>
                    <span class="text-[1.5vw] text-[#2B3674]">
                    {{ $totalOutcome }}
                    </span>
                </p>
            </div>
            <div class="w-[31%] flex flex-col justify-center h-[9vw] bg-white border-[0.1vw] border-[#e9e9e9] pl-[6vw]">
                <p class="text-[0.8vw] text-[#A3AED0]">
                    Finances
                    <br>
                    <span class="text-[1.5vw] text-[#2B3674]">
                        {{  $totalmoney }}
                    </span>
                </p>
                <p class="text-[0.8vw] text-[#A3AED0]">
                    <span class="text-green-500">0%</span> since last month
                </p>
            </div>
        </div>
        <div class="w-full h-[41vw] bg-white py-[2vw] px-[3vw] relative">
             <div class="flex mb-[2vw] absolute top-[3vw] right-[5vw]">
                <img src="/image/icons/customer.svg" alt="">
                <p class="ml-[2vw] text-[0.8vw] text-[#A3AED0]">
                    Total Customer
                    <br>
                    <span class="text-[1.5vw] text-[#2B3674]">
                        121
                    </span>
                </p>
            </div>
            <h1 class="text-[1.5vw]">Customer Chart</h1>
            <div class="w-full mt-[4vw]">
                <div class="w-full flex items-end">
                    <div class="h-[25.5vw] w-[4vw] pr-[3vw] mr-[1vw] border-r-[0.1vw] border-[#909090] mb-[7vw] flex flex-col justify-between items-center">
                        <p class="text-[0.9vw]">100%</p>
                        <p class="text-[0.9vw]">75%</p>
                        <p class="text-[0.9vw]">25%</p>
                        <p class="text-[0.9vw]">0%</p>
                    </div>
                    <div class="w-full overflow-x-scroll">
                        <div class="overflow-x-scroll w-full">
                            <div class="w-[210vw] h-[25vw] flex items-end">
                                <div class="h-[100%] w-[4vw] bg-biru mr-[3vw]"></div>
                                <div class="h-[30%] w-[4vw] bg-biru mr-[3vw]"></div>
                                <div class="h-[53%] w-[4vw] bg-biru mr-[3vw]"></div>
                                <div class="h-[35%] w-[4vw] bg-biru mr-[3vw]"></div>
                                <div class="h-[74%] w-[4vw] bg-biru mr-[3vw]"></div>
                                <div class="h-[92%] w-[4vw] bg-biru mr-[3vw]"></div>
                                <div class="h-[80%] w-[4vw] bg-biru mr-[3vw]"></div>
                                <div class="h-[80%] w-[4vw] bg-biru mr-[3vw]"></div>
                                <div class="h-[80%] w-[4vw] bg-biru mr-[3vw]"></div>
                                <div class="h-[80%] w-[4vw] bg-biru mr-[3vw]"></div>
                                <div class="h-[80%] w-[4vw] bg-biru mr-[3vw]"></div>
                                <div class="h-[80%] w-[4vw] bg-biru mr-[3vw]"></div>
                                <div class="h-[80%] w-[4vw] bg-biru mr-[3vw]"></div>
                                <div class="h-[80%] w-[4vw] bg-biru mr-[3vw]"></div>
                                <div class="h-[80%] w-[4vw] bg-biru mr-[3vw]"></div>
                                <div class="h-[80%] w-[4vw] bg-biru mr-[3vw]"></div>
                            </div>
                            <div class="w-[210vw] h-[3vw] flex mt-[1vw] pt-[1vw] items-end border-t-[0.1vw] border-[#909090]">
                                <div class="h-[100%] text-center w-[4vw] text-[0.9vw] mr-[3vw]">1</div>
                                <div class="h-[100%] text-center w-[4vw] text-[0.9vw] mr-[3vw]">2</div>
                                <div class="h-[100%] text-center w-[4vw] text-[0.9vw] mr-[3vw]">3</div>
                                <div class="h-[100%] text-center w-[4vw] text-[0.9vw] mr-[3vw]">4</div>
                                <div class="h-[100%] text-center w-[4vw] text-[0.9vw] mr-[3vw]">5</div>
                                <div class="h-[100%] text-center w-[4vw] text-[0.9vw] mr-[3vw]">6</div>
                                <div class="h-[100%] text-center w-[4vw] text-[0.9vw] mr-[3vw]">7</div>
                                <div class="h-[100%] text-center w-[4vw] text-[0.9vw] mr-[3vw]">8</div>
                                <div class="h-[100%] text-center w-[4vw] text-[0.9vw] mr-[3vw]">9</div>
                                <div class="h-[100%] text-center w-[4vw] text-[0.9vw] mr-[3vw]">10</div>
                            </div>
                        </div>
                        <p class="w-full text-[0.9vw] text-center mt-[-1vw]">May 2023</p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
   </div>
</body>
</html>