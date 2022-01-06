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
    }, 

    async listAllNotification (page, per_page, name) {
        let token = Cookie.get('authToken')
        let result = {}
        await axios.get(`${config.API}${config.ListAllNotification}`, {
            headers:{
              "Content-Type": "application/json",
              Authorization: "Bearer " + token
            }, 
            params: {
                page,
                per_page,
                name
            }
        }).then(response => {
            result = response;
        }).catch(err => {
            result = err.response;
        })
        return result
    },

    async updateReadAtNotif(id) {
        let token = Cookie.get('authToken')
        let dataDTO ={ id }
        let result = {}
        await axios.put(`${config.API}${config.UpdateNotification}`, dataDTO,{
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