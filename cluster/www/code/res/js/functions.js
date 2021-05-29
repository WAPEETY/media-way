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

function generateMap(latitude, longitude){
    var mapPlace = document.getElementById('osm-map');
    mapPlace.style = 'height:300px;';
    var map = L.map(mapPlace);
    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var target = L.latLng(latitude, longitude);
    map.setView(target, 14);
    L.marker(target).addTo(map);
}