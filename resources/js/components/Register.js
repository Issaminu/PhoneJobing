import React from 'react';
// import ReactDOM from 'react-dom';

export default function Register() {
    return (
        <section className="hero is-primary is-fullheight">
            <div className="hero-body">
                <div className="container">
                    <div className="columns is-centered">
                        <div className="column is-5-tablet is-4-desktop is-3-widescreen">
                            <form method="POST" action="/register" className="box">

                                <label className="label mr-50">Register</label><br></br>
                                <div className="field">
                                    <label for="name" className="label">Full name</label>
                                    <div className="control">
                                        <input id='name' name='name' type="text" placeholder="John Doe" className="input" required />
                                        <span className="icon is-small is-left">
                                            <i className="fa fa-lock"></i>
                                        </span>
                                    </div>
                                </div>
                                <div className="field">
                                    <label for="email" className="label">Email</label>
                                    <div className="control">
                                        <input id='email' name='email' type="email" placeholder="e.g. bobsmith@gmail.com" className="input" required />
                                        <span className="icon is-small is-left">
                                            <i className="fa fa-envelope"></i>
                                        </span>
                                    </div>
                                </div>
                                <div className="field">
                                    <label for="password" className="label">Password</label>
                                    <div className="control">
                                        <input id='password' name='password' type="password" placeholder="*******" className="input" required />
                                        <span className="icon is-small is-left">
                                            <i className="fa fa-lock"></i>
                                        </span>
                                    </div>
                                </div>
                                <div className="field">
                                    <label for="remember_token" className="checkbox">
                                        <input type="checkbox" id='remember_token' className="checkbox" name='remember_token' />
                                        <input type="hidden" id='teamid' className="checkbox" name='teamid' value='0' />
                                        Remember me
                                    </label>
                                </div>
                                <div className="field">
                                    <button className="button is-success" type='submit'>
                                        Register as a Manager
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    );
}

// export default Example;