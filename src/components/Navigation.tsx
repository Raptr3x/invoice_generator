import * as React from 'react'
import {deleteCookie} from '../functions'

const Navigation = () => {
    return (
        <nav>
            <ul>
                <a className="active" href="/"><li>Home</li></a>
                <a href="/"><li>About</li></a>
                <a href="/"><li>Pricing</li></a>
                <a onClick={logout} href="/"><li>Logout</li></a>
            </ul>
        </nav>
    )
}

function logout(){
    deleteCookie("login_cookie", "/", "127.0.0.1")
    deleteCookie("login_cookie", "/", "localhost")
    window.location.href = "/"
}

export default Navigation