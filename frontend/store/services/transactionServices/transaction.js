import axios from 'axios'
import config from '~/static/config';

export default {
    async listTransaction () {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.get(`${config.API}${config.ListTransaction}`, {
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

    async CreateTransaction (data) {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.post(`${config.API}${config.CreateTransaction}`, data, {
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

    async GetTransactionById (data) {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.get(`${config.API}${config.DetailTransaction}/${data.id}`, data, {
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
    
    async UpdateTransaction (data) {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.get(`${config.API}${config.UpdateTransaction}/${data.id}`, data, {
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

    async DeleteTransaction (id) {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.get(`${config.API}${config.DeleteTransaction}/${id}`, {
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