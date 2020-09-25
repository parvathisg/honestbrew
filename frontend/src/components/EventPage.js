import React, { Component, Fragment } from "react";
import axios from "axios";
import { Link } from "react-router-dom";

export class EventPage extends Component {
    state = {
        event: {},
        isLoaded: false
    }

    componentDidMount() {
        axios.get(`http://ylg.local/wp-json/wp/v2/event/${this.props.match.params.id}`)
            .then(response => this.setState({
                    event: response.data,
                    isLoaded: true
                }
            ))
            .catch(e => console.log(e));
    }

    render() {
        const { event, isLoaded } = this.state;
        if (isLoaded) {
            return (
                <Fragment>
                    <Link to="/">Go Back</Link>
                    <div className="single-event-details">
                        <h3>{ event.title.rendered }</h3>
                        <small>From: <strong>{ event.start_date }</strong></small>
                        <small>To: <strong>{ event.end_date }</strong></small>
                        <small>Location: <strong>{ event.venue }</strong></small>
                        <div dangerouslySetInnerHTML={{__html: event.content.rendered}}></div>
                    </div>
                </Fragment>
            )
        }

        return <h3>Loading event details...</h3>
    }

}

export default EventPage;