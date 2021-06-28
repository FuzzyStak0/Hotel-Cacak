import React from 'react';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import pic from '../profile.png';

const Main = () => {
    return(
      <div className="header-wrapper">
      <div className="container">
      <div className="row">
        <div className="col">
          <img className="mt-5 rounded-circle" src={pic} alt="text" />
        </div>
        <div className="col mt-5 main h2" id="main">
          <h1>About me</h1>
          <p className="mt-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Aut pariatur esse impedit ratione dicta nulla nihil 
            earum aspernatur repellendus 
            sapiente quia provident, 
            accusantium suscipit, quibusdam aliquam officia est natus ex.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Aut pariatur esse impedit ratione dicta nulla nihil 
            earum aspernatur repellendus 
            sapiente quia provident, 
            accusantium suscipit, quibusdam aliquam officia est natus ex.Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Aut pariatur esse impedit ratione dicta nulla nihil 
            earum aspernatur repellendus 
            sapiente quia provident, 
            accusantium suscipit, quibusdam aliquam officia est natus ex.
            </p>
        </div>
      </div>
      </div>
      </div>
    )
}

export default Main;