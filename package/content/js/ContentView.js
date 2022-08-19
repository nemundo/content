import DivContainer from "../html/Content/Div.js";
import ContentItemService from "./Service/ContentItemService.js";
import DataService from "./Service/DataService.js";
import ListServiceRequest from "../framework/Service/ListServiceRequest.js";


export default class ContentView extends DivContainer {

    fromDataId(contentTypeId, dataId) {

        let local = this;

        let service = new ListServiceRequest("data-content-json");  // new DataService("data-content-json");
        service.addParameter("content-type", contentTypeId);
        service.addParameter("data-id", dataId);
        service.onDataRow = function (dataRow) {
            local.onData(dataRow);
        };
        service.sendRequest();

    }

    fromJsonData(data) {

        this.onData(data);

    }

    fromContentId(contentId) {

        let local = this;

        let service = new ContentItemService();
        service.contentId = contentId;
        service.onDataRow = function (dataRow) {
            local.onData(dataRow);
        };
        service.sendRequest();

    }


    onData(dataRow) {

    }


}

