import React from 'react';
import logo from "../logo.png";
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faBars } from '@fortawesome/free-solid-svg-icons';

const Navbar = () => {
    return(
        <nav className="navbar navbar-dark bg-warring navbar-expand-lg sticky-top">
            <div className="container">

  <a className="navbar-brand" href="#"><img className="logo" src={logo} alt="Portfolio" /></a>
  <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <FontAwesomeIcon icon={faBars} style={{color: '#0E2156'}} />
  </button>

  <div className="collapse navbar-collapse" id="navbarSupportedContent">
    <ul className="navbar-nav mr-auto">
      <li className="nav-item active">
        <a className="nav-link" href="#">Home</a>
      </li>
      <li className="nav-item">
        <a className="nav-link" href="#main">About Me</a>
      </li>
      <li className="nav-item">
        <a className="nav-link" href="#services">services</a>
      </li>
      <li className="nav-item">
        <a className="nav-link" href="#exp">my experience</a>
      </li>
      <li className="nav-item">
        <a className="nav-link" href="#port">portfolio</a>
      </li>
      <li className="nav-item">
        <a className="nav-link" href="#contact">contact me</a>
      </li>
      
    </ul>
  </div>
            </div>
</nav>
    )
}

export default Navbar;