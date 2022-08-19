import ContentWidgetLoader from "../../Loader/ContentWidgetLoader.js";
import DataTable from "../../../framework/Data/Table/DataTable.js";

export default class _TreeContentTable extends DataTable {   // () AdminDataTable {

    constructor(parentContainer) {

        super(parentContainer);

        this.service = "content-tree";
        //this.reloadOnScroll = false;

        this.onDataRowClick = function (row) {

            //(new Debug()).write(id);
            (new ContentWidgetLoader()).fromContentId(row.getData("content"));

        };

    }

    onHeader(header) {

        header.addText("Content Id");
        header.addText("Subject");
        header.addText("Content Type");

    }


    onRow(row, item) {

        row.addText(item.content_id);
        row.addText(item.subject);
        row.addText(item.content_type);

        row.addData("content", item.content_id);

    }


    set contentId(value) {

        this.addParameter("content", value);

    }


}




