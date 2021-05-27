function toggle(){
    if(document.getElementById("nav-items").classList.contains("open")){
        document.getElementById("nav-items").classList.remove("open")
    }
    else{
        document.getElementById("nav-items").classList.add("open")
    }
}