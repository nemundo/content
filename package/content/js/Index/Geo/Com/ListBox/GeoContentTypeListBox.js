import DataListBox from "../../../../../framework/Data/DataListBox.js";
import BootstrapDataListBox from "../../../../../framework/Bootstrap/Data/BootstrapDataListBox.js";

export default class GeoContentTypeListBox extends BootstrapDataListBox {

    constructor(parentContainer) {

        super(parentContainer);
        this.service = "geo-content-type-list";
        this.label = "Geo Type";

    }


    onDataRow(dataRow) {

        this.addItem(dataRow.content_type_id, dataRow.content_type);

    }

}