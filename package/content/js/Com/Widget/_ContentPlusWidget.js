import ContentTypeCollectionListBox from "../ListBox/ContentTypeCollectionListBox.js";
import DivContainer from "../../../html/Content/Div.js";
import H1Container from "../../../html/Title/H1.js";


export default class _ContentPlusWidget extends ViewWidgetContainer {

    constructor(parentContainer) {

        super(parentContainer);

        this.widgetTitle = "Content Plus";
        this.widgetIcon = "plus";

    }


    render() {

        let local = this;

        this.addHomeView();
        let view = this.showHomeView();



        let listbox = new ContentTypeCollectionListBox(view);
        listbox.onContentTypeChange = function (contentType) {

            formContainer.emptyContainer();

            if (contentType.hasForm()) {
                /*let modal = new AdminModal();
                modal.modalTitle = contentType.label;*/

                let h1 = new H1Container(formContainer);
                h1.text = contentType.label;

                let form = contentType.getForm();
                /*form.onClose = function () {
                    //modal.close();
                };*/

                form.onSubmit = function () {

                    formContainer.emptyContainer();

                    /*if (local.onFormSubmit !== null) {
                        local.onFormSubmit(item);
                    }*/

                    //modal.close();
                    //(new ContentWidgetLoader()).fromContentId(item.content_id);

                };

                form.render();

                formContainer.addContainer(form);

                //modal.show(form, this.label);

            }

        };
        listbox.render();

        let formContainer = new DivContainer(view);

    }

}