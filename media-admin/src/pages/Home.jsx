import Sidebar from '../components/sidebar'
import EventCard from '../components/event_card'
import AddEventModal from '../components/modals/AddEvent'
import {useState, useEffect} from 'react'
import {Redirect} from 'react-router-dom'
import Cookies from 'js-cookie'


export default function Home() {
    const [eventi, setEventi]=useState([]);
    const [newUrl, setNewUrl]=useState(null)
    const [modalStatus, setModal]=useState(false);

    async function getUser(){
        fetch("http://api.mediaway.com:8080/user/all")
            .then(data=>data.json())
            .then()
    }

    async function fetchEvents(){
        fetch("http://api.mediaway.com:8080/event/all")
            .then(data=>data.json())
            .then(data=>{
                let ne = []
                data.events.map(i=>{
                    let event_date = Date.parse(i.period[1])
                    if((new Date()) < event_date){
                        ne.push(i)
                    }
                })
                setEventi(ne)
            })
    }

    useEffect(_=>fetchEvents(), [])

    if(newUrl !== null){
        return(
            <Redirect to={newUrl} />
        )
    }

    if(Cookies.get("token") == null){
        setNewUrl("/login")
    }

    return (
        <main className="h-screen overflow-x-hidden flex flex-col sm:py-12" style={{"backgroundImage":"url(login_bg.jpg)"}}>
            <div className="row-span-1 h-80 absolute mt-8 -ml-3">
                    <Sidebar />
            </div>
                {modalStatus ? <AddEventModal closer={_ => {setModal(false);}} onCreate={fetchEvents} /> : null}
            <div>
                <div className="ml-10 md:ml-32 md:mr-4 grid grid-cols-1 md:grid-cols-2">
                {eventi.map(a => {
                    return ( 
                        <div><EventCard onDelete={fetchEvents} eventId={a.id} eventName={a.name} eventDescription={a.description} setNewUrl={setNewUrl} id={a.id}/></div>
                    )
                })}
                    <div className="lg:m-4 inline-block align-middle shadow-md hover:shadow-lg hover:bg-gray-100 rounded-lg bg-white my-12 mx-8 cursor-pointer">
                        <div className="p-4 ">
                            <div onClick={_ => setModal(true)} className="inline-block align-middle flex m-auto justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" className="inline-block align-middle" viewBox="0 0 16 16">
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    )
}