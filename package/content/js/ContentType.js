export default class ContentType {

    label;

    id;

    form = null;

    view = null;

    search = null;

    constructor() {
        this.loadContentType();
    }


    loadContentType() {

    }


    getView(contentId = null) {

        let view = new this.view();
        view.fromContentId(contentId);

        return view;

    }


    hasSearch() {

        let value = true;
        if (this.search === null) {
            value = false;
        }
        return value;

    }


    getSearch() {

        let search = new this.search();
        return search;

    }


    hasForm() {

        let value = true;
        if (this.form === null) {
            value = false;
        }
        return value;

    }


    getForm(dataId = null) {

        let form = new this.form();
        if (dataId !== null) {
            form.onEdit(dataId);
        }
        form.render();

        return form;

    }












    /*
    showForm(dataId = null, parentId = null) {

        let modal = new AdminModal();
        modal.modalTitle = this.label;

        let form = this.getForm(dataId);
        form.onClose = function () {
            modal.close();
        };

        form.parentId = parentId;

        form.onSubmit = function () {
            modal.close();
        };
        form.render();

        modal.show(form);

    }*/

}