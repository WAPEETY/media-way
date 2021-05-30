import Sidebar from '../components/sidebar'
import DeviceCard from '../components/device_card'
import AddDeviceCard from '../components/addDevice_card'
import AddBrandCard from '../components/addBrand_card'
import {useState, useEffect} from 'react'

export default function Devices() {

    const [devices, setDevices]=useState([]);

    async function fetchDevices(){
        fetch("http://api.mediaway.com:8080/device/all")
            .then(data=>data.json())
            .then(data=>{setDevices(data.device)})
    }

    useEffect(()=>fetchDevices(), [])

    return (
        <main className="h-screen overflow-x-hidden flex flex-col sm:py-12" style={{"backgroundImage":"url(login_bg.jpg)"}}>
            <div className="row-span-1 h-80 absolute mt-8 -ml-3">
                    <Sidebar />
                </div>
                <div>
                    <div className="ml-10 md:ml-32 md:mr-4 grid grid-cols-1 md:grid-cols-2"> 
                        {devices.map(a => (
                            <div><DeviceCard onDelete={fetchDevices} deviceId={a.id} deviceName={a.name} brandName={a.brand} deviceMinHZ={a.freq[0]} deviceMaxHZ={a.freq[1]} /></div>
                        ))}
                        </div>
                        <div className="ml-10 md:ml-32 md:mr-4 grid grid-cols-1 md:grid-cols-2">
                            <AddBrandCard />
                            <AddDeviceCard />
                        </div>
                </div>
        </main>
    )
}