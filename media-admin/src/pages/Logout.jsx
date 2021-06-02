import Cookies from "js-cookie"
import {Redirect} from "react-router-dom"

export default function LogoutScreen(){
    Cookies.remove('token')
    return <Redirect to="login" />
}