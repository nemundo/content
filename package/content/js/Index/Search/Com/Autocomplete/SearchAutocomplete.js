import BootstrapAutocomplete from "../../../../../framework/Bootstrap/Autocomplete/BootstrapAutocomplete.js";


// SearchContentAutocomplete
// SearchIndexAutocomplete
// ContentSearchAutocomplete
export default class SearchAutocomplete extends BootstrapAutocomplete {

    constructor(parentContainer) {

        super(parentContainer);
        this.serviceName = "search-word";

    }

}
