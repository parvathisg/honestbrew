import React, { Component } from "react";
import EventItem from "./EventItem";
import axios from "axios";

export class Events extends Component {
    state = {
        events: [],
        isLoaded: false
    }

    componentDidMount() {
        axios.get("http://ylg.local/wp-json/wp/v2/event")
            .then(response => this.setState({
                    events: response.data,
                    isLoaded: true
                }
            ))
            .catch(e => console.log(e));
    }

    render() {
        const {events, isLoaded} = this.state;
        if (isLoaded) {
            return (
                <div className="all-events">
                    { events.map(event => (
                        <EventItem key={event.id} event={event} />
                    ))}
                </div>
            );
        }

        return <h3>Loading Events...</h3>;
    }
}

export default Events