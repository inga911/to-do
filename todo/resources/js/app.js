import 'bootstrap';
import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


document.addEventListener('DOMContentLoaded', function () {
    const alerts = document.querySelectorAll('.alert');
  
    // Show
    alerts.forEach(function (alert) {
      setTimeout(function () {
        alert.classList.add('show');
      }, 500);
    });
  
    // Hide
    alerts.forEach(function (alert) {
      setTimeout(function () {
        alert.classList.remove('show');
      }, 5000);
    });
  });
  