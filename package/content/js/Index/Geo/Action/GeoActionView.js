import ActionView from "../../../Action/ActionView.js";
import GeoIndexTable from "../Com/Table/GeoIndexTable.js";
import GeoActionForm from "./GeoActionForm.js";
import AdminModal from "../../../../framework/Com/Modal/AdminModal.js";
import AdminButton from "../../../../framework/AdminButton.js";

export default class GeoActionView extends ActionView {

    static onActive = null;

    render() {

        let local = this;

        if (this.editable) {

            let btn = new AdminButton(this);
            btn.label = "Add";
            btn.onClick = function () {

                let form = new GeoActionForm();
                form.contentId = local.contentId;
                form.onAfterSubmit = function () {
                    modal.close();
                    table.loadTable();
                };
                form.render();

                let modal = new AdminModal();
                modal.modalTitle = local.label;
                modal.fullPage = true;
                modal.show(form);

            };

        }

        let table = new GeoIndexTable(this);
        table.content = this.contentId;
        table.render();


    }

}