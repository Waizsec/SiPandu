import React, { useState } from 'react'
import { PieChart, Pie, Cell, Legend, ResponsiveContainer } from 'recharts';

const ItemTrends = (props) => {
    const [month, setMonth] = useState('January 2023');
    const [region, setRegion] = useState('Surabaya')
    const months = [
        'January 2023', 'February 2023', 'March 2023', 'April 2023', 'May 2023', 'June 2023',
        'July 2023', 'August 2023', 'September 2023', 'October 2023', 'November 2023', 'December 2023'
    ];
    function cap(str) {
        return str.charAt(0).toUpperCase() + str.slice(1);
    }


    const updateMonth = (selectedMonth) => {
        setMonth(selectedMonth);
    };

    const updateRegion = (selectedRegion) => {
        setRegion(selectedRegion);
    };

    const filteredItems = props.sellingItems.filter(item => {
        return item.dates === month && item.region === region;
    });

    const sortedItems = filteredItems.sort((a, b) => {
        return parseInt(b.total_quantity, 10) - parseInt(a.total_quantity, 10);
    });

    const top5Items = sortedItems.slice(0, 5);

    const othersTotalQuantity = sortedItems.slice(5).reduce((total, item) => {
        return total + parseInt(item.total_quantity, 10);
    }, 0);

    const othersItem = {
        items: 'Others',
        total_quantity: othersTotalQuantity,
    };

    const finalItems = top5Items.concat(othersItem);

    const data = finalItems.map(item => ({
        name: item.items,
        value: parseInt(item.total_quantity, 10),
    }));

    const COLORS = ['#0088FE', '#00C49F', '#FFBB28', '#FF8042', '#FDFAS3', '#AF19E0'];

    return (
        <div className="w-[40%] bg-white px-[5vw] py-[4.5vw] mr-[1vw]">
            <div className="flex items-center justify-between">
                <div className="">
                    <h1 className="text-[1.2vw]">Item Trends </h1>

                </div>

                <div className="flex flex-col">
                    <select
                        name=""
                        id=""
                        className='text-[0.8vw] mt-[0.3vw] outline-none'
                        value={region}
                        onChange={(e) => updateRegion(e.target.value)}
                    >
                        {props.regions.map((item, index) => (
                            <option
                                value={item.region}  // Set the value attribute to the corresponding value
                                key={index}
                                className={`mr-[1.5vw] cursor-pointer duration-300 ease-in-out ${item.region !== region ? 'text-[#acacac]' : 'text-black'}`}
                            >
                                {cap(item.region)}
                            </option>
                        ))}
                    </select>
                    <select
                        name=""
                        id=""
                        className='text-[0.8vw] mt-[0.3vw] outline-none'
                        value={month}  // Set the value attribute to the state variable
                        onChange={(e) => updateMonth(e.target.value)}
                    >
                        {months.map((item, index) => (
                            <option
                                value={item}  // Set the value attribute to the corresponding value
                                key={index}
                                className={`mr-[1.5vw] cursor-pointer duration-300 ease-in-out ${item !== month ? 'text-[#acacac]' : 'text-black'}`}
                            >
                                {cap(item)}
                            </option>
                        ))}
                    </select>
                </div>
            </div>



            <ResponsiveContainer width="100%" height={400}>
                <PieChart>
                    <Pie
                        data={data}
                        dataKey="value"
                        cx="50%"
                        cy="50%"
                        outerRadius={80}
                        fill="#8884d8"
                        label
                    >
                        {data.map((entry, index) => (
                            <Cell key={`cell-${index}`} fill={COLORS[index % COLORS.length]} />
                        ))}
                    </Pie>
                    <Legend />
                </PieChart>
            </ResponsiveContainer>
        </div>
    )
}

export default ItemTrends