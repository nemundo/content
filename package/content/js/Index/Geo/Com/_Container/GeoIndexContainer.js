
import GeoContentTypeListBox from "../ListBox/GeoContentTypeListBox.js";
import GeoIndexTable from "../Table/GeoIndexTable.js";
import BaseContentViewContainer from "../../../../Com/Container/BaseContentViewContainer.js";
import BootstrapAutocomplete from "../../../../../framework/Bootstrap/Autocomplete/BootstrapAutocomplete.js";
import DocumentContainer from "../../../../../html/Document/Document.js";
import Debug from "../../../../../core/Debug/Debug.js";


// GeoIndexSearchContainer
export default class GeoIndexContainer extends BaseContentViewContainer {   // ViewContainer {



    render() {

        super.render();

        let local=this;

        this.addHomeView();
        let homeView= this.showHomeView();

        //let search = new BootstrapAutocomplete(homeView);

        let geoContentType = new GeoContentTypeListBox(homeView);
        geoContentType.defaultEmptyItem=true;
        geoContentType.onChange = function () {
            table.contentTypeId = geoContentType.value;
            table.reloadData();
        };
        geoContentType.render();

        let table = new GeoIndexTable(homeView);
        table.paginationLimit = 40;
        table.onDataRowClick=function (dataRow) {
            local.showItem(dataRow.content_id);
        };
        table.render();

        let document=new DocumentContainer();
        document.onEndScroll=function () {
            (new Debug()).write("end scroll");
          table.loadMoreData();
        };



    }


}