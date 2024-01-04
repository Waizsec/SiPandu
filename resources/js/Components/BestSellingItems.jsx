import React, { useState } from 'react';

const BestSellingItems = (props) => {
    const [month, setMonth] = useState('March 2023');
    const months = [
        'January 2023', 'February 2023', 'March 2023', 'April 2023', 'May 2023', 'June 2023',
        'July 2023', 'August 2023', 'September 2023', 'October 2023', 'November 2023', 'December 2023'
    ];

    const updateMonth = (selectedMonth) => {
        setMonth(selectedMonth);
    };
    const filteredItems = props.bestSellingItems.filter(item => {
        return item.dates === month;
    });

    // Sort the filteredItems array based on total_quantity in descending order
    const sortedItems = filteredItems.sort((a, b) => {
        return parseInt(b.total_quantity, 10) - parseInt(a.total_quantity, 10);
    });

    // Get the top 5 items
    const top5Items = sortedItems.slice(0, 5);


    return (
        <div className="w-[60%] bg-white p-[5%]">
            <div className="flex items-center justify-between">
                <div className="">
                    <h1 className="text-[1.2vw]">Best Selling Items</h1>
                    <p className='text-[0.7vw]'>(All Places)</p>
                </div>

                <div className="flex w-[17vw] overflow-scroll mr-[2vw] items-center mt-[1vw]">
                    {months.map((item, index) => (
                        <button
                            key={index}
                            className={`mr-[1.5vw] text-[0.8vw] cursor-pointer duration-300 ease-in-out ${item !== month ? 'text-[#acacac]' : 'text-black'}`}
                            onClick={() => updateMonth(item)}
                        >
                            {item}
                        </button>
                    ))}
                </div>
            </div>



            <div className="mr-[2vw] mt-[1vw]">
                {top5Items.map((item, index) => (
                    <div className="w-full py-[0.9vw] bg-biru rounded-[0.3vw] mb-[0.3vw]" key={index}>
                        <p className='text-[0.9vw] text-white px-[2vw] flex'>
                            <span className='w-[40%]'> {index + 1}. {item.items}</span>
                            <span className='w-[10%]'>|</span>
                            <span className='w-[20%]'>Total : {item.total_quantity}</span>
                            <span className='w-[10%]'>|</span>
                            <span className='w-[20%]'>Average : {item.avg_quantity}</span>
                        </p>
                    </div>
                ))}
            </div>
        </div>
    );
};

export default BestSellingItems;
