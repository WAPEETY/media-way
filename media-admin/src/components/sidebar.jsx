export default function sidebar(){
    return(
        <div className="flex flex-row h-full"> 
            <nav className="bg-white w-20  justify-between flex flex-col md:ml-6 rounded-xl">
                <div className="mb-10">
                    <div className="mt-10">
                        <ul>
                        <li className="mb-6">
                                <a href="home">
                                    <span>
                                        <svg
                                            className="fill-current h-6 w-6 mx-auto text-gray-900 hover:text-green-500"
                                            viewBox="0 0 24 24"
                                        >
                                            
  <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />


                                        </svg>
                                    </span>
                                </a>
                            </li>
                            <li className="mb-6">
                                <a href="#">
                                    <span>
                                        <svg
                                            className="fill-current h-5 w-5 mx-auto text-gray-900 hover:text-green-500"
                                            viewBox="0 0 512 512"
                                        >
                                            <path d="m226 232c-63.963 0-116-52.037-116-116s52.037-116 116-116 116 52.037 116 116-52.037 116-116 116z"/>
                                            <path d="m271 317c0-25.68 7.21-49.707 19.708-70.167-19.515 9.693-41.48 15.167-64.708 15.167-30.128 0-58.152-9.174-81.429-24.874-28.782 11.157-55.186 28.291-77.669 50.774-42.498 42.497-65.902 98.999-65.902 159.099v50.001c0 8.284 6.716 15 15 15h420c8.284 0 15-6.716 15-15v-50.001c0-.901-.025-1.805-.036-2.708-14.072 4.986-29.205 7.709-44.964 7.709-74.439 0-135-60.561-135-135z"/>
                                            <path d="m406 212c-57.897 0-105 47.103-105 105s47.103 105 105 105 105-47.103 105-105-47.103-105-105-105zm30 120h-15v15c0 8.284-6.716 15-15 15s-15-6.716-15-15v-15h-15c-8.284 0-15-6.716-15-15s6.716-15 15-15h15v-15c0-8.284 6.716-15 15-15s15 6.716 15 15v15h15c8.284 0 15 6.716 15 15s-6.716 15-15 15z"/>

                                        </svg>
                                    </span>
                                </a>
                            </li>
                            <li className="mb-6">
                                <a href="#">
                                    <span>
                                        <svg
                                          className="fill-current h-5 w-5 text-gray-9 00 mx-auto hover:text-green-500"
                                          viewBox="-90 1 511 511"
                                        >
                                            
                                            <path d="m332.464844 275.082031c0-8.429687-6.835938-15.265625-15.269532-15.265625-8.433593 0-15.269531 6.835938-15.269531 15.265625 0 74.6875-60.757812 135.445313-135.445312 135.445313-74.683594 0-135.441407-60.757813-135.441407-135.445313 0-8.429687-6.835937-15.265625-15.269531-15.265625-8.433593 0-15.269531 6.835938-15.269531 15.265625 0 86.378907 66.320312 157.539063 150.710938 165.273438v41.105469h-56.664063c-8.433594 0-15.269531 6.835937-15.269531 15.269531 0 8.433593 6.835937 15.269531 15.269531 15.269531h143.871094c8.429687 0 15.265625-6.835938 15.265625-15.269531 0-8.433594-6.835938-15.269531-15.265625-15.269531h-56.667969v-41.105469c84.394531-7.730469 150.714844-78.894531 150.714844-165.273438zm0 0"/>
                                            <path d="m166.480469 372.851562c53.910156 0 97.769531-43.859374 97.769531-97.769531v-177.316406c0-53.90625-43.859375-97.765625-97.769531-97.765625-53.90625 0-97.765625 43.859375-97.765625 97.765625v177.316406c0 53.910157 43.859375 97.769531 97.765625 97.769531zm-67.230469-275.085937c0-37.070313 30.160156-67.226563 67.230469-67.226563 37.070312 0 67.230469 30.15625 67.230469 67.226563v177.316406c0 37.070313-30.160157 67.230469-67.230469 67.230469-37.070313 0-67.230469-30.160156-67.230469-67.230469zm0 0"/>
                                            <path d="m306 2c-57.897 0-105 47.103-105 105s47.103 105 105 105 105-47.103 105-105-47.103-105-105-105zm30 120h-15v15c0 8.284-6.716 15-15 15s-15-6.716-15-15v-15h-15c-8.284 0-15-6.716-15-15s6.716-15 15-15h15v-15c0-8.284 6.716-15 15-15s15 6.716 15 15v15h15c8.284 0 15 6.716 15 15s-6.716 15-15 15z"/>
                                        </svg>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="events_calendar">
                                    <span>
                                        <svg
                                          className="fill-current h-5 w-5 text-gray-900 mx-auto hover:text-green-500"
                                          viewBox="0 0 512 512"
                                          fill="none"
                                          xmlns="http://www.w3.org/2000/svg"
                                        >

                                            <circle cx="386" cy="210" r="20"/>
                                            
                                            <path 
                                            fillRule="evenodd"
                                            clipRule="evenodd"
                                            d="M432,40h-26V20c0-11.046-8.954-20-20-20c-11.046,0-20,8.954-20,20v20h-91V20c0-11.046-8.954-20-20-20
				                            c-11.046,0-20,8.954-20,20v20h-90V20c0-11.046-8.954-20-20-20s-20,8.954-20,20v20H80C35.888,40,0,75.888,0,120v312
				                            c0,44.112,35.888,80,80,80h153c11.046,0,20-8.954,20-20c0-11.046-8.954-20-20-20H80c-22.056,0-40-17.944-40-40V120
				                            c0-22.056,17.944-40,40-40h25v20c0,11.046,8.954,20,20,20s20-8.954,20-20V80h90v20c0,11.046,8.954,20,20,20s20-8.954,20-20V80h91
				                            v20c0,11.046,8.954,20,20,20c11.046,0,20-8.954,20-20V80h26c22.056,0,40,17.944,40,40v114c0,11.046,8.954,20,20,20
				                            c11.046,0,20-8.954,20-20V120C512,75.888,476.112,40,432,40z"
                                            fill="currentColor"/>
                                        
                                            <path d="M391,270c-66.72,0-121,54.28-121,121s54.28,121,121,121s121-54.28,121-121S457.72,270,391,270z M391,472
			                                	c-44.663,0-81-36.336-81-81s36.337-81,81-81c44.663,0,81,36.336,81,81S435.663,472,391,472z"/>
    
                                            <path d="M420,371h-9v-21c0-11.046-8.954-20-20-20c-11.046,0-20,8.954-20,20v41c0,11.046,8.954,20,20,20h29
			                                	c11.046,0,20-8.954,20-20C440,379.954,431.046,371,420,371z"/>
			
                                            <circle cx="299" cy="210" r="20"/>
			                                <circle cx="212" cy="297" r="20"/>
			                                <circle cx="125" cy="210" r="20"/>
			                                <circle cx="125" cy="297" r="20"/>
			                                <circle cx="125" cy="384" r="20"/>
			                                <circle cx="212" cy="384" r="20"/>
			                                <circle cx="212" cy="210" r="20"/>

                                        </svg>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div className="mb-4">
                    <a href="#">
                        <span>
                            <svg
                              className="fill-current h-5 w-5 text-gray-900 mx-auto hover:text-red-500"
                              viewBox="0 0 24 24"
                              fill="none"
                              xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                  d="M13 4.00894C13.0002 3.45665 12.5527 3.00876 12.0004 3.00854C11.4481 3.00833 11.0002 3.45587 11 4.00815L10.9968 12.0116C10.9966 12.5639 11.4442 13.0118 11.9965 13.012C12.5487 13.0122 12.9966 12.5647 12.9968 12.0124L13 4.00894Z"
                                  fill="currentColor"
                                />
                                <path
                                  d="M4 12.9917C4 10.7826 4.89541 8.7826 6.34308 7.33488L7.7573 8.7491C6.67155 9.83488 6 11.3349 6 12.9917C6 16.3054 8.68629 18.9917 12 18.9917C15.3137 18.9917 18 16.3054 18 12.9917C18 11.3348 17.3284 9.83482 16.2426 8.74903L17.6568 7.33481C19.1046 8.78253 20 10.7825 20 12.9917C20 17.41 16.4183 20.9917 12 20.9917C7.58172 20.9917 4 17.41 4 12.9917Z"
                                  fill="currentColor"
                                />
                            </svg>
                        </span>
                    </a>
                </div>
            </nav>
        </div>
    )
}