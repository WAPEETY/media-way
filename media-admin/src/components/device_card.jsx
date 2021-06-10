export default function deviceCard(props){

  function deleteDevice(){
    fetch("http://api.mediaway.com:8080/device/" + props.deviceId + "/delete")
    .then(r=>props.onDelete())
  }

    return(
        <div className="lg:m-4 shadow-md hover:shadow-lg hover:bg-gray-100 rounded-lg bg-white my-12 mx-8">
          <div className="p-4">
            <h3 className="font-medium text-gray-600 text-lg my-2 uppercase">{props.deviceName} - {props.brandName}</h3>
            <p className="text-justify">{props.deviceMinHZ/1000000} MHz - {props.deviceMaxHZ/1000000} MHz </p>
            <div className="mt-5">
              <a onClick={deleteDevice} className="cursor-pointer bg-red-500 rounded-full py-2 px-3 font-semibold hover:text-white text-gray-100">
                
                <svg className="text-white fill-current h-5 w-5 mb-1 mr-2 inline text-gray-900 hover:text-green-500" viewBox="0 0 24 24">
                  <path fill="white" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                </svg>
                            
                Elimina

              </a>
            </div>
          </div>
        </div>
    )
}