import React, { useState } from "react"
import { useNavigate,Link } from "react-router-dom"
import Head from "./Head"
import "./header.css"

const Header = () => {
  const [click, setClick] = useState(false)
  const navigate = useNavigate();

  const login = ()=>{
    navigate('/connexion');
   }
  return (
    <div className="head">

      <Head />
      <header>
        <nav className='flexSB'>
          <ul className={click ? "mobile-nav" : "flexSB "} >
            <li>
              <Link to='/'>Accueil</Link>
            </li>
            <li>
              <Link to='/cours'>Tous les cours</Link>
            </li>
            <li>
              <Link to='/propos'>À propos</Link>
            </li>
            <li>
              <Link to='/equipe'>Équipe</Link>
            </li>
            <li>
              <Link to='/contact'>Contact</Link>
            </li>
          </ul>
          <div className="start">
          <button className='' onClick={()=>{login()}} > connexion </button>
          </div>
        </nav>

      </header>
    </div>
  )
}

export default Header