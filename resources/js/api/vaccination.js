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
  * Screening
  */
 // Fetch screening information
const getScreeningInfo = (payload) => {

}

const postScreeningInfo = (payload) => {

}

export {
    getRegistrationsList,
    getScreeningInfo,
    postScreeningInfo,
}