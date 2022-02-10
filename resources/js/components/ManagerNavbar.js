import React, { useReducer } from "react";
//import ReactDOM from "react-dom";

export default function ManagerNavbar() {
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
                <a className="navbar-item" href="manager-dashboard">
                    Tableau de bord
                </a>

                <a className="navbar-item" href="manager-equipe">
                    Equipe
                </a>
                <a className="navbar-item" href="manager-clients">
                    Clients
                </a>
                <a className="navbar-item" href="manager-scripts">
                    Scripts
                </a>
            </div>
        </div>
        <div className="navbar-end">
            <div className="navbar-item">
                <form method="post" action="/logout">
                    <div className="buttons">

                        <button type="submit" className="button is-secondary">
                            <strong>Log out</strong>
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </nav >)
}