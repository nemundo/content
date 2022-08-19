import AdminDataTable from "../../../framework/Admin/Table/AdminDataTable.js";
import HyperlinkContainer from "../../../html/Hyperlink/Hyperlink.js";

export default class ContentTable extends AdminDataTable {

    showContentType = true;

    onContentClick=null;


    constructor(parentContainer) {

        super(parentContainer);
        this.service = "content-search";
        this.paginationLimit = 50;

    }


    onHeader(header) {

        header.addText("Subject");
        //if (this.showContentType) {
        //header.addText("Content Type");
        header.addText("Type");
        //}
        //header.addEmpty();

    }


    onRow(tableRow, dataRow) {

        //tableRow.addText(dataRow.subject);

        let local=this;

        let hyperlink = new HyperlinkContainer(tableRow);
        hyperlink.text= dataRow.subject;
        hyperlink.onClick = function () {
            local.onContentClick(dataRow.content_id);
        };


        if (this.showContentType) {
            tableRow.addText(dataRow.content_type);
        }

    }


    set contentTypeId(value) {

        this.addParameter("content-type", value);

    }

    set query(value) {
        this.addParameter("q", value);
    }

}




