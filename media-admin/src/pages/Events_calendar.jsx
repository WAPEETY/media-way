import Sidebar from '../components/sidebar'
import Calendar from '../components/calendar'
import Cookies from "js-cookie"
import {Redirect} from "react-router-dom"

export default function Events_calendar(){
    
    if(Cookies.get("token") == null){
        return <Redirect to="/login" />
    }
    
    return(
        <main className="h-screen overflow-x-hidden flex flex-col sm:py-12" style={{"backgroundImage":"url(login_bg.jpg)"}}>
            
            <div className="row-span-1 h-80 absolute mt-8 -ml-3">
                    <Sidebar />
                </div>

                <div>
                    <div className="ml-10 md:ml-32 md:mr-4 grid grid-cols-1">
                        <Calendar />
                    </div>
                </div>
        </main>
    )
}