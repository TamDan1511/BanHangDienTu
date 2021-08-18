window.axios = require('axios');
const baseDomain = 'http://localhost:8000';
 
 
export default axios.create({
	baseDomain

});