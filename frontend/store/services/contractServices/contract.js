import axios from 'axios'
import config from '~/static/config';
import Cookies from 'js-cookie';

export default {
    async GetContract () {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.get(`${config.API}${config.ListContract}`, {
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

    async CreateContract (data) {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.post(`${config.API}${config.CreateContract}`, data, {
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

    async GetContractById (data) {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.get(`${config.API}${config.DetailContract}/${data.id}`, data, {
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
    
    async UpdateContract (data) {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.put(`${config.API}${config.UpdateContract}/${data.id}`, data, {
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
    }, 

    async DeleteContract (id) {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.delete(`${config.API}${config.DeleteContract}/${id}`, {
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