import DataService from "./DataService.js";


export default class ContentItemService extends DataService {

    constructor() {

        super("content-json");

    }

    set contentId(value) {

        this.addParameter("content", value);

    }


    set onDataRow(value) {

        this.onLoaded = function (data) {

            for (let row of data.data) {
                value(row);
            }

        }

    }

}