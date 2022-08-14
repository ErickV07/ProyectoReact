import React, { useEffect } from "react";
import ReactDOM from "react-dom";
import { BrowserRouter, Route, Switch, Link } from "react-router-dom";
import ListarUsuarios from "../Admin/Usuarios/ListarUsuarios";
import CrearUsuario from "../Admin/Usuarios/NuevoUsuario";
import EditarUsuario from "../Admin/Usuarios/EditarUsuario";
import "../../variables";
import { createStore } from "redux";
import rootReducer from "../../redux/reducers/index";
import { Provider, useDispatch, useSelector } from "react-redux";
import rootAction from "../../redux/actions/index";

const myStore = createStore(
    rootReducer,
    window.__REDUX_DEVTOOLS_EXTENSION__ && window.__REDUX_DEVTOOLS_EXTENSION__()
);

function App() {
    //set reducer
    const myDispatch = useDispatch();
    myDispatch(rootAction.setAuthUser(authUser)); //authUser is from blade file

    //get reducer
    const activeComponent = useSelector(
        (state) => state.activeComponentReducer
    );


    if (
        authUser.tipo_usuario == "SuperAdmin"
    ) {

        return (
            <React.Fragment>
                <BrowserRouter>
                <div className="page-header">
                <h3 className="page-title">
                            <span className="page-title-icon bg-gradient-primary text-white mr-2">
                                {activeComponent &&
                                activeComponent == "ListarUsuarios" ? (
                                    <i className="mdi mdi-account-multiple"></i>
                                ) : activeComponent &&
                                  activeComponent == "CrearUsuario" ? (
                                    <i className="mdi mdi-account-plus"></i>
                                ) : activeComponent &&
                                  activeComponent == "EditarUsuario" ? (
                                    <i className="mdi mdi-folder-account"></i>
                                ) : (
                                    ""
                                )}
                            </span>
                            {activeComponent && activeComponent == "ListarUsuarios"
                                ? "Listar usuarios"
                                : activeComponent &&
                                  activeComponent == "CrearUsuario"
                                ? "Crear usuario"
                                : activeComponent &&
                                  activeComponent == "EditarUsuario"
                                ? "Editar Usuario"
                                : ""}
                        </h3>
                <nav aria-label="breadcrumb">
                            {activeComponent &&
                            activeComponent != "ListarUsuarios" ? (
                                <Link
                                    to="/usuario/listar"
                                    className="btn btn-social-icon-text btn-linkedin"
                                >
                                    <i className="mdi mdi-arrow-left-bold btn-icon-prepend"></i>
                                    &nbsp; Regresar
                                </Link>
                            ) : (
                                <Link
                                    to="/usuario/crear"
                                    className="btn btn-social-icon-text btn-linkedin"
                                >
                                    <i className="mdi mdi-account-plus btn-icon-prepend"></i>
                                    &nbsp; Nuevo
                                </Link>
                            )}
                        </nav>
                </div>


                <div className="row">
                        <div className="col-lg-12 grid-margin stretch-card">
                            <Switch>
                                <Route exact path="/usuario/listar">
                                    {" "}
                                    <ListarUsuarios />{" "}
                                </Route>
                                <Route path="/usuario/crear">
                                    {" "}
                                    <CrearUsuario />{" "}
                                </Route>
                                <Route
                                    path="/usuario/editar/:id"
                                    component={EditarUsuario}
                                />
                            </Switch>
                        </div>
                    </div>
                </BrowserRouter>
            </React.Fragment>
        );


    }


}
export default App;