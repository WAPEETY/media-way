import Sidebar from '../components/sidebar'
export default function Events(props){
    return(
        <main className="h-screen overflow-x-hidden flex flex-col sm:py-12" style={{"backgroundImage":"url(../login_bg.jpg)"}}>
            <div className="row-span-1 h-80 absolute mt-8 -ml-3">
                    <Sidebar />
            </div>
            <div>
                <div className="ml-10 md:ml-32 md:mr-4 grid grid-cols-1 md:grid-cols-2">
                    <div className="lg:m-4 inline-block align-middle shadow-md hover:shadow-lg hover:bg-gray-100 rounded-lg bg-white my-12 mx-8 cursor-pointer">
                        <div className="p-4 ">
                            <div className="inline-block align-middle flex m-auto justify-center">
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