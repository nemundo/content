import ServiceRequest from "../../framework/Service/ServiceRequest.js";

export default class ContentCountService extends ServiceRequest {

    constructor() {

        super("content-search-count");

    }

    /*set contentId(value) {
        this.addParameter("content",value);
    }*/


    /*set onDataRow(value) {

        this.onLoaded = function (data) {

            for (let row of data.data) {
                value(row);
            }

        }

    }*/


    set contentTypeId(value) {

        this.addParameter("content-type", value);

    }

}