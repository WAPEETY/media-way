export default function deviceCard(props){

  function deleteAdmin(){
    fetch("http://api.mediaway.com:8080/admin/" + props.deviceId + "/delete")
    .then(r=>props.onDelete())
  }

    return(
        <div className="lg:m-4 shadow-md hover:shadow-lg hover:bg-gray-100 rounded-lg bg-white my-12 mx-8">
          <div className="p-4">
            <h3 className="font-medium text-gray-600 text-lg my-2 uppercase">{props.deviceName} - {props.brandName}</h3>
            <p className="text-justify">{props.deviceMinHZ/1000000} MHz - {props.deviceMaxHZ/1000000} MHz </p>
            <div className="mt-5">
              <a onClick={deleteAdmin} className="hover:bg-gray-700 rounded-full py-2 px-3 font-semibold hover:text-white bg-gray-400 text-gray-100">Elimina</a>
            </div>
          </div>
        </div>
    )
}