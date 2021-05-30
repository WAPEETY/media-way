export default function eventCard(props){
    
  const ellipsisAfter = 300
  
  return(
        <div className="lg:m-4 shadow-md hover:shadow-lg hover:bg-gray-100 rounded-lg bg-white my-12 mx-8">
          <div className="p-4">
            <h3 className="font-medium text-gray-600 text-lg my-2 uppercase">{props.eventName}</h3>
            <p className="text-justify">{ (props.eventDescription.length > ellipsisAfter) ? props.eventDescription.substr(0, ellipsisAfter-1) + '...' : props.eventDescription }</p>
            <div className="mt-5">
              <a onClick={x => props.setNewUrl('/event/' + props.id)} className="hover:bg-gray-700 rounded-full py-2 px-3 font-semibold hover:text-white bg-gray-400 text-gray-100">Gestisci evento</a>
            </div>
          </div>
        </div>
    )
}