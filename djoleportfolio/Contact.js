import React from 'react';

const Contact = () =>{
    return(
        <div className="exp-wraper m-5 c-wraper" id="contact">
            <h2 className="h1-wraper">Contact me</h2>
        <form id="contact-form" >
    <div className="form-group mt-4">
        <label htmlFor="name">Name</label>
        <input type="text" className="form-control" />
    </div>
    <div className="form-group mt-4">
        <label htmlFor="exampleInputEmail1">Email address</label>
        <input type="email" className="form-control" aria-describedby="emailHelp" />
    </div>
    <div className="form-group mt-4">
        <label htmlFor="message">Message</label>
        <textarea className="form-control" rows="5"></textarea>
    </div>
    <button type="submit" className="btn btn-primary mt-4">Submit</button>
</form>
</div>
    )
}

export default Contact;