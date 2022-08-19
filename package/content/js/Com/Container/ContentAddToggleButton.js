import DivContainer from "../../../html/Content/Div.js";
import ContentTypeListBox from "../ContentTypeListBox.js";
import AdminWidget from "../../../framework/Widget/AdminWidget.js";
import Debug from "../../../core/Debug/Debug.js";
import ToggleButton from "../../../framework/Com/Toggle/ToggleButton.js";

// ContentFormContainer
export default class ContentAddToggleButton extends ToggleButton {

    onSubmit = null;

    _dropdown;


    constructor(parentContainer) {

        super(parentContainer);

        this.buttonLabel = "Add Content";

        this._dropdown = new ContentTypeListBox();
        this._dropdown.addItem("", "");
        let local = this;

        this.onShow = function () {

            local._toggleDiv.addContainer(local._dropdown);

            let formContainer = new DivContainer(local._toggleDiv);

            local._dropdown.onContentTypeChange = function (contentType) {

                if (contentType !== null) {

                    formContainer.emptyContainer();

                    let widget = new AdminWidget(formContainer);
                    widget.widgetTitle = contentType.label;

                    let form = contentType.getForm();
                    form.onSubmit = function (item) {

                        if (local.onSubmit !== null) {
                            local.onSubmit(item);
                        }

                        formContainer.emptyContainer();

                    }

                    form.render();

                    widget.addContainer(form);

                }

            };

            local._dropdown.render();

        };

    }


    addContentType(contentType) {

        this._dropdown.addContentType(contentType);
        return this;

    }

}