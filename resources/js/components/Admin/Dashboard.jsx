import React, {  useState, useEffect } from 'react'
import Pagination from "react-js-pagination";
import { useSelector, connect } from 'react-redux';
import rootAction from '../../redux/actions/index'
import { fadeIn } from 'animate.css'
import 'iziToast/dist/css/iziToast.css';

function Dashboard(props) {

    const [state, setState] = useState({
       authUser: props.authUserProp,
       totalLeads: 0,
       weeklyLeads: 0,
       monthlyLeads: 0,
       recentLeads: [],
       loading: false
    });

    useEffect(() => {

        
        props.setActiveComponentProp('Dashboard');
        loadData();
    }, []);

    const loadData = () => {
        setState({
            ...state,
            loading: true
        });
        axios.get('/api/v1/dashboard-data', {
            params: {
                api_token: state.authUser.api_token,
            }
        })
        .then(response => {
            setState({
                ...state,
                loading: false,
                totalLeads: response.data.message.totalLeads,
                weeklyLeads: response.data.message.weeklyLeads,
                monthlyLeads: response.data.message.monthlyLeads,
                recentLeads: response.data.message.recentLeads,
            })
        })
        .catch((error) => {
            setState({
                ...state,
                loading: false
            });
            console.log(error);
        });
    };

    const showRecentLeads = () => {
        return state.recentLeads.length == 0 ? <tr><td className="text-muted lead">No Recent Lead</td></tr> : 
                state.recentLeads.map((lead, i) => {
                    return <tr key={i}>
                                <td>
                                    <img src="/assets/images/faces/face1.jpg" className="mr-2" alt="image"/> {lead.name} </td>
                                <td> {lead.email} </td>
                                <td> {lead.phone} </td>
                                <td>
                                    <div className="progress">
                                        <div className="progress-bar bg-gradient-success" role="progressbar" aria-valuenow={lead.progress} aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                            </tr>;
                });
    };

    return (
        <React.Fragment>

<div className="content container-fluid">
                <div className="row">
                    <div className="col-xl-4 col-sm-4 col-12">
                        <div className="card">
                            <div className="card-body">
                                <div className="dash-widget-header">
                                    <span className="dash-widget-icon bg-primary">
                                        <i className="fe fe-users"></i>
                                    </span>
                                    <div className="dash-count">
                                        <a href="#" className="count-title">User Count</a>
                                        <a href="#" className="count"> 10,320</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="col-xl-4 col-sm-4 col-12">
                        <div className="card">
                            <div className="card-body">
                                <div className="dash-widget-header">
                                    <span className="dash-widget-icon bg-warning">
                                        <i className="fe fe-phone"></i>
                                    </span>
                                    <div className="dash-count">
                                        <a href="#" className="count-title">Call Duration</a>
                                        <a href="#" className="count"> 14,628</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="col-xl-4 col-sm-4 col-12">
                        <div className="card">
                            <div className="card-body">
                                <div className="dash-widget-header">
                                    <span className="dash-widget-icon bg-danger">
                                        <i className="fe fe-comments"></i>
                                    </span>
                                    <div className="dash-count">
                                        <a href="#" className="count-title">Chat Count</a>
                                        <a href="#" className="count"> 2,980</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </React.Fragment>
    );
}


//redux state can be accessed as props in this component(Optional)
const mapStateToProps = (state) => {
	return {
		authUserProp: state.authUserReducer,
		activeComponentProp: state.activeComponentReducer,
	}
}

/**
 * redux state can be change by calling 'props.setAuthUserProp('demo user');' when 
 * applicable(Optional to )
 * 
 */
const mapDispatchToProps = (dispatch) => {
    return {
        setAuthUserProp: (user) => dispatch(rootAction.setAuthUser(user)),
        setActiveComponentProp: (component) => dispatch(rootAction.setActiveComponent(component))
    }
};

export default connect(mapStateToProps, mapDispatchToProps)(Dashboard)