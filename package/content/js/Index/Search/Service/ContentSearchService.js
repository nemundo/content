import ServiceRequest from "../../framework/Service/ServiceRequest.js";
import DataService from "./DataService.js";

export default class ContentSearchService extends ServiceRequest {

    constructor() {

        super("content-search");

    }


    set contentTypeId(value) {

        this.addParameter("content-type", value);

    }



    set contentId(value) {
        this.addParameter("content",value);
    }


    /*
    set onDataRow(value) {

        this.onLoaded = function (data) {

            for (let row of data.data) {
                value(row);
            }

        }

    }*/

}