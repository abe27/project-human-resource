import React from 'react'
import { Link, Head } from '@inertiajs/inertia-react'

const Welcome = (props) => {
  return (
    <>
      <Head title="Welcome" />
      <div className="bg-gray-100 font-sans leading-normal tracking-normal">
        <nav id="header" className="bg-white fixed w-full z-10 top-0 shadow">
          <div className="w-full container mx-auto flex flex-wrap items-center mt-0 pt-3 pb-3 md:pb-0">
            <div className="w-1/2 pl-2 md:pl-0">
              <a
                className="text-gray-900 text-base xl:text-xl no-underline hover:no-underline font-bold"
                href="#"
              >
                <i className="fas fa-sun text-pink-600 pr-3"></i> Admin Day Mode
              </a>
            </div>
            <div className="w-1/2 pr-0">
              <div className="flex relative inline-block float-right">
                <div className="relative text-sm">
                  <button
                    id="userButton"
                    className="flex items-center focus:outline-none mr-3"
                  >
                    <img
                      className="w-8 h-8 rounded-full mr-4"
                      src="http://i.pravatar.cc/300"
                      alt="Avatar of User"
                    />{' '}
                    <span className="hidden md:inline-block">Hi, User </span>
                    <svg
                      className="pl-2 h-2"
                      version="1.1"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 129 129"
                      xmlnsXlink="http://www.w3.org/1999/xlink"
                      enableBackground="new 0 0 129 129"
                    >
                      <g>
                        <path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z" />
                      </g>
                    </svg>
                  </button>
                  <div
                    id="userMenu"
                    className="bg-white rounded shadow-md mt-2 absolute mt-12 top-0 right-0 min-w-full overflow-auto z-30 invisible"
                  >
                    <ul className="list-reset">
                      <li>
                        <a
                          href="#"
                          className="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline"
                        >
                          My account
                        </a>
                      </li>
                      <li>
                        <a
                          href="#"
                          className="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline"
                        >
                          Notifications
                        </a>
                      </li>
                      <li>
                        <hr className="border-t mx-2 border-gray-400" />
                      </li>
                      <li>
                        <a
                          href="#"
                          className="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline"
                        >
                          Logout
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>

                <div className="block lg:hidden pr-4">
                  <button
                    id="nav-toggle"
                    className="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-gray-900 hover:border-teal-500 appearance-none focus:outline-none"
                  >
                    <svg
                      className="fill-current h-3 w-3"
                      viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <title>Menu</title>
                      <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
            <div
              className="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-white z-20"
              id="nav-content"
            >
              <ul className="list-reset lg:flex flex-1 items-center px-4 md:px-0">
                <li className="mr-6 my-2 md:my-0">
                  <a
                    href="#"
                    className="block py-1 md:py-3 pl-1 align-middle text-pink-600 no-underline hover:text-gray-900 border-b-2 border-orange-600 hover:border-orange-600"
                  >
                    <i className="fas fa-home fa-fw mr-3 text-pink-600"></i>
                    <span className="pb-1 md:pb-0 text-sm">Home</span>
                  </a>
                </li>
                <li className="mr-6 my-2 md:my-0">
                  <a
                    href="#"
                    className="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-pink-500"
                  >
                    <i className="fas fa-tasks fa-fw mr-3"></i>
                    <span className="pb-1 md:pb-0 text-sm">Tasks</span>
                  </a>
                </li>
                <li className="mr-6 my-2 md:my-0">
                  <a
                    href="#"
                    className="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-purple-500"
                  >
                    <i className="fa fa-envelope fa-fw mr-3"></i>
                    <span className="pb-1 md:pb-0 text-sm">Messages</span>
                  </a>
                </li>
                <li className="mr-6 my-2 md:my-0">
                  <a
                    href="#"
                    className="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-green-500"
                  >
                    <i className="fas fa-chart-area fa-fw mr-3"></i>
                    <span className="pb-1 md:pb-0 text-sm">Analytics</span>
                  </a>
                </li>
                <li className="mr-6 my-2 md:my-0">
                  <a
                    href="#"
                    className="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-red-500"
                  >
                    <i className="fa fa-wallet fa-fw mr-3"></i>
                    <span className="pb-1 md:pb-0 text-sm">Payments</span>
                  </a>
                </li>
              </ul>
              <div className="relative pull-right pl-4 pr-4 md:pr-0">
                <span className="absolute search-icon inset-y-0 left-0 flex items-center pl-2">
                  <button
                    type="submit"
                    className="p-4 focus:outline-none focus:shadow-outline"
                  >
                    <svg
                      fill="none"
                      stroke="currentColor"
                      strokeLinecap="round"
                      strokeLinejoin="round"
                      strokeWidth="2"
                      viewBox="0 0 20 20"
                      className="w-6 h-6"
                    >
                      <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                  </button>
                </span>
                <input
                  type="search"
                  name="q"
                  className="w-full text-sm text-gray-800 bg-gray-100 focus:outline-none focus:bg-white focus:text-gray-900 rounded py-1 px-2 pl-10 appearance-none leading-normal"
                  placeholder="Search..."
                  autocomplete="off"
                />
              </div>
            </div>
          </div>
        </nav>
        // --Container--
        <div className="container w-full mx-auto pt-20">
          <div className="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal"></div>
        </div>
      </div>
    </>
  )
}

export default Welcome
