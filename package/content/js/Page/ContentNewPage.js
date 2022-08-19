import IconPageContainer from "../../framework/Page/IconPageContainer.js";
import DivContainer from "../../html/Content/Div.js";
import ContentTypeDataDropdown from "../Com/Dropdown/ContentTypeDataDropdown.js";
import ContentBuilder from "../Builder/ContentBuilder.js";
import ContentTable from "../Com/Table/ContentTable.js";
import TableSorting from "../../framework/Data/Table/TableSorting.js";
import ContentWidget from "../Com/Widget/ContentWidget.js";

export default class ContentNewPage extends IconPageContainer {


    constructor(parentContainer) {

        super(parentContainer);
        this.pageTitle = "New Content";
        this.pageIcon = "plus-lg";

    }


    render() {

        let widget=new ContentWidget(this);
        widget.render();


/*
        let dropdown = new ContentTypeDataDropdown(this);
        dropdown.onContentForm = function (form) {

            form.onSubmit = function (dataRow) {

                table.reloadData();


                //formContainer.emptyContainer();

                //alert(dataRow.content_id);

                  let builder = new ContentBuilder();
                  builder.getContent(dataRow.content_id);
                  builder.onView = function (contentView) {*/

                /*searchDiv.emptyContainer();
                searchDiv.addContainer(contentView);*/

                //  };
/*

            };

            formContainer.emptyContainer();
            formContainer.addContainer(form);

        };
        dropdown.render();

        let formContainer = new DivContainer(this);*/

/*
        let table = new ContentTable(formContainer);
        table.showContentType=true;

        table.sorting="id";
        //table.sorting="subject";
        table.sortingOrder=TableSorting.DESC;

        table.onDataRowClick = function (dataRow) {

            formContainer.emptyContainer();

            let builder = new ContentBuilder();
            builder.getContent(dataRow.content_id);
            builder.onView = function (contentView) {

                //searchDiv.emptyContainer();
                formContainer.addContainer(contentView);

            };


        };
        table.render();


        /*
        let contentTypeCollection = new ContentTypeCollection();

        let dropdown = new BootstrapDropdown(this);
        dropdown.label = "New Content";

        let service = new ContentTypeListService();
        service.onDataRow = function (dataRow) {

            //(new Debug()).write(dataRow.content_type);

            let contentType = contentTypeCollection.getContentType(dataRow.id);

            if (contentType !== null) {

                if (contentType.hasForm()) {
                    dropdown.addMenu(dataRow.content_type, function () {

                        formContainer.emptyContainer();
                        formContainer.cardTitle=contentType.label;

                        let form = contentType.getForm();
                        form.onSubmit = function () {
                            form.clearForm();
                        };

                        formContainer.addContainer(form);

                    });

                }
            }


        };
        service.sendRequest();

        dropdown.render();

        let formContainer = new BootstrapCard(this);*/


    }

}
