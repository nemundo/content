import ContentTypeCollection from "../../Type/ContentTypeCollection.js";
import AdminDropdown from "../../../framework/Dropdown/AdminDropdown.js";

export default class ContentTypeCollectionDropdown extends AdminDropdown {

    onContentTypeChange = null;

    render() {

        this.icon = "file-earmark-plus";

        let local = this;

        let collection = new ContentTypeCollection();

        for (let key in collection.getContentTypeList()) {

            let tmp = collection.getContentTypeList()[key];

            if (tmp.hasForm()) {

               this.addItem(tmp.label, function () {

                    local.closeMenu();
                    local.onContentTypeChange(tmp);

               });

            }

        }


        if (this.onContentTypeChange !== null) {

            this.onChange = function () {

                local.onContentTypeChange((new ContentTypeCollection()).getContentTypeList()[local.value]);

            };

        }


    }


}