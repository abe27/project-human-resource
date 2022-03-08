import React, { useState, useEffect, useRef } from 'react'
import ProfileAvatar from './ProfileAvatar'
import ProfileAbout from './ProfileAbout'
import ProfileJob from './ProfileJob'
import ProfileAddress from './ProfileAddress'
import ProfileLeave from './ProfileLeave'
import ProfileOrganization from './ProfileOrganization'
import ProfileSecurity from './ProfileSecurity'
import { Tabs, TabList, TabPanels, Tab, TabPanel } from '@chakra-ui/react'

const ProfileFrom = ({ profileData, propData }) => {
  return (
    <>
      <div className="md:flex no-wrap md:-mx-2 ">
        <div className="w-full md:w-3/12 md:mx-2">
          <ProfileAvatar profileData={profileData} propData={propData} />
        </div>
        <div className="w-full md:w-9/12 mx-2 h-64">
          <Tabs isFitted variant="enclosed">
            <TabList>
              <Tab>About</Tab>
              <Tab>Current Address</Tab>
              <Tab>Perm. Address</Tab>
              <Tab>Job Infomation</Tab>
              <Tab>Leave Infomation</Tab>
              <Tab>Organization</Tab>
              <Tab>Security</Tab>
            </TabList>
            <TabPanels>
              <TabPanel>
                <ProfileAbout profileData={profileData} propData={propData} />
              </TabPanel>
              <TabPanel>
                <ProfileAddress
                  title="Current Address"
                  profileData={profileData}
                  propData={propData}
                />
              </TabPanel>
              <TabPanel>
                <ProfileAddress
                  title="Permanant Address"
                  profileData={profileData}
                  propData={propData}
                />
              </TabPanel>
              <TabPanel>
                <ProfileJob profileData={profileData} propData={propData} />
              </TabPanel>
              <TabPanel>
                <ProfileLeave />
              </TabPanel>
              <TabPanel>
                <ProfileOrganization />
              </TabPanel>
              <TabPanel>
                <ProfileSecurity />
              </TabPanel>
            </TabPanels>
          </Tabs>
        </div>
      </div>
    </>
  )
}

export default ProfileFrom
