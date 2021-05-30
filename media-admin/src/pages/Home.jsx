import Sidebar from '../components/sidebar'
import EventCard from '../components/event_card'
import {useState, useEffect} from 'react'
import {Redirect} from 'react-router-dom'

export default function Home() {
    const [eventi, setEventi]=useState([]);
    const [newUrl, setNewUrl]=useState(null)
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

    useEffect(()=>fetchEvents(), [])
    

    if(newUrl !== null){
        return(
            <Redirect to={newUrl} />
        )
    }

    return (
        <main className="h-screen overflow-x-hidden flex flex-col sm:py-12" style={{"backgroundImage":"url(login_bg.jpg)"}}>
            <div className="row-span-1 h-80 absolute mt-8 -ml-3">
                    <Sidebar />
                </div>
                <div>
                    <div className="ml-10 md:ml-32 md:mr-4 grid grid-cols-1 md:grid-cols-2">
                    {eventi.map(a => {
                        return ( 
                            <div><EventCard eventName={a.name} eventDescription={a.description} setNewUrl={setNewUrl} id={a.id}/></div>
                        )
                    })}
                    </div>
                </div>
        </main>
    )
}