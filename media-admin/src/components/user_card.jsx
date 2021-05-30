export default function userCard(props){

    function activate(){
      fetch(`http://api.mediaway.com:8080/user/${props.id}/activate`)
        .then(data => data.json())
        .then(data => {
          if (data.error !== null) {
            alert(data.error)
          }

          props.onActivate()
        })
    }

    return(
        <div className="lg:m-4 shadow-md hover:shadow-lg hover:bg-gray-100 rounded-lg bg-white my-12 mx-8">
          <div className="p-4">
            <h3 className="font-medium text-gray-600 text-lg my-2 uppercase">{props.name}</h3>
            <p className="text-justify">{props.PEC}</p>
            <div className="mt-5">
              <a onClick={activate} className="hover:bg-gray-700 rounded-full py-2 px-3 font-semibold hover:text-white bg-gray-400 text-gray-100 cursor-pointer">Attiva utente</a>
            </div>
          </div>
        </div>
    )
}