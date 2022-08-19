import ButtonContainer from "../../../html/Form/Button.js";
import AdminModal from "../../../framework/Com/Modal/AdminModal.js";

export default class ContentTypeNewButton extends ButtonContainer {


    dataId;

    set contentType(value) {

        this.label = "New";
        this.widthPixel=150;

        let local=this;

        this.onClick = function () {

            let modal = new AdminModal();
            modal.modalTitle = value.label;

            let form = value.getForm(local.dataId);
            form.onClose = function () {
                modal.close();
            };

            form.onSubmit = function (item) {
                modal.close();
            };

            modal.show(form);  //, value.label);

        };

    }

}