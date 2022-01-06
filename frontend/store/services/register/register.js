import axios from 'axios'
import config from '~/static/config';

export default {
    async Register(email, password, username, name, address, city, zip, state, password_confirmation, imgName, Industri, role_id, company_type_id) {
        let res = {};
        const registerDto = { 
            email, 
            password, 
            username, 
            name, 
            address, 
            city, 
            zip, 
            state, 
            password_confirmation, 
            imgName, 
            Industri,
            role_id,
            company_type_id };
        await axios.post(`${config.API}${config.Register}`, registerDto, {
            headers:{
              "Content-Type": "application/json"
            }
        }).then(response => {
            res = response;
        }).catch(err => {
            res = err.response;
        })
        return res;
    }
}