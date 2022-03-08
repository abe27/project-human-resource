import { useToast } from '@chakra-ui/react'
import { Button, ButtonGroup } from '@chakra-ui/react'

const ProfileAbout = ({ profileData, propData }) => {
  const toast = useToast()
  const reTxtId = (n) => {
    return `${n.substr(0, 7)}xxxxx${n.substr(12)}`
  }

  const updateSuccess = () =>
    toast({
      title: 'Update Data',
      position: 'top-right',
      status: 'success',
      duration: 2500,
      isClosable: true,
    })
  return (
    <div className="">
      <div className="flex float-right space-x-2 font-semibold text-gray-900 leading-8">
        <Button
          isLoading
          colorScheme="teal"
          variant="solid"
          loadingText="Loading"
        >
          Save
        </Button>
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
                onChange={updateSuccess}
              >
                {propData.prefix.map((i) => (
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
                {propData.gender.map((i) => (
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
            <div className="px-4 py-2 font-semibold">Current Address</div>
            <div className="col-span-3 px-4">
              <textarea
                className="textarea w-full max-w-full"
                placeholder="Bio"
                defaultValue="-"
              ></textarea>
            </div>
          </div>
          <div className="grid grid-cols-4">
            <div className="px-4 py-2 font-semibold">Permanant Address</div>
            <div className="col-span-3 px-4">
              <textarea
                className="textarea w-full max-w-full"
                placeholder="Bio"
                defaultValue="-"
              ></textarea>
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
          <div className="grid grid-cols-4">
            <div className="px-4 py-2 font-semibold">Birthday</div>
            <div className="col-span-3 px-4">
              <input
                type="date"
                className="input input-sm w-full max-w-full"
                placeholder="Email."
                defaultValue={profileData.birth_date}
              />
            </div>
          </div>
          <div className="grid grid-cols-4">
            <div className="px-4 py-2 font-semibold">Married Status</div>
            <div className="col-span-3 px-4">
              <select
                className="select select-sm w-full max-w-full select-ghost"
                defaultValue={profileData.married_status}
              >
                {propData.married_status.map((i) => (
                  <option key={i.name} value={i.name}>
                    {i.name}
                  </option>
                ))}
              </select>
            </div>
          </div>
          <div className="grid grid-cols-4">
            <div className="px-4 py-2 font-semibold">Military Status</div>
            <div className="col-span-3 px-4">
              <select
                className="select select-sm w-full max-w-full select-ghost"
                defaultValue={profileData.military_status}
              >
                {propData.military.map((i) => (
                  <option key={i.name} value={i.name}>
                    {i.name}
                  </option>
                ))}
              </select>
            </div>
          </div>
          <div className="grid grid-cols-4">
            <div className="px-4 py-2">Travel</div>
            <div className="col-span-3 px-4">
              <select
                className="select select-sm w-full max-w-full select-ghost"
                defaultValue={profileData.travel.id}
              >
                {propData.travel.map((i) => (
                  <option key={i.id} value={i.id}>
                    {i.name}
                  </option>
                ))}
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
  )
}

export default ProfileAbout
