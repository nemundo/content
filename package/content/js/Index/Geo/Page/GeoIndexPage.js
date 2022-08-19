import BootstrapPage from "../../../../framework/Bootstrap/Page/BootstrapPage.js";
import GeoContentTypeListBox from "../Com/ListBox/GeoContentTypeListBox.js";
import GeoIndexTable from "../Com/Table/GeoIndexTable.js";
import GeoIndexWidget from "../Com/Widget/GeoIndexWidget.js";

export default class GeoIndexPage extends BootstrapPage {

    loadPage() {
        this.pageTitle="Geo";
        this.pageUrl="geo";
    }


    render() {


        let container = new GeoIndexWidget(this);  //t new GeoIndexContainer(this);
        container.render();


        /*let geoContentType = new GeoContentTypeListBox(this);
        geoContentType.defaultEmptyItem=true;
        geoContentType.onChange = function () {
            table.contentTypeId = geoContentType.value;
            table.reloadData();
        };
        geoContentType.render();

        let table = new GeoIndexTable(this);
        table.paginationLimit = 100;
        table.render();*/



    }


}