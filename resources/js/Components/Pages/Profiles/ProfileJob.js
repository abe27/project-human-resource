import { Button } from '@chakra-ui/react'

const Option = ({ obj }) => {
  return obj.map((i) => (
    <option key={i.id} value={i.id}>
      {i.description}
    </option>
  ))
}
const ProfileJob = ({ profileData, propData }) => {
  return (
    <div className="">
      <div className="flex float-right space-x-2 font-semibold text-gray-900 leading-8">
        <Button
          colorScheme="teal"
          variant="solid"
          loadingText="Loading"
          leftIcon={
            <svg
              xmlns="http://www.w3.org/2000/svg"
              className="icon icon-tabler icon-tabler-device-floppy"
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
              <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
              <circle cx="12" cy="14" r="2"></circle>
              <polyline points="14 4 14 8 8 8 8 4"></polyline>
            </svg>
          }
        >
          Save
        </Button>
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
                <Option obj={propData.company} />
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
                <Option obj={propData.position} />
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
                <Option obj={propData.section} />
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
                <Option obj={propData.department} />
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
                <Option obj={propData.shift} />
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
                <Option obj={propData.whs} />
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
  )
}

export default ProfileJob
