import axios from 'axios'
import config from '~/static/config';
import Cookie from 'js-cookie'

export default {
    async listNotification () {
        let token = Cookie.get('authToken')
        let result = {}
        await axios.get(`${config.API}${config.ListNotification}`, {
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