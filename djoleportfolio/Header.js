import React from 'react';
import Typed from 'react-typed';
const Header = () => {
    return(
        <div className="header-wraper" id="head">
            <div className="main-info">
                <h1>Web development and websites</h1>
                <Typed 
                    className="typed-text"
                    strings={["Web design", "Web development", "Facebook Ads SMM", "Google Ads"]}
                    typeSpeed={40}
                    backSpeed={10}
                    loop
                />
                <a href="#contact" className="btn-main-offer">contact me</a>
            </div>
        </div>
    )
}

export default Header;