import UrlParameter from "../../../../../core/Url/UrlParameter.js";
import AdminAutocompleteTextBox from "../../../../../framework/Admin/Autocomplete/AdminAutocompleteTextBox.js";


// SearchContentAutocomplete
// SearchIndexAutocomplete
// ContentSearchAutocomplete
export default class SearchAutocomplete extends AdminAutocompleteTextBox {

    constructor(parentContainer) {

        super(parentContainer);
        this.serviceName = "search-word";
        this.name = "q";
        this.value = (new UrlParameter("q")).getValue();


        /*
                let search = new AdminAutocompleteTextBox(form);
                search.name = "q";
                search.value = (new UrlParameter("q")).getValue();
                search.serviceName = "search-word";
                search.render();*/


    }

}
