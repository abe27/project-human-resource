import React, { useState, useEffect, useRef } from 'react'
import Authenticated from '@/Layouts/Authenticated'
import { Head } from '@inertiajs/inertia-react'
import { Skeletons } from '@/Components'
import { ProfileFrom } from '@/Components/Pages'
import axios from 'axios'

const Profile = (props) => {
  const [profileData, setProfileData] = useState(null)

  const getProfile = async () => {
    const get = await axios.get(route('profile.get'))
    const data = await get.data
    // console.dir(props)
    setProfileData(data)
  }

  useEffect(() => {
    getProfile()
  }, [])
  return (
    <Authenticated auth={props.auth} errors={props.errors}>
      <Head title="Profile" />
      <div className="container mx-auto my-5 p-5">
        {!profileData && <Skeletons />}
        {profileData && <ProfileFrom profileData={profileData} propData={props} />}
      </div>
    </Authenticated>
  )
}

export default Profile
