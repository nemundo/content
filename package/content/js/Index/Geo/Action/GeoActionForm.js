import ActionForm from "../../../Action/ActionForm.js";
import TextBox from "../../../../framework/Form/TextBox.js";
import AdminButton from "../../../../framework/AdminButton.js";
import ServiceRequest from "../../../../framework/Service/ServiceRequest.js";


export default class GeoActionForm extends ActionForm {


    render() {

        /*let map = new SwissMap(this);  // new OpenStreetMap(this);
        map.widthPercent=100;
        map.heightPixel=400;
        map.render();*/


        let lat = new TextBox(this);
        lat.label = "Lat";

        let lon = new TextBox(this);
        lon.label = "Lon";

        let local = this;

        let btn = new AdminButton(this);
        btn.label="Save";
        btn.onClick=function () {

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

        };

    }


}