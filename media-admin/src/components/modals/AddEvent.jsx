import {useEffect, useState} from 'react'
import Map from '../map'

export default function AddEventModal(props) {
    const [nome, setNome] = useState('')
    const [latitude, setLatitude] = useState('')
    const [longitude, setLongitude] = useState('')
    const [startDay, setStartDay] = useState('')
    const [endDay, setEndDay] = useState('')
    const [description, setDescription] = useState('')
    const [opensAt, setOpensAt] = useState('')
    

    function aggiungiEvento() {

        fetch('http://api.mediaway.com:8080/event/create', {
            body: JSON.stringify({name: nome, latitude: latitude, longitude: longitude, startDay: startDay, endDay: endDay, description: description, opensAt: opensAt}),
            method: "POST",
        })
            .then(data => data.json())
            .then(data => {
                if (data.error !== null) {
                    alert(data.error)
                }

                props.closer()
            })
    }


    return (
        <div className="fixed inset-0 overflow-y-auto z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div className="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div className="fixed inset-0 bg-gray-700 bg-opacity-75 transition-opacity" aria-hidden="true" onClick={props.closer}></div>
                <span className="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div className="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div className="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div className="mt-3 text-center sm:mt-0 sm:mx-2 sm:text-left">
                            <h3 className="text-2xl leading-6 font-medium text-gray-900" id="modal-title">Aggiungi Evento</h3>
                            <div className="grid grid-cols-2 gap-2 space-y-1 mt-8">
                                
                                <input type="text" value={nome} onChange={event => setNome(event.target.value)} className="col-span-2 border-2 rounded-full px-3 py-2 w-full bg-white text-gray-700 focus:outline-none focus:border-blue-400 focus:shadow" placeholder="Nome Evento" autoFocus />
                                <textarea type="text" value={description}  onChange={event => setDescription(event.target.value)} className="col-span-2 border-2 rounded-2xl px-3 py-2 w-full bg-white text-gray-700 focus:outline-none focus:border-blue-400 focus:shadow" placeholder="Descrizione" />
                                <label className="text-gray-400">data inizio:</label><input type="date" value={startDay}  onChange={event => setStartDay(event.target.value)} className="col-span-2 border-2 rounded-full px-3 py-2 w-full bg-white text-gray-700 focus:outline-none focus:border-blue-400 focus:shadow" />
                                <label className="text-gray-400">data fine:</label><input type="date" value={endDay} onChange={event => setEndDay(event.target.value)} className="col-span-2 border-2 rounded-full px-3 py-2 w-full bg-white text-gray-700 focus:outline-none focus:border-blue-400 focus:shadow" />
                                <label className="text-gray-400">apertura iscrizioni:</label><input type="date" value={opensAt}  onChange={event => setOpensAt(event.target.value)} className="col-span-2 border-2 rounded-full px-3 py-2 w-full bg-white text-gray-700 focus:outline-none focus:border-blue-400 focus:shadow" />

                                <input type="number" value={latitude} onChange={event => setLatitude(event.target.value)} className="border-2 rounded-full px-3 py-2 w-full bg-white text-gray-700 focus:outline-none focus:border-blue-400 focus:shadow" placeholder="Latitudine" max="1000000" min="0" />
                                <input type="number" value={longitude} onChange={event => setLongitude(event.target.value)} className="border-2 rounded-full px-3 py-2 w-full bg-white text-gray-700 focus:outline-none focus:border-blue-400 focus:shadow" placeholder="Longitudine" max="1000000" min="0" />
                                
                            </div>
                        </div>
                            <div className="flex flex-row-reverse pt-4 mx-2 pb-2">
                                <button type="submit" onClick={aggiungiEvento} className="w-full inline-flex justify-center rounded-full border border-transparent shadow-sm px-4 py-2 bg-purple-600 text-base font-medium text-white hover:bg-purple-700 font-bold focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                                    Aggiungi
                                </button>
                                <button type="button" onClick={props.closer} className="mt-3 w-full inline-flex justify-center rounded-full border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                    Cancella
                                </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}