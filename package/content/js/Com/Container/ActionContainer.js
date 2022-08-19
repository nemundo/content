import DivContainer from "../../../html/Content/Div.js";
import ActionCollection from "../../Action/ActionCollection.js";
import H1Container from "../../../html/Title/H1.js";
import H3Container from "../../../html/Title/H3.js";
import HrContainer from "../../../html/Layout/HrContainer.js";
import H5Container from "../../../html/Title/H5.js";

export default class ActionContainer extends DivContainer {

    contentId;

    render() {

        let local = this;

        for (let action of (new ActionCollection()).getActionList()) {

            let h1 = new H5Container(local);  // new H3Container(local);
            h1.text = action.label;

            let view = action.getView();
            view.contentId=local.contentId;
            view.render();

            local.addContainer(view);

            (new HrContainer(local));

        }

    }

}