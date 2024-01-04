import { BestSellingItems, CashflowCounts, General, ItemTrends, LineUserCounts, UserCounts } from '@/Components';
import AverageGrowth from '@/Components/AverageGrowth';
import React from 'react'

const Admin = (props) => {

    return (
        <div className="flex w-full mb-[10vw]">
            {/* Sidebar */}
            <div className="w-[19vw] h-[100vh] fixed bg-white top-0 z-[1] flex flex-col items-center border-r-[0.1vw] border-[#dfdfdf]">
                <div className="w-full h-[8vw] mb-[2vw] flex items-center justify-center">
                    <img src="/image/logo.svg" className="w-[3vw] mr-[1vw]" alt="" />
                    <h1 className="text-[2vw]">SiPandu</h1>
                </div>
                {/* Nav */}
                <a href="/dashboard" className="flex items-center pl-[2vw] mb-[1.5vw] bg-[#F5F5F7] w-[80%] h-[3.5vw] rounded-[0.5vw]">
                    <img src="/image/icons/dashboard-active.svg" className="w-[1.5vw] mr-[1.5vw]" alt="" />
                    <p className="text-third text-[1vw]">Dashboard</p>
                </a>
                <a href="/logout" className="flex items-center pl-[2vw] mb-[1.5vw] w-[80%] h-[3.5vw] rounded-[0.5vw] hover:bg-[#F5F5F7] duration-[0.6s] ease">
                    <img src="/image/icons/user.svg" className="w-[1.5vw] mr-[1.5vw]" alt="" />
                    <p className="text-[1vw] text-[#8E92BC]">Logout</p>
                </a>
            </div>

            <div className="ml-[19vw] px-[3vw] w-full relative overflow-hidden">
                <div className="w-full flex items-center justify-between mt-[3vw]">
                    <p className="text-third text-[1.6vw] leading-[2vw]">
                        Hi Admin!
                        <br />
                        <span className="text-[#828282] text-[1vw]">Let’s see what’s up today!</span>
                    </p>
                    <img src="/image/profil-dummy.png" className="w-[3.5vw]" alt="" />
                </div>

                {/* General Plot */}
                <General averageRating={props.averageRating} averageIncomeStart={props.averageIncomeStart} averageGrowth={props.averageGrowth} percentageDifference={props.percentageDifference} />

                {/* Average Growth */}
                <AverageGrowth usergrowth={props.usergrowth} />

                <div className="flex w-full mt-[2vw]">
                    <ItemTrends sellingItems={props.sellingItems} regions={props.regions} />

                    <BestSellingItems bestSellingItems={props.bestSellingItems} />
                </div>

                {/* User Count */}
                <UserCounts totaluser={props.totaluser} />

                {/* Cashflow Counts */}
                <CashflowCounts />

            </div>
        </div >
    );
};

export default Admin