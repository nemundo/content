import ContentAction from "../../../Action/ContentAction.js";
import GeoActionForm from "./GeoActionForm.js";
import AdminModal from "../../../../framework/Com/Modal/AdminModal.js";
import GeoActionView from "./GeoActionView.js";
import ServiceRequest from "../../../../framework/Service/ServiceRequest.js";

export default class GeoAction extends ContentAction {

    constructor() {

        super();
        this.label = "Geo Referenzierung";
        this.view = GeoActionView;

    }


    onAction(contentId) {

        let form = new GeoActionForm();
        form.contentId = contentId;
        form.render();

        let modal = new AdminModal();
        modal.modalTitle = "Geo";
        modal.show(form);

    }


    saveAction() {


        let service=new ServiceRequest("geo-post");
        service.addParameter("content",local.contentId);
        service.addParameter("lat",lat.value);
        service.addParameter("lon",lon.value);
        service.onFinished = function () {

            if (local.onAfterSubmit!==null) {
                local.onAfterSubmit();
            }

        };
        service.sendRequest();




    }



}