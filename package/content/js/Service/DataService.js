import ServiceRequest from "../../framework/Service/ServiceRequest.js";

export default class DataService extends ServiceRequest {

    /*constructor() {

        super("content-json");

    }*/

    set contentId(value) {
        this.addParameter("content",value);
    }


    set onDataRow(value) {

        this.onLoaded = function (data) {

            for (let row of data.data) {
                value(row);
            }

        }

    }

}