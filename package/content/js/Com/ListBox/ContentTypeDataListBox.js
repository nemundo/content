import AdminDataListBox from "../../../framework/Admin/Form/AdminDataListBox.js";

export default class ContentTypeDataListBox extends AdminDataListBox {

    constructor(parentContainer) {

        super(parentContainer);

        this.label = "Content Type";
        this.service = "content-contenttype-list";

    }


    onDataRow(dataRow) {

        this.addItem(dataRow.id, dataRow.content_type);

    }


    set applicationId(value) {
        this.addParameter("application", value);
    }


}