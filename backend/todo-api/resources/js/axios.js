import axios from 'axios';

const instance = axios.create({
  baseURL: '/api', 
  headers: {
    'Content-Type': 'application/json',
    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
  },
});

export default instance;
