function getCookieVal(cname: string ) {
    let name = cname + "="
    let ca = document.cookie.split(';')
    for(let i = 0; i < ca.length; i++) {
      let c = ca[i]
      while (c.charAt(0) === ' ') {
        c = c.substring(1)
      }
      if (c.indexOf(name) === 0) {
        return c.substring(name.length, c.length)
      }
    }
    return ""
}

function deleteCookie(name: string, path: string, domain: string) {
    if(getCookieVal(name)) {
      document.cookie = name + "=" +
        ((path) ? ";path="+path:"")+
        ((domain)?";domain="+domain:"") +
        ";expires=Thu, 01 Jan 1970 00:00:01 GMT";
    }
}

function setCookie(name: string, value: string, path: string, domain: string){
    document.cookie = name + "=" + value +
        ((path) ? ";path="+path:"")+
        ((domain)?";domain="+domain:"") +
    ";expires=Thu, 01 Jan 2023 00:00:01 GMT";
}


export {deleteCookie, setCookie, getCookieVal}