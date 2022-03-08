import React, { useState, useEffect, useRef } from 'react'

const ProfileAvatar = ({ profileData, propData }) => {
  const inputRef = useRef()

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

  const uploadAvatar = () => {
    put(route('profile.image_upload', profileData.id), data, {
      forceFormData: true,
    })
  }

  const afterUploadClicks = async (e) => {
    e.preventDefault()
    console.dir(e.target.name)
    setData(e.target.name, e.target.files[0])
  }

  return (
    <div className="bg-white p-3">
      <div className="image overflow-hidden relative group">
        <img
          className="h-auto w-auto mx-auto"
          src={`/${profileData.avatar_url}`}
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
          <span>Age.</span>
          <span className="ml-auto">
            <span className="bg-red-500 py-1 px-2 rounded text-white text-sm">
              {minusDate(profileData.birth_date)}
            </span>
          </span>
        </li>
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
  )
}

export default ProfileAvatar
