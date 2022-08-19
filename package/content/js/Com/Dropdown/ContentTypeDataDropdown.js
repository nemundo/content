import BootstrapDataDropdown from "../../../framework/Bootstrap/Dropdown/BootstrapDataDropdown.js";
import ContentTypeCollection from "../../Type/ContentTypeCollection.js";

export default class ContentTypeDataDropdown extends BootstrapDataDropdown {

    onContentForm = null;

    onContentType = null;

    constructor(parentContainer) {

        super(parentContainer);
        this.serviceName = "content-contenttype-list";

    }


    onDataRow(dataRow) {

        let local = this;

        let contentType = (new ContentTypeCollection()).getContentType(dataRow.id);

        if (contentType !== null) {
            if (contentType.hasForm()) {
                this.addMenu(dataRow.content_type, function () {

                    if (local.onContentForm !== null) {
                        local.onContentForm(contentType.getForm());
                    }

                    if (local.onContentType !== null) {
                        local.onContentType(contentType);
                    }

                });  // addItem(dataRow.id, dataRow.content_type);

            }

        }

    }

}