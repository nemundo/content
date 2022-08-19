import ListBox from "../../../framework/ListBox.js";


export default class ContentTypeListBox extends ListBox {

    onContentTypeChange = null;

    _contentTypeList = [];

    constructor(parentContainer) {
        super(parentContainer);
        this.label = "Content Type";

    }


    render() {

        super.render();

        let local = this;

        this.onChange = function () {

            if (this.onContentTypeChange !== null) {

                //this.onChange = function () {

                    let contentType = null;
                    if (local.value in local._contentTypeList) {
                        contentType = local._contentTypeList[local.value];
                    }

                    //this.onContentTypeChange(local._contentTypeList[local.value]);
                    this.onContentTypeChange(contentType);

                //};

            }
        }

    }


    addContentType(contentType) {

        this.addItem(contentType.id, contentType.label);
        this._contentTypeList[contentType.id] = contentType;
        return this;

    }

}