export default class ContentAction {

    id;

    label;

    view = null;

    onAction() {

    }


    getView() {

        let view = new this.view();
        //view.fromContentId(contentId);

        return view;

    }

}