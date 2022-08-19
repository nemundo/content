import ServiceDataTable from "../../../../../framework/Data/Table/ServiceDataTable.js";
import CursorStyle from "../../../../../html/Style/Cursor.js";
import TdContainer from "../../../../../html/Table/Td.js";
import BootstrapDataTable from "../../../../../framework/Bootstrap/Table/BootstrapDataTable.js";


export default class TreeTable extends BootstrapDataTable {


    constructor(parentContainer) {

        super(parentContainer);
        this.service = "tree-child-search";


        /*
        this.onDeleteClick = function (tableRow) {

            let service = new ServiceRequest("tree-delete");
            service.addParameter("tree", tableRow.getData("tree_id"));
            service.onFinished = function () {
                tableRow.removeContainer();
            };
            service.sendRequest();

        }*/


    }


    onHeader(header) {

        header.addText("Subject");

    }


    onRow(tableRow, dataRow) {

        let td = new TdContainer(tableRow);
        td.text = dataRow.subject;
        td.cursor = CursorStyle.POINTER;

    }


    // contentId
    set parentId(value) {

        this.addParameter("parent", value);

    }


    set childId(value) {

        this.addParameter("child", value);

    }



}