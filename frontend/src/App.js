import React, { Component, Fragment } from 'react';
import { BrowserRouter as Router, Route} from 'react-router-dom';
import Events from "./components/Events";
import EventPage from "./components/EventPage";
import './App.css';

class App extends Component {
  render() {
    return (
        <Router>
            <Fragment>
                <h1>2020 Events</h1>
                <Route exact path="/" component={Events} />
                <Route exact path="/event/:id" component={EventPage} />
            </Fragment>
        </Router>
    );
  }
}

export default App;
