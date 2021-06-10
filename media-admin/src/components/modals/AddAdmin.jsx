import {useEffect, useState} from 'react'


export default function AddAdminModal(props) {
    const [name, setName] = useState('')
    const [surname, setSurname] = useState('')
    const [username, setUsername] = useState('')
    const [phone, setPhone] = useState('')
    const [email, setEmail] = useState('')
    const [level, setLevel] = useState(1)
    const [password, setPassword] = useState('')


    function addAdmin() {

        fetch('http://api.mediaway.com:8080/admin/create', {
            body: JSON.stringify({name: name, surname: surname, email: email, phone: phone, username: username, level: level, password: password}),
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
                            <h3 className="text-2xl leading-6 font-medium text-gray-900" id="modal-title">Aggiungi Amministratore</h3>
                            <div className="grid grid-cols-2 gap-2 space-y-1 mt-8">
                                <input type="text" value={name} onChange={admin => setName(admin.target.value)} className="border-2 rounded-full px-3 py-2 w-full bg-white text-gray-700 focus:outline-none focus:border-blue-400 focus:shadow" placeholder="Nome" autoFocus />
                                <input type="text" value={surname} onChange={admin => setSurname(admin.target.value)} className="border-2 rounded-full px-3 py-2 w-full bg-white text-gray-700 focus:outline-none focus:border-blue-400 focus:shadow" placeholder="Cognome" />
                                <input type="email" value={email} onChange={admin => setEmail(admin.target.value)} className="border-2 rounded-full px-3 py-2 w-full bg-white text-gray-700 focus:outline-none focus:border-blue-400 focus:shadow" placeholder="email" />
                                <input type="text" value={phone} onChange={admin => setPhone(admin.target.value)} className="border-2 rounded-full px-3 py-2 w-full bg-white text-gray-700 focus:outline-none focus:border-blue-400 focus:shadow" placeholder="telefono" />
                                <p className="divide-solid text-gray-900"></p>
                                <p className="grid grid-cols-2 gap-2 space-y-1 col-span-2">
                                    <input type="text" value={username} onChange={admin => setUsername(admin.target.value)} className="col-span-2 border-2 rounded-full px-3 py-2 w-full bg-white text-gray-700 focus:outline-none focus:border-blue-400 focus:shadow" placeholder="username" />
                                    <input type="text" value={password} onChange={admin => setPassword(admin.target.value)} className="col-span-2 border-2 rounded-full px-3 py-2 w-full bg-white text-gray-700 focus:outline-none focus:border-blue-400 focus:shadow" placeholder="password" />
                                </p>
                                <p>Permessi: </p>
                                <select value={level} onChange={admin => setLevel(admin.target.value)} className="col-span-2 border-2 rounded-full px-3 py-2 w-full bg-white text-gray-700 focus:outline-none focus:border-blue-400 focus:shadow" placeholder="permessi" >
                                    <option value="1">base</option>
                                    <option value="2">avanzati</option>
                                </select>

                            </div>
                        </div>
                            <div className="flex flex-row-reverse pt-4 mx-2 pb-2">
                                <button type="submit" onClick={addAdmin} className="w-full inline-flex justify-center rounded-full border border-transparent shadow-sm px-4 py-2 bg-purple-600 text-base font-medium text-white hover:bg-purple-700 font-bold focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
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