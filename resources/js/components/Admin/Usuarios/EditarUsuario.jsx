import React, { useState, useEffect, useRef } from 'react'
import { connect } from 'react-redux';
import rootAction from '../../../redux/actions/index'
import { fadeIn } from 'animate.css'
import BeatLoader from 'react-spinners/BeatLoader'
import { showSznNotification} from '../../../Helpers'
import LoadingOverlay from 'react-loading-overlay';
import SimpleReactValidator from 'simple-react-validator';
import { Link, useHistory } from 'react-router-dom';

function EditarUsuario(props) {
    
    const [state, setState] = useState({
        lead: props.location.state.lead ? props.location.state.lead : '',
        nombre: props.location.state.lead.nombre ? props.location.state.lead.nombre : '',
        email: props.location.state.lead.email ? props.location.state.lead.email : '',
        tipo_usuario: props.location.state.lead.tipo_usuario ? props.location.state.lead.tipo_usuario : '',
        imagen: props.location.state.lead.imagen ? props.location.state.lead.imagen : '',
        password: props.location.state.lead.password ? props.location.state.lead.password : '',
        srcPrevImg: '/assets/img/profiles/' + props.location.state.lead.imagen,
        loading: false,
        authUser: props.authUserProp
    });
    
    let history = useHistory();
    
    //validator
    const [, forceUpdate] = useState() //this is a dummy state, when form submitted, change the state so that message is rendered
    const simpleValidator = useRef(new SimpleReactValidator({
            autoForceUpdate: {forceUpdate: forceUpdate},
            className: 'small text-danger mdi mdi-alert pt-1 pl-1'
    }));

    useEffect(() => {
        document.title = 'EDITAR USUARIO';

        props.setActiveComponentProp('EditarUsuario');
    }, []);

    const onChangeHandle = (e) =>{
        const { name, value } = e.target;
        setState({
            ...state,
            [name] : value
        });
    }

    const onFileChange = (e) => {
        let files = e.target.files;
        let fileReader = new FileReader();
        fileReader.readAsDataURL(files[0]);
 
        fileReader.onload = (event) => {
            setState({
                ...state,
                imagen: event.target.result,
                srcPrevImg: event.target.result,
            });
        }
    }

    const onSubmitHandle = (e) =>{
        e.preventDefault();
        
        if (simpleValidator.current.allValid()) {
            setState({
                ...state,
                loading: true
            });

            axios.post('/api/v1/usuario/actualizar', $(e.target).serialize())
            .then(response => {
                setState({
                    ...state,
                    loading: false
                });
                if (response.data.status == 'validation-error') {
                    var errorArray = response.data.message;
                    $.each( errorArray, function( key, errors ) {
                        $.each( errors, function( key, errorMessage ) {
                            showSznNotification({
                                type : 'error',
                                message : errorMessage
                            });
                        });
                    });
                } else if (response.data.status == 'error') {
                        showSznNotification({
                            type : 'error',
                            message : response.data.message
                        });
                } else if (response.data.status == 'success') {
                    showSznNotification({
                        type : 'success',
                        message : response.data.message
                    });
                    history.push('/usuario/listar')
                }
            })
            .catch((error) => {
                console.log(error);
                
                setState({
                    ...state,
                    loading: false
                });
                if (error.response.data.status == 'validation-error') {
                    var errorArray = error.response.data.message;
                    $.each( errorArray, function( key, errors ) {
                        $.each( errors, function( key, errorMessage ) {
                            showSznNotification({
                                type : 'error',
                                message : errorMessage
                            });
                        });
                    });
                } else if (error.response.data.status == 'error') {
                    showSznNotification({
                        type : 'error',
                        message : error.response.data.message
                    });
                } 
            });
        } else {
            simpleValidator.current.showMessages();
            forceUpdate(1);
        }

    }

    return (
        <React.Fragment>
            
                <div className="card animated fadeIn">
                    <div className="card-body">
                        <div className="row new-lead-wrapper d-flex justify-content-center">
                            <div className="col-md-8 ">
                                <LoadingOverlay
                                    active={state.loading}
                                    spinner={<BeatLoader />}
                                    styles={{
                                        overlay: (base) => ({
                                            ...base,
                                            opacity: '0.5',
                                            filter: 'alpha(opacity=50)',
                                            background: 'white'
                                        })
                                    }}
                                >
                                    <form className="edit-lead-form border" onSubmit={onSubmitHandle}>
                                        <input type="hidden" name="api_token" value={state.authUser.api_token} />
                                        <input type="hidden" name="id" value={state.lead.id} />
                                        <div className="form-group">
                                            <ul className="nav nav-tabs nav-pills c--nav-pills nav-justified">
                                                <li className="nav-item">
                                                    <span className="nav-link btn btn-gradient-primary btn-block active">EDITAR USUARIO</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div className="form-group">
                                        <label>Nombre</label>
                                        <div className="input-group input-group-sm">
                                            <div className="input-group-prepend">
                                                <span className="input-group-text bg-gradient-success text-white">
                                                    <i className="mdi mdi-user"></i>
                                                </span>
                                            </div>
                                            <input type="text" className="form-control form-control-sm input-text" id="name" name="nombre" placeholder="Nombre" value={state.nombre} onChange={onChangeHandle}/>
                                        </div>
                                        {simpleValidator.current.message('nombre', state.nombre, 'required|string')}
                                    </div>

                                    <div className="form-group">
                                        <label>Email</label>
                                        <div className="input-group input-group-sm">
                                            <div className="input-group-prepend">
                                                <span className="input-group-text bg-gradient-success text-white">
                                                    <i className="mdi mdi-email"></i>
                                                </span>
                                            </div>
                                            <input type="text" className="form-control form-control-sm input-text" id="email" name="email" placeholder="Email" value={state.email} onChange={onChangeHandle}/>
                                        </div>
                                        {simpleValidator.current.message('email', state.email, 'required|email')}
                                    </div>


                                    <div className="form-group">
                                        <label>Imagen</label>
                                        <div className="input-group input-group-sm">
                                            <div className="input-group-prepend">
                                                <span className="input-group-text bg-gradient-success text-white">
                                                    <i className="mdi mdi-shield"></i>
                                                </span>
                                            </div>
                                            <input type="file" className="form-control input-text input-file" onChange={onFileChange} />
                                            <input
                                        type="hidden"
                                        name="imagen"
                                        value={state.imagen}
                                    />
                                        </div>
                                        <div className="input-group input-group-sm">
                                        </div>
                                    </div>
                                    <div className="form-group">
                                        <div className="input-group input-group-sm img-preview">
                                            <img
                                                className="Preview-img"
                                                src={state.srcPrevImg}
                                                accept="image/png, image/jpg, image/gif, image/jpeg"
                                                alt=""
                                                width="200px"
                                                height="200px"
                                            />
                                        </div>
                                    </div>


                                    <div className="form-group">
                                        <label>Rol</label>
                                        <div className="input-group input-group-sm">
                                            <div className="input-group-prepend">
                                                <span className="input-group-text bg-gradient-success text-white">
                                                    <i className="mdi mdi-clipboard-alert"></i>
                                                </span>
                                            </div>
                                            <select className="form-control form-control-sm input-text" id="tipo_usuario" name="tipo_usuario" value={state.tipo_usuario} onChange={onChangeHandle}>
                                                <option value="SuperAdmin">Super Admin</option>
                                                <option value="Admin" >Admin</option>
                                                <option value="User" >Usuario</option>
                                                <option value="Emprendedor" >Emprendedor</option>
                                            </select>
                                        </div>
                                    </div>
                                        <div className="form-group text-center">
                                            <button type="submit" className="btn btn-gradient-primary btn-md mr-2">Actualizar</button>
                                            <Link to='/usuario/listar' className="btn btn-inverse-secondary btn-md">Cancel</Link>
                                        </div>
                                    </form>
                                </LoadingOverlay>
                            </div>
                        </div>
                    </div>
                </div>
        </React.Fragment>
    );
}


const mapStateToProps = (state) => {
    return {
        authUserProp: state.authUserReducer,
        activeComponentProp: state.activeComponentReducer,
    }
}


const mapDispatchToProps = (dispatch) => {
    return {
        setAuthUserProp: (user) => dispatch(setAuthUser(user)),
        setActiveComponentProp: (component) => dispatch(rootAction.setActiveComponent(component))
    }
};

export default connect(mapStateToProps, mapDispatchToProps)(EditarUsuario)