import React from 'react'
import ReactDOM from 'react-dom'
import App from './App'
import './scss/main.scss'
import * as serviceWorker from './serviceWorker'
import {setCookie, getCookieVal} from './functions'
import $ from 'jquery';


if(window.location.port==="3000"){
  setCookie("login_cookie", "6fde2cc4b647d4908312cf839b027bbb", "/", "localhost")
}

let cookieVal = getCookieVal("login_cookie");

$.ajax({
  type:'post',
  data: {f: 'compare_login_cookies', cookieValue:cookieVal},
  url:"http://localhost:553/ajaxFunctions.php",
  dataType: "json",
  success: function() {
    ReactDOM.render(
      <App />,
      document.getElementById('root')
    )
  },
  error: function() {
    ReactDOM.render(
      <h2>Failed</h2>,
      document.getElementById('root')
    )
  }
});

// If you want your app to work offline and load faster, you can change
// unregister() to register() below. Note this comes with some pitfalls.
// Learn more about service workers: https://bit.ly/CRA-PWA
serviceWorker.register()
