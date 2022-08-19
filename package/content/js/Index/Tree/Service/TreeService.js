import ServiceRequest from "../../../../framework/Service/ServiceRequest.js";

// TreeActionService
export default class TreeService extends ServiceRequest {

    constructor() {

        super("tree-post");

    }


    set parentId(value) {

        this.addParameter("parent", value);

    }


    // childId
    set contentId(value) {

        this.addParameter("content", value);

    }

}