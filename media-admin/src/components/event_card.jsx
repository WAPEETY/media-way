export default function eventCard(props){
    
  const ellipsisAfter = 300
  
  function deleteEvent(){
    fetch("http://api.mediaway.com:8080/event/" + props.eventId + "/delete")
    .then(r=>props.onDelete())
  }

  return(
        <div className="lg:m-4 shadow-md hover:shadow-lg hover:bg-gray-100 rounded-lg bg-white my-12 mx-8">
          <div className="p-4">
            <h3 className="font-medium text-gray-600 text-lg my-2 uppercase">{props.eventName}</h3>
            <p className="text-justify">{ (props.eventDescription.length > ellipsisAfter) ? props.eventDescription.substr(0, ellipsisAfter-1) + '...' : props.eventDescription }</p>
            <div className="mt-5">
              <a onClick={x => props.setNewUrl('/event/' + props.id)} className="cursor-pointer bg-purple-600 rounded-full py-2 px-3 font-semibold hover:text-white text-gray-100">

                <svg className="text-white fill-current h-5 w-5 mb-1 mr-2 inline text-gray-900 hover:text-green-500" viewBox="0 0 24 24">
                <path fill="white" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                </svg>
                            
                Gestisci

              </a>
              <a onClick={deleteEvent} className="cursor-pointer bg-red-500 ml-2 rounded-full py-2 px-3 font-semibold hover:text-white text-gray-100">
              
                <svg className="text-white fill-current h-5 w-5 mb-1 mr-2 inline text-gray-900 hover:text-green-500" viewBox="0 0 24 24">
                <path fill="white" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                </svg>
                            
                Elimina</a>
            </div>
          </div>
        </div>
    )
}