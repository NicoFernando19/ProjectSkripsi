import axios from 'axios'
import config from '~/static/config';

export default {
    async Login(email, password) {
      let res = {};
      const loginDto = { email, password };
      await axios.post(`${config.API}${config.Login}`, loginDto, {
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
};