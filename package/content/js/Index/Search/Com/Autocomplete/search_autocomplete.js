import DocumentContainer from "../../../../../html/Document/Document.js";
import FormContainer from "../../../../../html/Form/Form.js";
//import AdminAutocompleteTextBox from "./AdminAutocompleteTextBox.js";

import UrlParameter from "../../../../../core/Url/UrlParameter.js";
import SearchAutocomplete from "./SearchAutocomplete.js";
import AdminSubmitButton from "../../../../../framework/Admin/Button/AdminSubmitButton.js";


let document = new DocumentContainer();
document.onLoaded = function () {

    let form = new FormContainer();
    form.fromId("query-content-search-form");

    let search = new SearchAutocomplete(form);  // new AdminAutocompleteTextBox(form);
    /*search.name = "q";
    search.value = (new UrlParameter("q")).getValue();
    search.serviceName = "search-word";*/
    search.render();

    let button = new AdminSubmitButton(form);
    button.label = "Search";


};