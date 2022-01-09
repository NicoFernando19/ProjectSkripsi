import axios from 'axios'
import config from '~/static/config';
import Cookies from 'js-cookie';

export default{
    async ListWorkHistory(per_page, page, title) {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.get(`${config.API}${config.ListWorkHistory}`, {
            headers:{
              "Content-Type": "application/json",
              Authorization: "Bearer " + token
            },
            params: {
                page,
                per_page, 
                title
            }
        }).then(response => {
            result = response;
        }).catch(err => {
            result = err.response;
        })
        return result
    }, 

    async CreateWorkHistory(data) {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.post(`${config.API}${config.CreateWorkHistory}`, data,{
            headers:{
              "Content-Type": "application/json",
              Authorization: "Bearer " + token
            },
        }).then(response => {
            result = response;
        }).catch(err => {
            result = err.response;
        })
        return result
    }, 

    async GetWorkHistoryById(data) {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.get(`${config.API}${config.DetailWorkHistory}/${data.id}`, data,{
            headers:{
              "Content-Type": "application/json",
              Authorization: "Bearer " + token
            },
        }).then(response => {
            result = response;
        }).catch(err => {
            result = err.response;
        })
        return result
    }, 

    async UpdateWorkHistory(data) {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.put(`${config.API}${config.UpdateWorkHistory}/${data.id}`, data,{
            headers:{
              "Content-Type": "application/json",
              Authorization: "Bearer " + token
            },
        }).then(response => {
            result = response;
        }).catch(err => {
            result = err.response;
        })
        return result
    }, 

    async DeleteWorkHistory(data) {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.delete(`${config.API}${config.DeleteWorkHistory}/${data.id}`, {
            headers:{
              "Content-Type": "application/json",
              Authorization: "Bearer " + token
            },
        }).then(response => {
            result = response;
        }).catch(err => {
            result = err.response;
        })
        return result
    },

}