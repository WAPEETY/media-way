export default function eventCard(){
    return(
        <div className="lg:m-4 shadow-md hover:shadow-lg hover:bg-gray-100 rounded-lg bg-white my-12 mx-8">
          <div className="p-4">
            <h3 className="font-medium text-gray-600 text-lg my-2 uppercase">Nome evento</h3>
            <p className="text-justify">Event description <br/> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint quibusdam quo eum quos unde? Eaque pariatur esse, atque cum modi vitae, id exercitationem sapiente non, error tempore reprehenderit eveniet magnam.</p>
            <div className="mt-5">
              <a href="" className="hover:bg-gray-700 rounded-full py-2 px-3 font-semibold hover:text-white bg-gray-400 text-gray-100">Read More</a>
            </div>
          </div>
        </div>
    )
}