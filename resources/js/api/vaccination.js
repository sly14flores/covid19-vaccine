import route from '../library/route'
import { api_url } from '../url.js'

/**
 * Registrations list for vaccinations
 * 
 * Search by QR, first name, middle name, last name
 */
 const getRegistrationsList = (payload) => {
     return axios.get(
         `${api_url}/api/doh/vaccines/search/registrations`,
         {params: {...payload} }
     )
 }

 /**
  * Fetch Personal Information Screening
  */
const getScreeningPersonalInfo = (payload) => {
    const { id, dose } = payload
    const url =  route(`${api_url}/api/doh/vaccines/screening/info/:id`, { id })
    return axios.post(url, { dose })
}

const postScreeningInfo = (payload) => {
    return axios.post(`${api_url}/api/doh/vaccines/screening/update`, { ...payload })    
}

 /**
  * Fetch Personal Information Inoculation
  */
  const getInoculationPersonalInfo = (payload) => {
    const { id, dose } = payload
    const url =  route(`${api_url}/api/doh/vaccines/inoculation/info/:id`, { id })
    return axios.post(url, { dose })
}

const postInoculationInfo = (payload) => {
    return axios.post(`${api_url}/api/doh/vaccines/inoculation/update`, { ...payload })    
}

/**
 * 
 * Vaccinators
 *
 */
 const getVaccinators = () => {
    return axios.get(
        `${api_url}/api/general/selections/vaccinators`
    )
}

/**
 * 
 * Users
 *
 */
 const getUsers = () => {
    return axios.get(
        `${api_url}/api/general/selections/users`
    )
}

/**
 * 
 * Hospitals
 *
 */
 const getHospitals = () => {
    return axios.get(
        `${api_url}/api/general/selections/hospitals`
    )
}

/**
 * 
 * Adverse Events
 *
 */
 const getAdverseEvents = () => {
    return axios.get(
        `${api_url}/api/doh/selections/vaccine/events`
    )
}

/**
 * 
 * Vaccines
 *
 */
 const getVaccines = () => {
    return axios.get(
        `${api_url}/api/doh/selections/vaccine/vaccines`
    )
}

/**
 * 
 * Deferrals
 *
 */
 const getDeferrals = () => {
    return axios.get(
        `${api_url}/api/doh/selections/vaccine/deferrals`
    )
}


export {
    getRegistrationsList,
    getScreeningPersonalInfo,
    postScreeningInfo,
    getInoculationPersonalInfo,
    postInoculationInfo,
    getVaccinators,
    getUsers,
    getHospitals,
    getAdverseEvents,
    getVaccines,
    getDeferrals
}