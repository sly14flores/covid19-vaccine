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
  * Fetch Personal Information
  */
const getPersonalInfo = (payload) => {
    const { id, dose } = payload
    const url =  route(`${api_url}/api/doh/vaccines/info/:id`, { id })
    return axios.post(url, { dose })
}

const postScreeningInfo = (payload) => {

}

/**
 * 
 * Selections
 *
 */
 const getSelections = (payload) => {
    return axios.get(
        `${api_url}/api/doh/selections`,
        {params: {...payload} }
    )
}

/**
 * 
 * Vaccinators
 *
 */
 const getVaccinators = (payload) => {
    return axios.get(
        `${api_url}/api/general/selections/vaccinators`,
        {params: {...payload} }
    )
}


export {
    getRegistrationsList,
    getPersonalInfo,
    postScreeningInfo,
    getSelections,
    getVaccinators
}