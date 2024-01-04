import React from 'react';
import { LineChart, Line, CartesianGrid, XAxis, YAxis, Tooltip, Legend, ResponsiveContainer } from 'recharts';

const LineUserCounts = (props) => {
    const totalUserData = props.totaluser;

    const userData = totalUserData.reduce((accumulator, dataPoint) => {
        const month = dataPoint.dates;

        const monthIndex = accumulator.findIndex(item => item.name === month);

        if (monthIndex === -1) {
            accumulator.push({
                name: month,
                userTotal: dataPoint.type === 'user' ? dataPoint.total : 0,
                companyTotal: dataPoint.type === 'company' ? dataPoint.total : 0,
            });
        } else {
            accumulator[monthIndex].userTotal += dataPoint.type === 'user' ? dataPoint.total : 0;
            accumulator[monthIndex].companyTotal += dataPoint.type === 'company' ? dataPoint.total : 0;
        }

        return accumulator;
    }, []);

    console.log(props.totaluser)

    return (
        <div className="mt-[2vw]">
            <div className="">
                <h2 className='text-[1vw] mb-[1vw] ml-[1.3vw]'>User Registered 2023 - Line Charts</h2>
            </div>
            <ResponsiveContainer width="100%" height={400}>
                <LineChart data={userData} margin={{ top: 5, right: 20, bottom: 5, left: 0 }}>
                    <CartesianGrid stroke="#ccc" strokeDasharray="5 5" />
                    <XAxis dataKey="name" />
                    <YAxis />
                    <Tooltip />
                    <Legend />
                    <Line type="monotone" dataKey="userTotal" stroke="#546fff" name="Individual" />
                    <Line type="monotone" dataKey="companyTotal" stroke="#f87171" name="Companies" />
                </LineChart>
            </ResponsiveContainer>
        </div>

    );
};

export default LineUserCounts;