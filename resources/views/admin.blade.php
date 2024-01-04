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
            <a href="/logout" class="flex items-center pl-[2vw] mb-[1.5vw] w-[80%] h-[3.5vw] rounded-[0.5vw] hover:bg-[#F5F5F7] duration-[0.6s] ease">
                <img src="/image/icons/user.svg" class="w-[1.5vw] mr-[1.5vw]" alt="">
                <p class="text-[1vw] text-[#8E92BC]">Logout</p>
            </a>
        </div>

        <div class="ml-[19vw]  px-[3vw] w-full  relative  overflow-hidden">
            <div class="w-full flex items-center justify-between mt-[3vw]">
                <p class="text-third text-[1.6vw] leading-[2vw]">
                    Hi Admin! {{  ucfirst(session('username')) }}
                    <br><span class="text-[#828282] text-[1vw]">Let’s see what’s up today!</span>
                </p>
                <img src="/image/profil-dummy.png" class="w-[3.5vw]" alt="">
            </div>

            {{-- Charts --}}
            <div class="flex flex-col justify-between py-[2vw]">
                {{-- General --}}
                <div class="flex w-full justify-between">
                    <div class="w-[20vw] flex h-[9vw] bg-white border-[0.1vw] items-center justify-center border-[#e9e9e9]">
                        <img src="/image/icons/income.svg" class="w-[4vw]" alt="">
                        <p class="ml-[2vw] text-[0.8vw] text-[#A3AED0]">
                            Average Rating 
                            <br>
                            <span class="text-[1.5vw] text-third">
                                {{ round($averageRating, 1) }}/5
                            </span>
                        </p>
                    </div>
                    <div class="w-[31%] flex h-[9vw] bg-white border-[0.1vw] items-center justify-center border-[#e9e9e9]">
                        <img src="/image/icons/outcome.svg" class="w-[4vw]" alt="">
                        <p class="ml-[2vw] text-[0.8vw] text-[#A3AED0]">
                            Average User's Starting Income
                            <br>
                            <span class="text-[1.5vw] text-[#2B3674]">
                                {{ number_format($averageIncomeStart) }}
                            </span>
                        </p>
                    </div>
                    <div class="w-[31%] flex flex-col justify-center h-[9vw] bg-white border-[0.1vw] border-[#e9e9e9] pl-[6vw]">
                        <p class="text-[0.8vw] text-[#A3AED0]">
                            Average User's Money Growth
                            <br>
                            @if (null > 0)
                                <span class="text-[1.5vw] text-red-400">
                                    
                                </span>
                            @else
                                <span class="text-[1.5vw] text-green-400">
                                    {{ number_format($averageGrowth) }} | {{ round($percentageDifference,2) }}%
                                </span>
                            @endif
                            
                        </p>
                        <p class="text-[0.8vw] text-[#A3AED0]">
                            All Users
                        </p>
                    </div>
                </div>



                {{-- Users Chart --}}
                <div class="w-full bg-white mt-[2vw] pt-[2vw] pb-[5vw] px-[3vw] relative ">
                    <div class="w-full flex justify-between mb-[3vw]">
                        <div class="">
                            <h1 class="text-[1.4vw]">User Charts</h1>
                            <select name="date" id="date" class="outline-none text-[0.9vw] mt-[1vw]">
                                @foreach ($regionTotals->unique('year_month') as $item)
                                    <option value="{{ $item->year_month }}">{{ date('Y - F', strtotime($item->year_month)) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-center justify-center pr-[2vw]">
                            <img src="/image/icons/customer.svg" class="w-[4vw]" alt="">
                            <p class="ml-[2vw] text-[0.8vw] text-[#A3AED0]">
                                Total Users
                                <br>
                                <span class="text-[1.5vw] text-[#2B3674]">
                                    {{ $regionTotals->sum('total') }}
                                </span>
                            </p>
                        </div>
                    </div>
                    {{-- Bar Charts --}}
                    <div class="h-[20vw] w-full mt-[1vw] px-[0.2vw] pb-[2vw] relative">
                        {{-- SIDEBAR --}}
                        @for ($i = 0; $i < 4; $i++)
                        <div class="w-full flex h-[20%] items-center justify-center">
                            <p class="w-[1vw] text-center text-[0.9vw]">{{ round($regionTotals->max('total')*((4-$i)*25/100), 1) }}</p>
                            <div class="h-[0.05vw] ml-[1vw] w-full bg-[#373737] opacity-25"></div>
                        </div>
                        @endfor
                        

                        {{-- Tag --}}
                        <div class="absolute top-0 right-0 flex items-center justify-center">
                            <div class="w-[0.6vw] h-[0.6vw] bg-blue-400 mr-[0.3vw]"></div>
                            <p class="text-[0.8vw] mr-[1vw]">Individual</p>
                            <div class="w-[0.6vw] h-[0.6vw] bg-red-400 mr-[0.3vw]"></div>
                            <p class="text-[0.8vw] mr-[1vw]">Company</p>
                        </div>

                        {{-- CHARTS --}}
                        <div class="w-full h-full top-0 absolute flex items-end justify-end ml-[2vw] pr-[2.4vw] mt-[0.4vw]">
                            <div class="overflow-x-scroll w-full">
                                <div class="w-[210vw] h-[14vw] mb-[1vw] pl-[2vw] flex items-end">
                                    @foreach ($regionTotals->unique('region') as $uniqueRegion)
                                        @php
                                            $regionBaseData = $regionTotals->where('region', $uniqueRegion->region);
                                        @endphp
                                        <div class="w-[4vw] mr-[3vw] h-full flex items-end"
                                        data-date="{{ $uniqueRegion->year_month }}"
                                        id="filtered-div"
                                        >
                                            @foreach ($regionBaseData as $data)
                                                <div class="w-[2vw] {{ $data->type === 'user' ? 'bg-biru' : 'bg-red-400' }}" style="height: {{ ($data->total / $regionTotals->max('total')) * 100 }}%"
                                                    data-date="{{ $data->year_month }}"
                                                    id="filtered-div"
                                                    ></div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                                <div class="w-[210vw] pl-[2vw] flex pt-[1vw] items-end border-t-[0.1vw] border-[#909090]">
                                    @foreach ($regionTotals->unique('region') as $regionTotal)
                                        <div class="h-[100%] text-center w-[4vw] text-[0.9vw] mr-[3vw]"
                                        data-date="{{ $regionTotal->year_month }}"
                                        id="filtered-div"
                                        >
                                            {{ $regionTotal->region }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- Average Growth Chart --}}
                <div class="w-full bg-white mt-[2vw] py-[2vw] px-[3vw] flex justify-between">
                    <div class="flex justify-between mb-[3vw]">
                        <div class="">
                            <h1 class="text-[1.4vw]">Average Growth Charts</h1>
                            <select name="places" id="places" class="outline-none text-[0.9vw] mt-[1vw]">
                                <option value="jakarta">Agustus 2023</option>
                                <option value="jakarta">Agustus 2023</option>
                            </select>
                            <br>
                            <select name="places" id="places" class="outline-none text-[0.9vw] mt-[1vw]">
                                <option value="jakarta">Jakarta</option>
                                <option value="jakarta">Surabaya</option>
                            </select>
                            <div class="h-full flex items-center justify-start">
                                <div class="w-[0.6vw] h-[0.6vw] bg-blue-400 mr-[0.3vw]"></div>
                                <p class="text-[0.8vw] mr-[1vw]">Individual</p>
                                <div class="w-[0.6vw] h-[0.6vw] bg-red-400 mr-[0.3vw]"></div>
                                <p class="text-[0.8vw] mr-[1vw]">Company</p>
                            </div>
                        </div>
                    </div>
                    {{-- Charts --}}
                    <div class="w-[50%] h-full flex flex-col items-end mt-[2vw] relative">
                        <div class="w-full h-[10vw] flex">
                            <div class="w-[22%] border-r-[0.1vw] border-black opacity-25"></div>
                            <div class="w-[25%] border-r-[0.1vw] border-black opacity-25"></div>
                            <div class="w-[26%] border-r-[0.1vw] border-black opacity-25"></div>
                            <div class="w-[23%] border-r-[0.1vw] border-black opacity-25"></div>
                        </div>
                        <div class="w-full flex border-t-[0.1vw] border-black pt-[1vw]">
                            <p class="w-[25%] text-[0.8vw] text-end">25%</p>
                            <p class="w-[25%] text-[0.8vw] text-end">50%</p>
                            <p class="w-[25%] text-[0.8vw] text-end">75%</p>
                            <p class="w-[25%] text-[0.8vw] text-end">100% ></p>
                        </div>
                        <div class="w-full h-full absolute top-0 flex justify-center flex-col">
                            <div class="bg-biru h-[2vw] mb-[1vw]" style="width : 25%"></div>
                            <div class="bg-red-400 h-[2vw] mb-[2vw]" style="width : 83%"></div>
                        </div>
                    </div>
                    <div class="flex items-center mt-[2vw] justify-centermt-[5vw] flex-col ">
                        <img src="/image/icons/performance.svg" class="w-[10vw]" alt="">
                        <p class="mt-[-4vw] flex text-[2vw] items-center">23%<span>
                            @if (null > 0)
                                <img src="/image/icons/up.svg" class="w-[1.5vw] ml-[1vw]" alt="">
                            @else
                                <img src="/image/icons/down.svg" class="w-[1.5vw] ml-[1vw]" alt="">
                            @endif
                        </span></p>
                        <p class="text-[0.8vw]">Average Growth</p>
                    </div>
                </div>

                {{-- Users Chart --}}
                <div class="w-full bg-white mt-[2vw] pt-[2vw] pb-[5vw] px-[3vw] relative ">
                    <div class="w-full flex justify-between mb-[3vw]">
                        <div class="">
                            <h1 class="text-[1.4vw]">Cashflow Counts</h1>
                            <select name="places" id="places" class="outline-none text-[0.9vw] mt-[1vw]">
                                <option value="jakarta">Agustus 2023</option>
                                <option value="jakarta">Agustus 2023</option>
                            </select>
                        </div>
                        <div class="flex items-center justify-center pr-[2vw]">
                            <img src="/image/icons/customer.svg" class="w-[4vw]" alt="">
                            <p class="ml-[2vw] text-[0.8vw] text-[#A3AED0]">
                                Total Cashflows
                                <br>
                                <span class="text-[1.5vw] text-[#2B3674]">
                                    2301
                                </span>
                            </p>
                        </div>
                    </div>
                    {{-- Bar Charts --}}
                    <div class="h-[20vw] w-full mt-[1vw] px-[0.2vw] pb-[2vw] relative">
                        {{-- SIDEBAR --}}
                        <div class="w-full flex h-[20%] items-center justify-center">
                            <p class="w-[1vw] text-center text-[0.9vw]">40</p>
                            <div class="h-[0.05vw] ml-[1vw] w-full bg-[#373737] opacity-25"></div>
                        </div>
                        <div class="w-full flex h-[20%] items-center justify-center">
                            <p class="w-[1vw] text-[0.9vw] text-center">30</p>
                            <div class="h-[0.05vw] ml-[1vw] w-full bg-[#373737] opacity-25"></div>
                        </div>
                        <div class="w-full flex h-[20%] items-center justify-center">
                            <p class="w-[1vw] text-[0.9vw] text-center">20</p>
                            <div class="h-[0.05vw] ml-[1vw] w-full bg-[#373737] opacity-25"></div>
                        </div>
                        <div class="w-full flex h-[20%] items-center justify-center">
                            <p class="w-[1vw] text-[0.9vw] text-center">10</p>
                            <div class="h-[0.05vw] ml-[1vw] w-full bg-[#373737] opacity-25"></div>
                        </div>
                        <div class="w-full flex h-[20%] items-center justify-center">
                            <p class="w-[1vw] text-[0.9vw] text-center"></p>
                            <div class="h-[0.05vw] w-full"></div>
                        </div>

                        {{-- Tag --}}
                        <div class="absolute top-0 right-0 flex items-center justify-center">
                            <div class="w-[0.6vw] h-[0.6vw] bg-blue-400 mr-[0.3vw]"></div>
                            <p class="text-[0.8vw] mr-[1vw]">Individual</p>
                            <div class="w-[0.6vw] h-[0.6vw] bg-red-400 mr-[0.3vw]"></div>
                            <p class="text-[0.8vw] mr-[1vw]">Company</p>
                        </div>

                        {{-- CHARTS --}}
                        <div class="w-full h-full top-0 absolute flex items-end justify-end ml-[2vw] pr-[2.4vw] mt-[0.4vw]">
                            <div class="overflow-x-scroll w-full">
                                <div class="w-[210vw] h-[16vw] mb-[1vw] pl-[2vw] flex items-end">
                                        <div class="w-[4vw] mr-[3vw] h-full flex items-end" >
                                            <div class="w-[2vw] bg-biru" style="height : 20%"></div>
                                            <div class="w-[2vw] bg-red-400" style="height : 40%"></div>
                                        </div>
                                        <div class="w-[4vw] mr-[3vw] h-full flex items-end" >
                                            <div class="w-[2vw] bg-biru" style="height : 72%"></div>
                                            <div class="w-[2vw] bg-red-400" style="height : 20%"></div>
                                        </div>
                                </div>
                                <div class="w-[210vw] pl-[2vw] flex pt-[1vw] items-end border-t-[0.1vw] border-[#909090]">
                                        <div class="h-[100%] text-center w-[4vw] text-[0.9vw] mr-[3vw]">
                                            Surabaya
                                        </div>
                                        <div class="h-[100%] text-center w-[4vw] text-[0.9vw] mr-[3vw]">
                                            Denpasar
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
           
    <script src="/js/userdashboard.js"></script>    
    <script>
        // Get the select element
        const dateSelect = document.getElementById('date');
    
        // Add an event listener for change event
        dateSelect.addEventListener('change', filterDivs);
    
        // Call the filterDivs function to apply initial filtering
        filterDivs();
    
        // Function to filter divs based on selected date
        function filterDivs() {
            const selectedDate = dateSelect.value;
            const divs = document.querySelectorAll('#filtered-div');
            divs.forEach(div => {
                const divDate = div.getAttribute('data-date');
                if (divDate === selectedDate || selectedDate === '') {
                    div.style.display = 'flex'; 
                } else {
                    div.style.display = 'none'; 
                }
            });
        }
    </script>
    
</body>
</html>