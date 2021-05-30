import Sidebar from '../components/sidebar'
import UserCard from '../components/user_card'
import {useState, useEffect} from 'react'

export default function Users() {
    const [users, setUsers]=useState([]);
    
    async function fetchUsers(){
        fetch("http://api.mediaway.com:8080/user/all")
            .then(data=>data.json())
            .then(data=>{
                let de = []
                data.agencies.map(i=>{
                    if(!i.is_active){
                        de.push(i)
                    }
                })
                setUsers(de)
            })
    }

    useEffect(()=>fetchUsers(), [])

    return (
        <main className="h-screen overflow-x-hidden flex flex-col sm:py-12" style={{"backgroundImage":"url(login_bg.jpg)"}}>
            <div className="row-span-1 h-80 absolute mt-8 -ml-3">
                    <Sidebar />
                </div>
                <div>
                    <div className="ml-10 md:ml-32 md:mr-4 grid grid-cols-1 md:grid-cols-2">
                    {users.map(a => {
                        return ( 
                            <div><UserCard name={a.name} PEC={a.pec} id={a.id} onActivate={fetchUsers}/></div>
                        )
                    })}
                    </div>
                </div>
        </main>
    )
}