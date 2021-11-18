import axios from 'axios'
import config from '~/static/config';

export default {
    async Register(email, password, username, name, address, city, zip, state, password_confirmation) {
        let res = {};
        const registerDto = { email, password, username, name, address, city, zip, state, password_confirmation };
        await axios.post(`${config.API}${config.Register}`, registerDto, {
            headers:{
              "Content-Type": "application/json"
            }
        }).then(response => {
            res = response;
        }).catch(err => {
            console.log(err)
        })
        return res;
    }
}