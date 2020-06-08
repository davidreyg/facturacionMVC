import Vue from 'vue'
import axios from 'axios'
const s = axios.create({
  baseURL: 'http://facturacionmvc.test',
  // withCredentials: true,
  headers: {
    // 'Accept': 'application/json',
    // 'Content-Type': 'application/json',
    // 'Access-Control-Allow-Credentials': true,
    // 'Access-Control-Allow-Origin': '*',
  }
});
Vue.prototype.$axios = s
