import ServiceDataTable from "../../../framework/Data/Table/ServiceDataTable.js";
import ServiceRequest from "../../../framework/Service/ServiceRequest.js";

export default class _ContentDataTable extends ServiceDataTable {

    constructor(parentContainer) {

        super(parentContainer);
        this.service = "content-list";

        this.onDeleteClick = function (tableRow) {

            //let contentId = tableRow.getData("content-id");

            let service = new ServiceRequest("content-delete");
            service.addParameter("content-id", tableRow.getDataAttribute("content_id"));
            service.sendRequest();

        };

    }


    onHeader(header) {

        header.addText("Subject");
        header.addText("Content Type");

    }


    onRow(tableRow, dataRow) {

        tableRow.addText(dataRow.subject.substring(0, 100));
        tableRow.addText(dataRow.content_type);

        tableRow.addData("content_id", dataRow.content_id);
        tableRow.addData("data_id", dataRow.data_id);


    }


    set contentTypeId(value) {

        this.addParameter("content-type", value);

    }

}




