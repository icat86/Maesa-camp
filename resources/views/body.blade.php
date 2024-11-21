    {{-- <div class="antialiased bg-gray-50 dark:bg-gray-900"> --}}

        <nav class="bg-dash-silver border-b border-gray-200 px-5 py-2.5 dark:bg-gray-800 dark:border-gray-700 fixed left-64 right-0 top-0 z-50 hidden md:block ">
            <div class="flex justify-between items-center">
              <div class="flex items-center w-full px-6">
                <button
                  data-drawer-target="drawer-navigation"
                  data-drawer-toggle="drawer-navigation"
                  aria-controls="drawer-navigation"
                  class="p-2 mr-2 text-gray-600 rounded-lg cursor-pointer md:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                > 
                  <svg
                    aria-hidden="true"
                    class="w-6 h-6"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                  <svg
                    aria-hidden="true"
                    class="hidden w-6 h-6"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                  <span class="sr-only">Toggle sidebar</span>
                </button>
      
                {{-- icon for dashboard --}}
      
      
                <!-- Time/Date Info -->
                <div class="admin-section text-left flex-none text-white">
                  <p>info time/date</p>
                </div>
      
                <!-- Center Tittle (Maesa Camp System Title) -->
                <div class="title text-center flex-grow pr-64">
                  <h1 class="text-reg-blue shadow-indigo-500/50 text-shadow">Maesa</h1>
                  <h4 class="text-reg-yellow shadow-indigo-500/50 text-shadow">Camp System</h4>
                </div>
      
                {{-- search bar --}}
      
      
                {{-- toggle search in sidebar --}}
              
                
                <!-- Apps -->
                
               
                <!-- Dropdown menu -->
                
      
                {{-- profile --}}
                <button
                  type="button"
                  class="flex mx-3 md:mr-0 fa-regular fa-circle-user fa-2xl flex-none"
                  style="color: white"
                  id="user-menu-button"
                  aria-expanded="false"
                  data-dropdown-toggle="dropdown"
                >
                </button>
                
                <!-- Dropdown menu -->
                <div
                  class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 rounded-xl"
                  id="dropdown"
                >
                  <div class="py-3 px-4">
                    <span
                      class="block text-sm font-semibold text-gray-900 dark:text-white"
                      >User</span
                    >
                    <span
                      class="block text-sm text-gray-900 truncate dark:text-white"
                      >user@example.com</span
                    >
                  </div>
                  <ul
                    class="py-1 text-gray-700 dark:text-gray-300"
                    aria-labelledby="dropdown"
                  >
                    <li>
                      <a
                        href="#"
                        class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white"
                        >My profile</a
                      >
                    </li>
                    <li>
                      <a
                        href="#"
                        class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white"
                        >Account settings</a
                      >
                    </li>
                  </ul>
      
                  {{-- the divider/seperator style with line --}}
                  <ul
                    class="py-1 text-gray-700 dark:text-gray-300"
                    aria-labelledby="dropdown"
                  >
                  </ul>
      
                  {{-- this shuold be have <li> </li> but idk what should i input--}}
      
                  <ul
                    class="py-1 text-gray-700 dark:text-gray-300"
                    aria-labelledby="dropdown"
                  >
                    <li>
                      <form method="POST" action="{{ route('logout') }}">
                        @csrf
      
                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                        </form>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </nav>
      
          <!-- Sidebar -->      
      
          <aside
            class="fixed top-0 left-0 z-40 w-64 h-screen pt-10 transition-transform -translate-x-full bg-dd-yellow border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700 "
            aria-label="Sidenav"
            id="drawer-navigation"
          >
    
          <!-- icon profile in sidebar -->
          <div class="flex flex-col items-center justify-center">
            <i class="fa-regular fa-circle-user fa-3x" style="color: white;"></i>
            <p class="mt-2 text-white text-base font-bold p-2">User</p> <!-- Added margin and text styles -->
          </div>
    
            <div class="overflow-y-auto py-2 px-3 h-full bg-dd-yellow dark:bg-gray-800">
              <!-- Sidebar content inside -->
              <ul class="space-y-6 p-6">
                <li>
                  <a
                    href="{{ route('dashboard') }}"
                    class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 no-underline group"
                  >
                    {{-- icon overview --}}
    
                    <i class="fa-solid fa-house fa-xl"></i>
                    <span class="ml-3">Home</span>
                  </a>
                </li>
    
                <li>
                  <a
                    href="#"
                    class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 no-underline group"
                  >
                    {{-- icon overview --}}
    
                    <i class="fa-solid fa-warehouse fa-xl"></i>
                    <span class="ml-3">Booking</span>
                  </a>
                </li>
    
                {{-- <li>
                  <button
                    type="button"
                    class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                    aria-controls="dropdown-pages"
                    data-collapse-toggle="dropdown-pages"
                  > 
                  <i class="fa-solid fa-warehouse fa-xl"></i>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap"
                      >Camp List</span
                    >
                    <svg
                      aria-hidden="true"
                      class="w-6 h-6"
                      fill="currentColor"
                      viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"
                      ></path>
                    </svg>
                  </button>
                  <ul id="dropdown-pages" class="hidden py-2 space-y-2 ">
                    <li>
                      <a
                        href="#"
                        class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 no-underline group"
                        >visitor</a
                      >
                    </li>
                    <li>
                      <a
                        href="#"
                        class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 no-underline group"
                        >on board</a
                      >
                    </li>
                    <li>
                      <a
                        href="#"
                        class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 no-underline group"
                        >vacant</a
                      >
                    </li>
                    <li>
                      <a
                        href="#"
                        class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 no-underline group"
                        >empty</a
                      >
                    </li>
                  </ul>
                </li>     --}}
                  
                <li>
                  <a
                    href="#"
                    class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 no-underline group"
                  >
                  <i class="fa-regular fa-file-lines fa-xl"></i>
                    <span class="flex-1 ml-6 text-left whitespace-nowrap"
                      >Room Service</span
                    >
                  </a>
                  
                </li> 
    
    
                <li>
                  <a
                    href="#"
                    class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 no-underline group"
                  >
                  <i class="fa-solid fa-hotel fa-xl"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap">Camp Rules</span>
                  </a>
                </li>
                <li>
                  <a
                    href="#"
                    class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 no-underline group"
                  >
                  <i class="fa-solid fa-mug-hot fa-xl"></i>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap"
                      >Request Meal</span
                    >
                  </a>
                </li>
              </ul>
      
              {{-- pembatas --}}
      
              {{-- class="pt-5 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700" --}}
              
            </div>
      
            {{-- log out button in sidebar --}}
      
            <div
              class="hidden absolute bottom-0 left-0 justify-center p-4 space-x-4 w-full lg:flex bg-dd-yellow dark:bg-gray-800 z-20"
            >
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                  type="submit"
                  data-tooltip-target="tooltip-settings"
                  class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer dark:text-gray-400 dark:hover:text-white hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-600 group no-underline"
                >
                  <i class="fa-solid fa-power-off fa-xl" style="color: #ce0707;"></i>
                </button>
            
                <div
                  id="tooltip-settings"
                  role="tooltip"
                  class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip"
                >
                  Log Out
                  <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </form>
             
              <!-- Dropdown -->
      
              {{-- languange (probably not gonna use) --}}
              
            </div>
          </aside>
    
          
          
        {{-- </div> --}}