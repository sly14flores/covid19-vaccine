const prod_url = "https://vaccines.launion.gov.ph"
const local_url = "https://vaccines.local"

const ENV = process.env.MIX_ENV	
const api_url = (ENV==='local')?local_url:prod_url

export { api_url }