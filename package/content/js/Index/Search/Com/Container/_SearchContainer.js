import SearchIndexTable from "../Table/SearchIndexTable.js";
import AutocompleteTextBox from "../../../../../framework/Com/Autocomplete/AutocompleteTextBox.js";
import Debug from "../../../../../core/Debug/Debug.js";
import BaseContentContainer from "../../../../Com/Container/BaseContentContainer.js";
import AdminButton from "../../../../../framework/AdminButton.js";
import DivContainer from "../../../../../html/Content/Div.js";
import ContentBuilder from "../../../../Builder/ContentBuilder.js";
import BootstrapColumn from "../../../../../framework/Bootstrap/Layout/BootstrapColumn.js";



// SearchContentContainer
export default class _SearchContainer extends BaseContentContainer {


    constructor(parentContainer) {

        super(parentContainer);

        let local=this;



        let autocomplete = new AutocompleteTextBox(this);
        autocomplete.serviceName = "search-word";
        autocomplete.onValueChange = function () {

            (new Debug()).write("value change: " + autocomplete.value);

        };


        let btn=new AdminButton(this);
        btn.label="Search";
        btn.onClick=function () {
            table.query = autocomplete.value;
        };


        let col1= new BootstrapColumn(this);
        let col2= new BootstrapColumn(this);

        let table = new SearchIndexTable(col1);
        table.widthPercent=100;
        table.onDataRowClick = function (dataRow) {

            /*if (local.onItemClick !== null) {
                local.onItemClick(row);
            }*/

            contentContainer.emptyContainer();

            //let contentId = row.getData("content_id");
            //(new Debug()).write(contentId);

            let loader = new ContentBuilder();
            loader.getContent(dataRow.content_id);
            loader.onView=function (view) {
                contentContainer.addContainer(view);
            }

        }

        let contentContainer = new DivContainer(col2);



    }

}

