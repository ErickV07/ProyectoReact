require('../app');
import React, { useEffect } from 'react'
import ReactDOM from 'react-dom'
import '../variables'
import { createStore } from 'redux';
import rootReducer from '../redux/reducers/index'
import { Provider, useDispatch, useSelector } from 'react-redux'
import rootAction from '../redux/actions/index'
import { BrowserRouter, Route, Switch } from 'react-router-dom'
import Dashboard from '../components/Admin/Dashboard'
import Usuario from '../components/Admin/Usuario'
import Leads from '../components/Admin/Leads'

//create reducer
const myStore = createStore(
	rootReducer,
	window.__REDUX_DEVTOOLS_EXTENSION__ && window.__REDUX_DEVTOOLS_EXTENSION__()
);


function App() {
	//set reducer
	const myDispatch = useDispatch();
	myDispatch(rootAction.setAuthUser(authUser)); //authUser is from blade file

	//get reducer
	const activeComponent = useSelector(state => state.activeComponentReducer);



	return (
		<React.Fragment>
			<div>
				<BrowserRouter>
					<div>
						<Switch>
							<Route exact path='/dashboard' component={Dashboard} />
							<Route path='/usuarios' component={Usuario} />
							<Route path='/lead/list' component={Leads} />
						</Switch>
					</div>

				</BrowserRouter>
			</div>
		</React.Fragment>
	);
}

ReactDOM.render(
	<Provider store={myStore}>
		<App />
	</Provider>
	, document.getElementById('app'))