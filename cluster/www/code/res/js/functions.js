function toggle(){
    if(document.getElementById("nav-items").classList.contains("open")){
        document.getElementById("nav-items").classList.remove("open")
    }
    else{
        document.getElementById("nav-items").classList.add("open")
    }
}

function showPassword(){
    if(document.getElementById("passToggle").classList.contains("fa-eye-slash")){
        document.getElementById("passToggle").classList.remove("fa-eye-slash")
        document.getElementById("passToggle").classList.add("fa-eye")
        document.getElementById("passContainer").setAttribute("type","text")
    }
    else{
        document.getElementById("passToggle").classList.remove("fa-eye")
        document.getElementById("passToggle").classList.add("fa-eye-slash")
        document.getElementById("passContainer").setAttribute("type","password")
    }
}