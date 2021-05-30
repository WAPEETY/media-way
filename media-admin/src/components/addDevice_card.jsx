export default function deviceCard(props){

  function addDevice(){
    fetch("http://api.mediaway.com:8080/device/" + props.deviceId + "/add")
    .then(r=>props.onAdd())
  }

    return(
        <div className="lg:m-4 shadow-md hover:shadow-lg hover:bg-gray-100 rounded-lg bg-white my-12 mx-8">
          <div className="p-4">
            <h3 className="font-medium text-gray-600 text-lg my-2 uppercase">Aggiungi dispositivo</h3>
            <p className="text-justify"><input class="border border-gray-300 mt-2 rounded-full text-gray-600 h-10 pl-3 pr-8 bg-white hover:border-gray-400 focus:outline-none appearance-none" placeholder="nome modello" name="model" id="model"></input></p>
            <div className="mt-5">
              <div class="relative inline-flex">
                    <select class="border border-gray-300 mt-2 rounded-full text-gray-600 h-10 pl-3 pr-8 bg-white hover:border-gray-400 focus:outline-none appearance-none" name="model" id="model">
                    <option class="font-bold py-3" value="1">modello 1 - brand 1</option>
                    <option class="font-bold py-3" value="2">modello 2 - brand 1</option>
                    <option class="font-bold py-3" value="3">modello 3 - brand 1</option>
                    <option class="font-bold py-3" value="4">modello 4 - brand 2</option>
                    <option class="font-bold py-3" value="5">modello 5 - brand 2</option>
                    <option class="font-bold py-3" value="6">modello 6 - brand 2</option>
                    </select>
                </div>
                <a onClick={addDevice} className="hover:bg-gray-700 rounded-full ml-5 py-2 px-4 font-semibold hover:text-white bg-gray-400 text-gray-100">+</a>
            </div>
          </div>
        </div>
    )
}