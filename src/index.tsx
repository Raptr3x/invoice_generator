import React from 'react'
import ReactDOM from 'react-dom'
import App from './App'
import './scss/main.scss'
import * as serviceWorker from './serviceWorker'

function getCookie(cname: string ) {
  let name = cname + "="
  let ca = document.cookie.split(';')
  for(let i = 0; i < ca.length; i++) {
    let c = ca[i]
    while (c.charAt(0) == ' ') {
      c = c.substring(1)
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length)
    }
  }
  return ""
}

function checkCookie() {
  let user = getCookie("login_cookie")
  // have to actually get email+pass md5 from db and check
  if (user != "") {
    ReactDOM.render(
      <App />,
      document.getElementById('root')
    )
  } else {
    console.log("Not logged in!")
    window.location.href = "/"
  }
}

checkCookie()

//   let body = {
//     userId: 1111,
//     title: "This is POST request with body",
//     completed: true
//   };

//   fetch("/", {
//     method: "POST",
//     body: JSON.stringify(body)
//   }).then(response => {
//       let json = response.json();
//       console.log(json);
            
//       if (!response.ok) {
//         throw new Error("Network response was not ok");
//       }
//       return response.blob();
//     })

//     .catch(error => {
// console.error(
//   "There has been a problem with your fetch operation:",
//   error
// );

//     });



// If you want your app to work offline and load faster, you can change
// unregister() to register() below. Note this comes with some pitfalls.
// Learn more about service workers: https://bit.ly/CRA-PWA
serviceWorker.register()
