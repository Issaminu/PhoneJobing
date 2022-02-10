import React from 'react';
// import ReactDOM from 'react-dom';

export default function Login() {
    return (
        <section className="hero is-primary is-fullheight">
            <div className="hero-body">
                <div className="container">
                    <div className="columns is-centered">
                        <div className="column is-5-tablet is-4-desktop is-3-widescreen">

                            <form method="POST" action="/login" className="box">
                                <label className="label mr-50">Login</label><br></br>
                                <label for="iAmManager" className="checkbox">

                                    <input type="checkbox" id='iAmManager' name='iAmManager' />
                                    Manager
                                </label><br></br>
                                <label for="iAmTeleoperateur" className="checkbox">
                                    <input type="checkbox" id='iAmTeleoperateur' name='iAmTeleoperateur' />
                                    Teleoperateur
                                </label><br></br>
                                <label for="iAmCommercial" className="checkbox">
                                    <input type="checkbox" id='iAmCommercial' name='iAmCommercial' />
                                    Commercial
                                </label><br></br><br></br>
                                <div className="field">
                                    <label for="email" className="label">Email</label>
                                    <div className="control has-icons-left">
                                        <input id='email' name='email' type="email" placeholder="e.g. bobsmith@gmail.com" className="input" required />
                                        <span className="icon is-small is-left">
                                            <i className="fa fa-envelope"></i>
                                        </span>
                                    </div>
                                </div>
                                <div className="field">
                                    <label for="password" className="label">Password</label>
                                    <div className="control has-icons-left">
                                        <input id='password' name='password' type="password" placeholder="*******" className="input" required />
                                        <span className="icon is-small is-left">
                                            <i className="fa fa-lock"></i>
                                        </span>
                                    </div>
                                </div>
                                <div className="field">
                                    <label for="remember" className="checkbox">
                                        <input type="checkbox" id='remember' name='remember' />
                                        Remember me

                                    </label>
                                </div>
                                <div className="field">
                                    <button className="button is-success" type='submit'>
                                        Login
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