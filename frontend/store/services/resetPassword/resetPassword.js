import axios from 'axios'
import config from '~/static/config';

export default {
    async resetPassword(email) {
      let res = {};
      const loginDto = { email, password };
      await axios.post(`${config.API}${config.ResetPassword}`, loginDto, {
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
};