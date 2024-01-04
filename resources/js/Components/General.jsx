import React from 'react'

const General = (props) => {
    return (
        <div className="flex flex-col justify-between pt-[2vw]">
            {/* General */}
            <div className="flex w-full justify-between">
                <div className="w-[20vw] flex h-[9vw] bg-white border-[0.1vw] items-center justify-center border-[#e9e9e9]">
                    <img src="/image/icons/income.svg" className="w-[4vw]" alt="" />
                    <p className="ml-[2vw] text-[0.8vw] text-[#A3AED0]">
                        Average Rating
                        <br />
                        <span className="text-[1.5vw] text-third">
                            {`${Math.round(props.averageRating * 10) / 10}/5`}
                        </span>
                    </p>
                </div>
                <div className="w-[31%] flex h-[9vw] bg-white border-[0.1vw] items-center justify-center border-[#e9e9e9]">
                    <img src="/image/icons/outcome.svg" className="w-[4vw]" alt="" />
                    <p className="ml-[2vw] text-[0.8vw] text-[#A3AED0]">
                        Average User's Starting Income
                        <br />
                        <span className="text-[1.5vw] text-[#2B3674]">
                            {`${props.averageIncomeStart}`}
                        </span>
                    </p>
                </div>
                <div className="w-[31%] flex flex-col justify-center h-[9vw] bg-white border-[0.1vw] border-[#e9e9e9] pl-[6vw]">
                    <p className="text-[0.8vw] text-[#A3AED0]">
                        Average User's Money Growth
                        <br />
                        {props.averageGrowth > 0 ? (
                            <span className="text-[1.5vw] text-red-400"></span>
                        ) : (
                            <span className="text-[1.5vw] text-green-400">
                                {`${props.averageGrowth} | ${Math.round(props.percentageDifference * 100) / 100}%`}
                            </span>
                        )}
                    </p>
                    <p className="text-[0.8vw] text-[#A3AED0]">
                        All Users
                    </p>
                </div>
            </div>
        </div>
    )
}

export default General