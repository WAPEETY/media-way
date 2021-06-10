import Sidebar from '../components/sidebar'
import Cookies from "js-cookie"
import {Redirect} from "react-router-dom"

export default function Events(props){

    if(Cookies.get("token") == null){
        return <Redirect to="/login" />
    }

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
                                NOT IMPLEMENTED
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    )
}