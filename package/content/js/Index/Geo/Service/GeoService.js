import ServiceRequest from "../../../../framework/Service/ServiceRequest.js";

export default class GeoService extends ServiceRequest {

    constructor() {

        super("geo-post");

    }


    set contentId(value) {

        this.addParameter("content", value);

    }


    set lat(value) {

        this.addParameter("lat", value);

    }


    set lon(value) {

        this.addParameter("lon", value);

    }

}