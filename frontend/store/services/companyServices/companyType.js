import axios from 'axios'
import config from '~/static/config';
import Cookies from 'js-cookie';

export default{
    async listCompanyType() {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.get(`${config.API}${config.ListCompanyType}`, {
            headers:{
              "Content-Type": "application/json",
              Authorization: "Bearer " + token
            },
        }).then(response => {
            result = response;
        }).catch(err => {
            result = err.response;
        })
        return result
    }
}