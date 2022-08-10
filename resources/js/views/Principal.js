import React from "react";
import ReactDOM from "react-dom";
import { BrowserRouter, Route, Switch } from 'react-router-dom'
import Main from "./layouts/Main";
import Home from "../components/Cliente/Home";
import Acerca from "../components/Cliente/Acerca";
ReactDOM.render(
  <Main>
    <div>
      <BrowserRouter>
        <div className="container-scroller">
          <div className="container-fluid page-body-wrapper full-page-wrapper">
            <div className="content-wrapper d-flex align-items-center auth">
              <div className="row flex-grow">
                <div className="col-lg-4 mx-auto">
                  <div>
                    <Switch>
                      <Route exact path='/home' component={Home} />
                      <Route path='/acerca' component={Acerca} />
                    </Switch>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </BrowserRouter>
    </div>
  </Main>,
  document.getElementById("principal")
);
