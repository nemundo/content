import ServiceRequest from "../../framework/Service/ServiceRequest.js";

export default class ContentDeleteService extends ServiceRequest {

    constructor() {
        super("content-delete");
    }

    set contentId(value) {
        this.addParameter("content", value);
    }


    set contentTypeId(value) {
        this.addParameter("content-type", value);
    }

}