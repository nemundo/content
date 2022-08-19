import BootstrapDataListGroup from "../../../framework/Bootstrap/ListGroup/BootstrapDataListGroup.js";
import ContentTypeCollection from "../../Type/ContentTypeCollection.js";

export default class ContentTypeListGroup extends BootstrapDataListGroup {


    onContentTypeClick = null;

    onContentTypeIdClick = null;


    constructor(parentContainer) {

        super(parentContainer);
        this.serviceName = "content-contenttype-list";

    }


    onDataRow(dataRow) {

        let local = this;

        this.addHyperlink(dataRow.content_type, function () {

            if (local.onContentTypeIdClick !== null) {
                local.onContentTypeIdClick(dataRow.id);
            }


            let contentType = (new ContentTypeCollection()).getContentType(dataRow.id);

            if (local.onContentTypeClick !== null) {
                if (contentType !== null) {

                    if (local.onContentTypeClick !== null) {
                        local.onContentTypeClick(contentType);
                    }

                } else {
                    alert("no content type");
                }
            }

        });

    }


}