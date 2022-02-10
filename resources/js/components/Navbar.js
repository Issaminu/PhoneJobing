import React from "react";
//import ReactDOM from "react-dom";

export default function Navbar() {
    return (<nav className="navbar" role="navigation" aria-label="main navigation">
        <div className="navbar-brand">
            <a className="navbar-item" href="https://bulma.io">
                <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28"></img>
            </a>

            <a role="button" className="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" className="navbar-menu">
            <div className="navbar-start">
                <a className="navbar-item">
                    Home
                </a>

                <a className="navbar-item">
                    Documentation
                </a>

                <div className="navbar-item has-dropdown is-hoverable">
                    <a className="navbar-link">
                        More
                    </a>

                    <div className="navbar-dropdown">
                        <a className="navbar-item">
                            About
                        </a>
                        <a className="navbar-item">
                            Jobs
                        </a>
                        <a className="navbar-item">
                            Contact
                        </a>

                    </div>
                </div>
            </div>

            <div className="navbar-end">
                <div className="navbar-item">
                    <div className="buttons">
                        <a className="button is-secondary" href="/login">
                            <strong>Login</strong>
                        </a>
                        <a className="button is-primary" href="/register">
                            <strong>Register</strong>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>)
}