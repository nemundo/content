import BootstrapDataListBox from "../../../framework/Bootstrap/Data/BootstrapDataListBox.js";

export default class ContentTypeGroupListBox extends BootstrapDataListBox {

    constructor(parentContainer) {

        super(parentContainer);

        this.label = "Content Type (Group)";
        this.service = "content-group";

    }


    onDataRow(dataRow) {

        this.addItem(dataRow.content_type_id, dataRow.group_text);

    }

}