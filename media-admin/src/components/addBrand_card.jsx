export default function brandCard(props){

  function addBrand(){
    fetch("http://api.mediaway.com:8080/device/" + props.deviceId + "/add")
    .then(r=>props.onAdd())
  }

    return(
        <div className="lg:m-4 shadow-md hover:shadow-lg hover:bg-gray-100 rounded-lg bg-white my-12 mx-8">
          <div className="p-4">
            <h3 className="font-medium text-gray-600 text-lg my-2 uppercase">Aggiungi Brand</h3>
            <div className="mt-5">
              <div class="relative inline-flex">
                    <input class="border border-gray-300 mt-2 rounded-full w-3/4 text-gray-600 h-10 pl-3 pr-8 bg-white hover:border-gray-400 focus:outline-none appearance-none" placeholder="nome brand" name="model" id="model">
                    </input>
                    <a onClick={addBrand} className="hover:bg-gray-700 rounded-full mt-2 ml-5 py-2 px-4 font-semibold hover:text-white bg-gray-400 text-gray-100">+</a>
                </div>
            </div>
          </div>
        </div>
    )
}