import { useEffect, useState } from 'react'
import { Button } from '@chakra-ui/react'

const ProfileCurrentAddress = ({ title, profileData, propData }) => {
  const [geoData, setGeoData] = useState(null)
  const [proviceData, setProvinceData] = useState(null)
  const [districtData, setDistrictData] = useState(null)
  const [zipCodeData, setZipCodeData] = useState(null)

  const [formData, setFormData] = useState({
    address: '-',
    geo: '-',
    province: '-',
    district: '-',
    zipcode: '-',
  })

  const getGeo = async () => {
    let get = await axios.get(route('geo.get'))
    let data = await get.data
    setGeoData(data)
  }

  const getProvince = async (id) => {
    let get = await axios.get(route('province.get', id))
    let data = await get.data
    setProvinceData(data)
  }

  const getDistrict = async (id) => {
    let get = await axios.get(route('district.get', id))
    let data = await get.data
    console.dir(data)
    setDistrictData(data)
  }

  const getZipCode = async (id) => {
    let get = await axios.get(route('zipcode.get', id))
    let data = await get.data
    console.dir(data)
    setZipCodeData(data)
  }

  const select = (e) => {
    if (e.target.name === 'geo') {
      setProvinceData(null)
      setDistrictData(null)
      setZipCodeData(null)
      getProvince(e.target.value)
      formData.geo = e.target.value
    } else if (e.target.name === 'province') {
      setDistrictData(null)
      getDistrict(e.target.value)
      formData.province = e.target.value
    } else if (e.target.name === 'district') {
      setZipCodeData(null)
      getZipCode(e.target.value)
      formData.district = e.target.value
    }
    console.dir(formData)
  }

  useEffect(() => getGeo(), [])

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
            <div className="px-4 py-2 font-semibold">Address</div>
            <div className="col-span-3 px-4">
              <textarea
                className="textarea w-full max-w-full"
                placeholder="Address"
                defaultValue="-"
              ></textarea>
            </div>
          </div>
          <div className="grid grid-cols-4"></div>
          <div className="grid grid-cols-4">
            <div className="px-4 py-2 font-semibold">Geography</div>
            <div className="col-span-3">
              <select
                name="geo"
                className="select select-sm w-full max-w-full select-ghost"
                defaultValue={formData.geo}
                onChange={select}
              >
                {geoData &&
                  geoData.map((i) => (
                    <option key={i.id} value={i.id}>
                      {i.name}
                    </option>
                  ))}
              </select>
            </div>
          </div>
          <div className="grid grid-cols-4"></div>
          <div className="grid grid-cols-4">
            <div className="px-4 py-2 font-semibold">Province</div>
            <div className="col-span-3">
              <select
                name="province"
                className="select select-sm w-full max-w-full select-ghost"
                defaultValue={formData.province}
                onChange={select}
              >
                <option value="-">-</option>
                {proviceData &&
                  proviceData.map((i) => (
                    <option key={i.id} value={i.id}>
                      {i.name}-{i.description}
                    </option>
                  ))}
              </select>
            </div>
          </div>
          <div className="grid grid-cols-2"> </div>
          <div className="grid grid-cols-4">
            <div className="px-4 py-2">District</div>
            <div className="col-span-3">
              <select
                name="district"
                className="select select-sm w-full max-w-full select-ghost"
                defaultValue={formData.district}
                onChange={select}
              >
                <option value="-">-</option>
                {districtData &&
                  districtData.map((i) => (
                    <option key={i.id} value={i.id}>
                      {i.district_name}-{i.description}
                    </option>
                  ))}
              </select>
            </div>
          </div>
          <div className="grid grid-cols-4">
            <div className="px-4 py-2 font-semibold">Zipcode</div>
            <div className="col-span-3">
              <select
                name="zipcode"
                className="select select-sm w-full max-w-full select-ghost"
                defaultValue={formData.zipcode}
                onChange={select}
              >
                <option value="-">-</option>
                {zipCodeData &&
                  zipCodeData.map((i) => (
                    <option key={i.id} value={i.id}>
                      {i.name}-{i.zip_code}
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

export default ProfileCurrentAddress
