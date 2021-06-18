import {useState} from "react"
import Cookies from "js-cookie"

export default function Login() {

    const [username,setUsername]=useState("")
    const [password,setPassword]=useState("")

    function authenticate(){
        fetch("http://api.mediaway.com:8080/login",{
            method:"POST",
            body:JSON.stringify(
                {
                    "username": username,
                    "password": password
                }
            )
        })
            .then(resp=>resp.json())
            .then(resp=>{
                if(resp.error != null){
                    alert(resp.error)
                }
                else{
                    Cookies.set('token', resp.data)
                    window.location.href="/"
                }
            })
    }
    return (
        <main className="min-h-screen flex flex-col justify-center sm:py-12" style={{"backgroundImage":"url(login_bg.jpg)"}}>
            <div className="p-10 xs:p-0 mx-auto md:w-full md:max-w-md">
                
                <div className="shadow w-full rounded-lg divide-y divide-gray-200 bg-white">
                    <h1 className="font-bold text-center  text-2xl mb-5">Media Way Admin APP</h1>
                    <div className="px-5 py-7">
                        <label className="font-semibold text-sm text-gray-600 pb-1 block">username</label>
                        <input value={username} onChange={event=>setUsername(event.target.value)} type="text" className="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
                        <label className="font-semibold text-sm text-gray-600 pb-1 block">Password</label>
                        <input value={password} onChange={event=>setPassword(event.target.value)} type="password" className="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
                        <button onClick={authenticate} type="button" className="transition duration-200 bg-blue-500 hover:bg-blue-600 focus:bg-blue-700 focus:shadow-sm focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 text-white w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center inline-block">
                            <span className="inline-block mr-2">Login</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" className="w-4 h-4 inline-block">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </main>
    )/*Add show password*/
}