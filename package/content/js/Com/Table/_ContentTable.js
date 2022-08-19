import AdminTable from "../../../framework/Table/AdminTable.js";


export default class _ContentTable extends AdminTable {

    loadDataTable() {
        this.service = "content-list";
    }

    onHeader(header) {
        super.onHeader(header);
        header.addText("Content Id");
        header.addText("Subject");
        header.addText("Content Type");

    }


    onRow(row, item) {

        row.addText(item.content_id);
        row.addText(item.subject);
        row.addText(item.content_type);

    }


    set contentType(value) {
        this.addParameter("content-type", value);
    }

}




