import Sidebar from '../components/sidebar'
import AdminCard from '../components/admin_card'
import AddDeviceModal from '../components/modals/AddDevice'
import {useState, useEffect} from 'react'
import Cookies from "js-cookie"
import {Redirect} from "react-router-dom"


export default function Devices() {

    const [devices, setDevices]=useState([]);
    const [modalStatus, setModal]=useState(false);

    async function fetchAdmin(){
        fetch("http://api.mediaway.com:8080/admins/all")
            .then(data=>data.json())
            .then(data=>{setDevices(data.device)})
    }

    useEffect(()=>fetchAdmin(), [])

    if(Cookies.get("token") == null){
        return <Redirect to="/login" />
    }

return null;

//    return (
//        <main className="h-screen overflow-x-hidden flex flex-col sm:py-12" style={{"backgroundImage":"url(login_bg.jpg)"}}>
//            <div className="row-span-1 h-80 absolute mt-8 -ml-3">
//                <Sidebar />
//            </div>
//            {modalStatus ? <AddDeviceModal closer={_ => {setModal(false); fetchAdmin()}} /> : null}
//            <div>
//                <div className="ml-10 md:ml-32 md:mr-4 grid grid-cols-1 md:grid-cols-2"> 
//                    {devices.map(a => (
//                        <div><AdminCard onDelete={fetchAdmin} adminId={a.id} adminName={a.name} adminSurname={a.brand} adminPhone={a.freq[0]} adminLevel={a.freq[1]} adminMail={a.email} /></div>
//                    ))}
//                    
//                    <div className="lg:m-4 shadow-md hover:shadow-lg hover:bg-gray-100 rounded-lg bg-white my-12 mx-8 cursor-pointer">
//                        <div className="p-4">
//                            <div onClick={_ => setModal(true)} className="h-auto flex justify-center">
//                                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="" viewBox="0 0 16 16">
//                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
//                                </svg>
//                            </div>
//                        </div>
//                    </div>
//                </div>
//            </div>
//        </main>
//    )
}