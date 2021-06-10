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
              <a onClick={activate} className="cursor-pointer bg-purple-600 rounded-full py-2 px-3 font-semibold hover:text-white text-gray-100 cursor-pointer">

              <svg className="text-white fill-current h-5 w-5 mb-1 mr-2 inline text-gray-900 hover:text-green-500" viewBox="0 0 24 24">
                <path fill="white" d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z" />  
              </svg>
                            
                Attiva

              </a>
            </div>
          </div>
        </div>
    )
}