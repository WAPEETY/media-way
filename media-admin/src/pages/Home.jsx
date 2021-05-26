import Sidebar from '../components/sidebar'

export default function Home() {
    return (
        <main className="min-h-screen flex flex-col justify-center sm:py-12" style={{"backgroundImage":"url(login_bg.jpg)"}}>
        <Sidebar />
        </main>
    )
}