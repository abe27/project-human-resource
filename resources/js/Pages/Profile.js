import React, { useState, useEffect, useRef } from 'react'
import Authenticated from '@/Layouts/Authenticated'
import { Head, useForm } from '@inertiajs/inertia-react'
import { Skeletons } from '@/Components'
import axios from 'axios'

const Option = ({ obj }) => {
  return obj.map((i) => (
    <option key={i.id} value={i.id}>
      {i.description}
    </option>
  ))
}

const Profile = (props) => {
  const inputRef = useRef()
  const btnSubmit = useRef()
  const [profileData, setProfileData] = useState(null)
  const [avatarUrl, setAvatarUrl] = useState(null)
  const { data, setData, put, processing, errors, reset } = useForm({
    name: '',
    avatar: null,
  })

  const getProfile = async () => {
    const get = await axios.get(route('profile.get'))
    const data = await get.data
    console.dir(props)
    setProfileData(data)
    setAvatarUrl(`/${data.avatar_url}`)
  }

  const minusDate = (start_date) => {
    const day1 = new Date(start_date)
    const day2 = Date.now()

    let difference = Math.abs(day2 - day1)
    let days = parseInt(difference / (1000 * 3600 * 24))
    let y = parseInt(days / 365)
    let m = parseInt((days - y * 365) / 30)
    let day = days - (m * 30 + y * 365)
    return `${y}Y ${m}M ${day}D`
  }

  const reTxtId = (n) => {
    return `${n.substr(0, 7)}xxxxx${n.substr(12)}`
  }

  const uploadAvatar = () => {
    put(route('profile.image_upload', profileData.id), data, {
      forceFormData: true,
    })
  }

  const afterUploadClicks = async (e) => {
    e.preventDefault()
    console.dir(e.target.name)
    setData(e.target.name, e.target.files[0])
    // const config = {
    //   headers: {
    //     'content-type': 'multipart/form-data',
    //   },
    // }

    // const formData = new FormData()
    // formData.append('avatar', e.target.files[0])

    // console.dir(formData)

    // axios.put(
    //   route('profile.image_upload', profileData.id),
    //   {
    //     'avatar': e.target.files[0]
    //   },
    //   config
    // )
    // .then(r => console.dir(r), error => console.dir(error))
  }

  useEffect(() => {
    getProfile()
  }, [])
  return (
    <Authenticated auth={props.auth} errors={props.errors}>
      <Head title="Profile" />
      <div className="container mx-auto my-5 p-5">
        {!profileData && <Skeletons />}
        {profileData && (
          <div className="md:flex no-wrap md:-mx-2 ">
            <div className="w-full md:w-3/12 md:mx-2">
              <div className="bg-white p-3">
                <div className="image overflow-hidden relative group">
                  <img
                    className="h-auto w-full mx-auto"
                    src={avatarUrl}
                    alt={profileData.name_en}
                  />
                  <div className="opacity-0 group-hover:opacity-100 duration-300 absolute left-0 bottom-0 right-0 z-10 flex justify-center items-end text-xl bg-transparent text-gray-200 font-bold">
                    <button
                      className="btn btn-ghost"
                      onClick={() => inputRef.current.click()}
                    >
                      Edit
                    </button>
                    <form submit="uploadAvatar" encType="multipart/form-data">
                      <input
                        type="file"
                        id="avatar"
                        name="avatar"
                        ref={inputRef}
                        onChange={afterUploadClicks}
                        className="hidden"
                      />
                      <button type="submit" className="hidden">
                        Click
                      </button>
                    </form>
                  </div>
                </div>
                <ul className="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                  <li className="flex items-center py-3">
                    <span>Status</span>
                    <span className="ml-auto">
                      <span className="bg-red-500 py-1 px-2 rounded text-white text-sm">
                        {profileData.employee_status}
                      </span>
                    </span>
                  </li>
                  <li className="flex items-center py-3">
                    <span>Start Date</span>
                    <span className="ml-auto bg-red-500 py-1 px-2 rounded text-white text-sm">
                      {profileData.start_date}
                    </span>
                  </li>
                  <li className="flex items-center py-3">
                    <span>Summary Date</span>
                    <span className="ml-auto bg-red-500 py-1 px-2 rounded text-white text-sm">
                      {minusDate(profileData.start_date)}
                    </span>
                  </li>
                </ul>
              </div>
            </div>
            <div className="w-full md:w-9/12 mx-2 h-64">
              <div className="bg-white p-3 shadow-sm rounded-sm">
                <div className="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                  <span clas="text-green-500">
                    <svg
                      className="h-5"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        strokeWidth="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                      />
                    </svg>
                  </span>
                  <span className="tracking-wide">About</span>
                </div>
                <div className="text-gray-700">
                  <div className="grid md:grid-cols-2 text-sm">
                    <div className="grid grid-cols-4">
                      <div className="px-4 py-2 font-semibold">ID Card.</div>
                      <div className="col-span-3 px-4">
                        <input
                          type="text"
                          className="input input-sm w-full max-w-full"
                          placeholder="ID Card"
                          defaultValue={reTxtId(profileData.id_card_number)}
                        />
                      </div>
                    </div>
                    <div className="grid grid-cols-2"> </div>
                    <div className="grid grid-cols-4">
                      <div className="px-4 py-2 font-semibold">Prefix.</div>
                      <div className="col-span-3 px-4">
                        <select
                          className="select select-sm w-full max-w-full select-ghost"
                          defaultValue={profileData.prefix.id}
                        >
                          {props.prefix.map((i) => (
                            <option key={i.id} value={i.id}>
                              {i.prefix_en}
                            </option>
                          ))}
                        </select>
                      </div>
                    </div>
                    <div className="grid grid-cols-4">
                      <div className="px-4 py-2 font-semibold">Full Name</div>
                      <div className="col-span-3 px-4">
                        <input
                          type="text"
                          className="input input-sm w-full max-w-full"
                          placeholder="Full Name"
                          defaultValue={profileData.name_en}
                        />
                      </div>
                    </div>
                    <div className="grid grid-cols-4">
                      <div className="px-4 py-2 font-semibold">Emp. Code</div>
                      <div className="col-span-3 px-4">
                        <input
                          type="text"
                          className="input input-sm w-full max-w-full"
                          placeholder="Employee Code"
                          defaultValue={profileData.empcode.empcode}
                        />
                      </div>
                    </div>
                    <div className="grid grid-cols-2"></div>
                    <div className="grid grid-cols-4">
                      <div className="px-4 py-2 font-semibold">Gender</div>
                      <div className="col-span-3 px-4">
                        <select
                          className="select select-sm w-full max-w-full select-ghost"
                          defaultValue={profileData.sexual}
                        >
                          {props.gender.map((i) => (
                            <option key={i.name} value={i.name}>
                              {i.name}
                            </option>
                          ))}
                        </select>
                      </div>
                    </div>
                    <div className="grid grid-cols-4">
                      <div className="px-4 py-2 font-semibold">Mobile No.</div>
                      <div className="col-span-3 px-4">
                        <input
                          type="text"
                          className="input input-sm w-full max-w-full"
                          placeholder="Mobile No."
                          defaultValue={profileData.mobile_no}
                        />
                      </div>
                    </div>
                    <div className="grid grid-cols-4">
                      <div className="px-4 py-2 font-semibold">
                        Current Address
                      </div>
                      <div className="col-span-3 px-4">
                        <textarea
                          className="textarea w-full max-w-full"
                          placeholder="Bio"
                        >
                          -
                        </textarea>
                      </div>
                    </div>
                    <div className="grid grid-cols-4">
                      <div className="px-4 py-2 font-semibold">
                        Permanant Address
                      </div>
                      <div className="col-span-3 px-4">
                        <textarea
                          className="textarea w-full max-w-full"
                          placeholder="Bio"
                        >
                          -
                        </textarea>
                      </div>
                    </div>
                    <div className="grid grid-cols-4">
                      <div className="px-4 py-2 font-semibold">Email.</div>
                      <div className="col-span-3 px-4">
                        <input
                          type="text"
                          className="input input-sm w-full max-w-full"
                          placeholder="Email."
                          defaultValue={profileData.user.email}
                        />
                      </div>
                    </div>
                    <div className="grid grid-cols-2">
                      <div className="px-4 py-2 font-semibold">Birthday</div>
                      <div className="px-4 py-2">
                        <span className="text-gray-800 font-bold">
                          {profileData.birth_date}
                        </span>
                        (
                        <span className="text-red-800 text-bold">
                          {minusDate(profileData.birth_date)})
                        </span>
                      </div>
                    </div>
                    <div className="grid grid-cols-2">
                      <div className="px-4 py-2 font-semibold">
                        Married Status
                      </div>
                      <div className="px-4 py-2">
                        <span className="text-gray-800 font-bold">
                          {profileData.married_status}
                        </span>
                      </div>
                    </div>
                    <div className="grid grid-cols-2">
                      <div className="px-4 py-2 font-semibold">
                        Military Status
                      </div>
                      <div className="px-4 py-2">
                        <span className="text-gray-800 font-bold">
                          {profileData.military_status}
                        </span>
                      </div>
                    </div>
                    <div className="grid grid-cols-4">
                      <div className="px-4 py-2">Travel</div>
                      <div className="col-span-3">
                        <span className="text-gray-800 font-bold">
                          {profileData.travel.name}
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div className="my-6"></div>
              <div className="bg-white p-3 shadow-sm rounded-sm">
                <div className="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                  <span clas="text-green-500">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      className="icon icon-tabler icon-tabler-list-details"
                      width="24"
                      height="24"
                      viewBox="0 0 24 24"
                      strokeWidth="2"
                      stroke="currentColor"
                      fill="none"
                      strokeLinecap="round"
                      strokeLinejoin="round"
                    >
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M13 5h8"></path>
                      <path d="M13 9h5"></path>
                      <path d="M13 15h8"></path>
                      <path d="M13 19h5"></path>
                      <rect x="3" y="4" width="6" height="6" rx="1"></rect>
                      <rect x="3" y="14" width="6" height="6" rx="1"></rect>
                    </svg>
                  </span>
                  <span className="tracking-wide">Job Infomation</span>
                </div>
                <div className="text-gray-700">
                  <div className="grid md:grid-cols-2 text-sm">
                    <div className="grid grid-cols-4">
                      <div className="px-4 py-2 font-semibold">Company</div>
                      <div className="col-span-3">
                        <select
                          className="select select-sm w-full max-w-full select-ghost"
                          defaultValue={profileData.company.id}
                        >
                          <Option obj={props.company} />
                        </select>
                      </div>
                    </div>
                    <div className="grid grid-cols-2"> </div>
                    <div className="grid grid-cols-4">
                      <div className="px-4 py-2 font-semibold">Position</div>
                      <div className="col-span-3">
                        <select
                          className="select select-sm w-full max-w-full select-ghost"
                          defaultValue={profileData.position.id}
                        >
                          <Option obj={props.position} />
                        </select>
                      </div>
                    </div>
                    <div className="grid grid-cols-2"> </div>
                    <div className="grid grid-cols-4">
                      <div className="px-4 py-2">Section</div>
                      <div className="col-span-3">
                        <select
                          className="select select-sm w-full max-w-full select-ghost"
                          defaultValue={profileData.section.id}
                        >
                          <Option obj={props.section} />
                        </select>
                      </div>
                    </div>
                    <div className="grid grid-cols-4">
                      <div className="px-4 py-2 font-semibold">Department</div>
                      <div className="col-span-3">
                        <select
                          className="select select-sm w-full max-w-full select-ghost"
                          defaultValue={profileData.department.id}
                        >
                          <Option obj={props.department} />
                        </select>
                      </div>
                    </div>
                    <div className="grid grid-cols-4">
                      <div className="px-4 py-2">Shift</div>
                      <div className="col-span-3">
                        <select
                          className="select select-sm w-full max-w-full select-ghost"
                          defaultValue={profileData.shift.id}
                        >
                          <Option obj={props.shift} />
                        </select>
                      </div>
                    </div>
                    <div className="grid grid-cols-4">
                      <div className="px-4 py-2 font-semibold">Warehouse</div>
                      <div className="col-span-3">
                        <select
                          className="select select-sm w-full max-w-full select-ghost"
                          defaultValue={profileData.whs.id}
                        >
                          <Option obj={props.whs} />
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        )}
      </div>
    </Authenticated>
  )
}

export default Profile
