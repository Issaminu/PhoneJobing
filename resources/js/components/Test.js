// Overlay use className props to pass style properties to child component.
// To make this component work add className props to your child component manually.
// Here an example: https://gist.github.com/Miniplop/8f87608f8100e758fa5a4eb46f9d151f

import React from "react";

//import styles from "./Login.module.scss";

export default function Test() {
    return (<div className="container-center-horizontal">
        <div className="login-view-1screen">
            <div className="welcome-backroboto-normal-outer-space-16px">
                <span className="roboto-normal-outer-space-16px">Welcome back</span>
            </div>
            <h1 className="titleroboto-bold-mirage-30px">
                <span className="roboto-bold-mirage-30px">Login to your account</span>
            </h1>
            <div className="login-form">
                <div className="passwordroboto-normal-fiord-16px">
                    <span className="roboto-normal-fiord-16px">Password</span>
                </div>
                <div className="overlap-group1border-1px-mercury">
                    <div className="johnsnowgmailcomroboto-normal-outer-space-14px">
                        <span className="roboto-normal-outer-space-14px">John.snow@gmail.com</span>
                    </div>
                </div>
                <div className="emailroboto-normal-fiord-16px">
                    <span className="roboto-normal-fiord-16px">Email</span>
                </div>
                <div className="overlap-groupborder-1px-mercury">
                    <div className="text-1roboto-normal-black-14px">
                        <span className="roboto-normal-black-14px">*********</span>
                    </div>
                </div>
                <div className="flex-row">
                    <div className="ellipse-1border-1px-mercury"></div>
                    <div className="remember-meroboto-normal-outer-space-14px">
                        <span className="roboto-normal-outer-space-14px">Remember me</span>
                    </div>
                    <div className="forgot-passwordroboto-normal-chambray-14px">
                        <span className="roboto-normal-chambray-14px">Forgot password?</span>
                    </div>
                </div>
            </div>
            <div className="login-button">
                <div className="login-nowroboto-bold-white-16px">
                    <span className="roboto-bold-white-16px">Login now</span>
                </div>
            </div>
            <div className="google-button">

                <div className="or-sign-in-with-googleroboto-bold-white-16px">
                    <span className="roboto-bold-white-16px">Or sign-in with google</span>
                </div>
            </div>
            <p className="dont-have-an-account-join-free-todayroboto-normal-black-16px">
                <span className="span0">Dont have an account?</span><span className="roboto-normal-black-16px">&nbsp;</span
                ><span className="span2">Join free today</span>
            </p>
        </div></div>)
}
