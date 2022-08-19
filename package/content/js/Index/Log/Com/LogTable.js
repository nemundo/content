import ImageContainer from "../../../../html/Image/Image.js";
import ServiceDataTable from "../../../../framework/Data/Table/ServiceDataTable.js";

export default class LogTable extends ServiceDataTable {

    constructor(parentContainer) {

        super(parentContainer);

        this.paginationLimit=30;
        //this.tableHeight = 300;

        this.service="content-log";
       /* this.showEditIcon=true;
        this.showDeleteIcon=true;
        this.reloadOnScroll=false;*/


    }


    // contentId
    set content(contentId) {

        this.addParameter("content", contentId);

    }


    onHeader(header) {

        //header.addEmpty();
        header.addText("User");
        header.addText("Date/Time");

    }


    onRow(tableRow, dataRow) {

        tableRow.addText(dataRow.user);
        tableRow.addText(dataRow.datetime);

    }

}