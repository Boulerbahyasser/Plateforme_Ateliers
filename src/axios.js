// src/axios.js
import axios from 'axios';

// Create an Axios instance
const axiosInstance = axios.create({
  baseURL: 'http://localhost:8000/api',
  headers: {
    'Content-Type': 'application/json',
  }
});

// Request interceptor to add the token to the headers
axiosInstance.interceptors.request.use(config => {
  const token = localStorage.getItem('auth_token');
  if (token) {
    config.headers['Authorization'] = `Bearer ${token}`;
  }
  return config;
}, error => {
  return Promise.reject(error);
});

// Response interceptor to handle token refresh
axiosInstance.interceptors.response.use(response => {
  if (response.data.access_token) {
    // Store the new token
    localStorage.setItem('auth_token', response.data.access_token);
  }
  return response;
}, error => {
  // Handle error response
  return Promise.reject(error);
});

export default axiosInstance;
