import Sidebar from '../components/sidebar'
import EventCard from '../components/event_card'

export default function Home() {
    return (
        <main className="h-screen overflow-x-hidden flex flex-col sm:py-12" style={{"backgroundImage":"url(login_bg.jpg)"}}>
            
            <div className="row-span-1 h-80 absolute mt-8 -ml-3">
                    <Sidebar />
                </div>

                <div>
                    <div className="ml-10 md:ml-32 md:mr-4 grid grid-cols-1 md:grid-cols-2">
                        <div className=""><EventCard /></div>
                        <div className=""><EventCard /></div>
                        <div className=""><EventCard /></div>
                        <div className=""><EventCard /></div>
                        <div className=""><EventCard /></div>
                        <div className=""><EventCard /></div>
                        <div className=""><EventCard /></div>
                        <div className=""><EventCard /></div>
                        <div className=""><EventCard /></div>
                        <div className=""><EventCard /></div>
                        <div className=""><EventCard /></div>
                        <div className=""><EventCard /></div>
                        <div className=""><EventCard /></div>
                        <div className=""><EventCard /></div>
                    </div>
                </div>
        </main>
    )
}