import axios from 'axios'
import config from '~/static/config';

export default {
    async listNotification () {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.post(`${config.API}${config.ListNotification}`, {
            headers:{
              "Content-Type": "application/json",
              Authorization: "Bearer " + token
            }
        }).then(response => {
            result = response;
        }).catch(err => {
            result = err.response;
        })
        return result
    }
}