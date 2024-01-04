import React, { useState } from 'react'

const AverageGrowth = (props) => {
    const highestAvgGrowth = props.usergrowth.reduce((max, item) => (
        parseFloat(item.avggrowth) > parseFloat(max.avggrowth) ? item : max
    ), props.usergrowth[0] || {});

    const highestArray = [0.25, 0.50, 0.75, 1].map((factor) => {
        if (factor === null) {
            return null;
        }

        return Math.round(highestAvgGrowth.avggrowth * factor);
    });
    const regions = Array.from(new Set(props.usergrowth.map(item => item.region)));
    const yearMonths = Array.from(new Set(props.usergrowth.map(item => item.dates)));

    const [selectedDate, setSelectedDate] = useState(yearMonths[0]);
    const [selectedPlace, setSelectedPlace] = useState(regions[0]);

    const handleDateChange = (event) => {
        setSelectedDate(event.target.value);
    };

    const handlePlaceChange = (event) => {
        setSelectedPlace(event.target.value);
    };

    const usergrowth = props.usergrowth.filter(item => (
        item.region === selectedPlace && item.dates === selectedDate
    ));
    return (
        <div className="w-full bg-white mt-[2vw] py-[2vw] px-[3vw] flex justify-between">
            <div className="flex justify-between mb-[3vw]">
                <div>
                    <h1 className="text-[1.4vw]">Average Growth Charts</h1>
                    <select
                        name="date"
                        id="date"
                        className="outline-none text-[0.9vw] mt-[1vw]"
                        value={selectedDate}
                        onChange={handleDateChange}
                    >
                        {yearMonths.map((item, index) => (
                            <option value={item} key={index}>{item}</option>
                        ))}
                    </select>
                    <br />
                    <select
                        name="places"
                        id="places"
                        className="outline-none text-[0.9vw] mt-[1vw]"
                        value={selectedPlace}
                        onChange={handlePlaceChange}
                    >
                        {regions.map((item, index) => (
                            <option value={item} key={index}>{item}</option>
                        ))}
                    </select>
                    <div className="h-full flex items-center justify-start">
                        <div className="w-[0.6vw] h-[0.6vw] bg-blue-400 mr-[0.3vw]"></div>
                        <p className="text-[0.8vw] mr-[1vw]">Individual</p>
                        <div className="w-[0.6vw] h-[0.6vw] bg-red-400 mr-[0.3vw]"></div>
                        <p className="text-[0.8vw] mr-[1vw]">Company</p>
                    </div>
                </div>
            </div>

            {/* Charts */}
            <div className="w-[50%] h-full flex flex-col items-end mt-[2vw] relative">
                <div className="w-full h-[10vw] flex justify-between">
                    <div className="w-[20%] flex items-start justify-center flex-col">
                        <div className="w-[0.1vw] bg-black h-full opacity-25"></div>
                        <p className="text-[0.8vw] w-full  h-[2vw] mt-[1vw]  border-t-[0.1vw] border-black pt-[1vw]">0</p>
                    </div>
                    {highestArray.map((item, index) => (
                        <div className={`w-[20%] flex items-start justify-center flex-col`} key={index}>
                            <div className="w-[0.1vw] bg-black h-full opacity-25"></div>
                            <p key={index} className="text-[0.8vw] w-full  h-[2vw] mt-[1vw] ml-[-1.5vw] border-t-[0.1vw] border-black pt-[1vw]">{item.toLocaleString()}K</p>
                        </div>
                    ))}
                </div>
                <div className="w-[80%] h-full absolute left-0 top-0 flex justify-center flex-col ">
                    {usergrowth.map((item, index) => (
                        <div key={index} className={`${item.type == 'company' ? 'bg-red-400 mb-[3vw]' : 'bg-biru mb-[1vw]'} h-[2vw] ${item.avggrowth < 0 ? "hidden" : ""}`} style={{ width: `${item.avggrowth / highestArray[3] * 100}%` }}></div>
                    ))}
                </div>
            </div>

            <div className="flex items-center mt-[2vw] justify-centermt-[5vw] flex-col ">
                <img src="/image/icons/performance.svg" className="w-[10vw]" alt="" />
                <p className="mt-[-4vw] flex text-[2vw] items-center">
                    {((((usergrowth[0].avgtotal - usergrowth[0].avgincomestart) / usergrowth[0].avgincomestart * 100) + ((usergrowth[1].avgtotal - usergrowth[1].avgincomestart) / usergrowth[1].avgincomestart * 100)) / 2).toFixed(1)}%
                    <span>
                        {((usergrowth[0].avgincomestart)) > 0 ? (
                            <img src="/image/icons/up.svg" className="w-[1.5vw] ml-[1vw]" alt="" />
                        ) : (
                            <img src="/image/icons/down.svg" className="w-[1.5vw] ml-[1vw]" alt="" />
                        )}
                    </span>
                </p>
                <p className="text-[0.8vw] text-center">Average Growth
                    <br />
                    <span className='text-[0.5vw]'>(From Income Start)</span>
                </p>
            </div>
        </div >
    )
}

export default AverageGrowth