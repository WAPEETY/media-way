import Sidebar from '../components/sidebar'
import EventCard from '../components/event_card'

export default function Home() {
    return (
        <main className="min-h-screen flex flex-col justify-center sm:py-12" style={{"backgroundImage":"url(login_bg.jpg)"}}>
            
            <div className="h-64 grid grid-flow-col grid-cols-12 gap-4">
            <div className="col-span-3 md:col-span-1">
                    <Sidebar />
                </div>
                
                <div className="col-span-11 h-64 grid grid-flow-col grid-cols-2 gap-4">
                    <div><EventCard /></div>
                    <div><EventCard /></div>
                    <div><EventCard /></div>
                    <div><EventCard /></div>
                    <div><EventCard /></div>
                </div>
            </div>

        </main>
    )
}