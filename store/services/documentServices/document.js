import axios from 'axios'
import config from '~/static/config';
import Cookies from 'js-cookie';

export default {
    async UploadFile(data) {
        let token = Cookies.get('authToken')
        let form = new FormData()
        if(data.file != null)
            form.append('file', data.file)
        form.append('id', data.id);
        form.append('documentType', data.documentType);
        let result = {}
        await axios.post(`${config.API}/${config.UploadFile}`, form, {
            headers:{
              "Content-Type": "undefined",
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