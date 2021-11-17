import axios from 'axios'
import config from '~/static/config';

export default {
    async SentEmailResetLink(email) {
      let res = {};
      const emailto = { email };
      await axios.post(`${config.API}${config.SentEmailResetPasswordLink}`, emailto, {
          headers:{
            "Content-Type": "application/json"
          }
      }).then(response => {
          res = response;
      }).catch(err => {
          console.log(err)
      })
      return res;
    },

    async resetPassword(email, password, password_confirmation, token) {
      let res = {};
      const ResetPasswordDTO = { email, password, password_confirmation };
      await axios.post(`${config.API}${config.ResetPassword}${token}`, ResetPasswordDTO, {
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