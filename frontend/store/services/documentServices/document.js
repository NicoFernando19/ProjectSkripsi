import axios from 'axios'
import config from '~/static/config';
import Cookies from 'js-cookie';

export default {
    async UploadFile(data) {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.get(`${config.API}${config.UploadFile}`, data, {
            headers:{
              "Content-Type": "multipart/form-data",
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