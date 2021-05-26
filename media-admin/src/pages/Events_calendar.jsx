import Sidebar from '../components/sidebar'
import Calendar from '../components/calendar'

export default function Events_calendar(){
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