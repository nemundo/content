export default class _ContentTypeDropdown extends AdminDropdown {

    addContentType(contentType) {

        this.addItem(contentType.label,function () {

            //formContainer.render();
            //formContainer.resetForm();
            //contentType.form.render();

            let modal = new AdminModal();
            modal.modalTitle=contentType.label;

            let form = new contentType.form();
            form.afterSubmit=function (contentId) {

                //modal.close();


                (new Debug()).write("poi auswähel");

                /*(new _UnityInformation()).show("Poi auswählen");
                (new UnityCommunication()).createNewPoi(contentId);*/

            }

            modal.show(form);




            modal.onClose = function () {

                (new Debug()).write("on close");

            }


        });

    }


    /*
    addContentForm(label, formContainer) {

        this.addItem(label,function () {


            //formContainer.render();
            formContainer.resetForm();

            (new AdminModal()).show(formContainer);

        });

    }*/

}