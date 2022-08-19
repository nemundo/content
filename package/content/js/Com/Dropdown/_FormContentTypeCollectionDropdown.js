import ContentTypeCollectionDropdown from "./ContentTypeCollectionDropdown.js";
import AdminModal from "../../../framework/Com/Modal/AdminModal.js";

export default class _FormContentTypeCollectionDropdown extends ContentTypeCollectionDropdown {

    onBeforeShow = null;

    onFormSubmit = null;

    constructor(parentContainer) {

        super(parentContainer);

        let local = this;

        this.onContentTypeChange = function (contentType) {

            if (local.onBeforeShow !== null) {
                local.onBeforeShow();
            }

            let modal = new AdminModal();
            modal.modalTitle = contentType.label;

            let form = contentType.getForm();
            form.onClose = function () {
                modal.close();
            };

            form.onSubmit = function (item) {

                if (local.onFormSubmit !== null) {
                    local.onFormSubmit(item);
                }

                modal.close();
                //(new ContentWidgetLoader()).fromContentId(item.content_id);

            };

            form.render();

            modal.show(form, this.label);

        };

    }

}