import ContentTypeCollection from "../../Type/ContentTypeCollection.js";
import AdminListBox from "../../../framework/Admin/Form/AdminListBox.js";

export default class ContentTypeCollectionListBox extends AdminListBox {

    onContentTypeChange = null;

    constructor(parentContainer) {

        super(parentContainer);

        this.label = "Content Type";

        let collection = new ContentTypeCollection();
        for (var key in collection.getContentTypeList()) {
            let tmp = collection.getContentTypeList()[key];
            this.addItem(key, tmp.label);
        }

    }


    render() {

        let local = this;

        if (this.onContentTypeChange !== null) {

            this.onChange = function () {
                local.onContentTypeChange((new ContentTypeCollection()).getContentTypeList()[local.value]);
            };

        }

    }


    getContentType() {

        return (new ContentTypeCollection()).getContentTypeList()[this.value];

    }

}