import React, { Component } from 'react'
import moment from 'moment';
import { Link } from 'react-router-dom';

class LeadItem extends Component {
    constructor(props) {
        super(props);
        this.state = {
        }
    }
    componentDidMount() {
    }
    render() {
        return (
            <React.Fragment>
                <div className="table-responsive">
                    <table className="datatable table table-stripped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Rol Usuario</th>
                                <th>Email</th>
                                <th>Imagen</th>
                                <th>Funciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                {this.props.obj.nombre}
                                </td>
                                <td>
                                {this.props.obj.tipo_usuario}
                                </td>
                                <td>
                                    <a href={void (0)}>{this.props.obj.email} </a>
                                </td>
                                <td>
                                    <img src={`../${this.props.obj.imagen}`} alt={this.props.obj.nombre} />
                                </td>
                                <td>
                                    <Link to={{
                                        pathname: `/usuario/editar/${this.props.obj.id}`,
                                        state: {
                                            lead: this.props.obj
                                        }
                                    }} type="button" className="btn btn-success btn-sm btn-upper">Editar</Link>&nbsp;
                                    <button type="button" className="btn btn-danger btn-sm btn-upper" onClick={() => this.props.onClickDeleteHandler(this.props.obj.id)}>Eliminar</button>
                                </td>
                            </tr>
                        </tbody>


                    </table>

                </div>



            </React.Fragment>
        )
    }
}

export default LeadItem