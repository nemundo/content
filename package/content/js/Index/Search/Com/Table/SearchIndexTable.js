import BootstrapDataTable from "../../../../../framework/Bootstrap/Table/BootstrapDataTable.js";

export default class SearchIndexTable extends BootstrapDataTable {

    constructor(parentContainer) {

        super(parentContainer);

        this.service = "searchindex-search";
        this.showEditIcon = false;
        this.showDeleteIcon = false;

    }

    onHeader(header) {

        header.addText("Subject");
        header.addText("Text");
        header.addText("Content Type");

    }


    onRow(tableRow, dataRow) {
        tableRow.addText(dataRow.subject);
        tableRow.addText(dataRow.text);
        tableRow.addText(dataRow.content_type);

    }


    set query(value) {

        this.addParameter("q", value);
        this.emptyData();
        this.loadTable();

    }


    set contentTypeId(value) {

        this.addParameter("content_type", value);

    }

}

