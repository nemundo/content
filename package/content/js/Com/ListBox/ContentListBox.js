import AdminDataListBox from "../../../framework/Admin/Form/AdminDataListBox.js";

export default class ContentListBox extends AdminDataListBox {

    constructor(parentContainer) {

        super(parentContainer);

        this.label = "Content";
        this.service = "content-search";

    }


    onDataRow(dataRow) {

        this.addItem(dataRow.id, dataRow.subject);

    }

}