import React, {Component} from "react";
import PropTypes from "prop-types";
import {Link} from "react-router-dom";
import axios from "axios";

class EventItem extends Component {
    state = {
        imgUrl: '',
        author: '',
        isLoaded: false
    }

    static propTypes = {
        event: PropTypes.object.isRequired
    }

    componentDidMount() {
        const { featured_media, author } = this.props.event;

        const fetchImageUrl = axios.get(`http://ylg.local/wp-json/wp/v2/media/${featured_media}`);

        const fetchAuthor = axios.get(`http://ylg.local/wp-json/wp/v2/users/${author}`);

        Promise.all([fetchImageUrl, fetchAuthor]).then(response => {
            this.setState({
                imgUrl: response[0].data.media_details.sizes.full.source_url,
                author: response[1].data.name,
                isLoaded: true
            })
        });
    }

    render() {
        const {id, title, excerpt, start_date, end_date, venue } = this.props.event;

        const { imgUrl, author, isLoaded } = this.state;

        if (isLoaded) {
            return (
                <div className="event-details">
                    <h4 className="event-title">{title.rendered}</h4>
                    <div className="event-details-wrap">
                        <div className="align-left">
                            <img src={ imgUrl } alt={ title.rendered }/>
                        </div>
                        <div className="align-right">
                            <small>Posted by: <strong>{ author }</strong></small>
                            <small>From: <strong>{ start_date }</strong></small>
                            <small>To: <strong>{ end_date }</strong></small>
                            <small>Location: <strong>{ venue }</strong></small>
                            <div dangerouslySetInnerHTML={{__html: excerpt.rendered}} className="excerpt"></div>
                            <Link to={`/event/${id}`}>View more</Link>
                        </div>
                    </div>
                </div>
            );
        }

        return null;
    }
}

export default EventItem;