import UrlParameter from "../../core/Url/UrlParameter.js";
import ContentBuilder from "./ContentBuilder.js";
import H1Container from "../../html/Title/H1.js";
import ColumnFlexLayout from "../../framework/Com/Layout/ColumnFlexLayout.js";
import DocumentContainer from "../../html/Document/Document.js";

export default class ContentParameterBuilder {

    hasParameter() {

        let hasValue = false;

        let parameter = new UrlParameter("content");
        if (parameter.hasValue()) {
            hasValue = true;
        }

        return hasValue;

    }


    fromContentParameter(parentContainer, widget = false) {

        let hasValue = this.hasParameter();

        if (hasValue) {

            let parameter = new UrlParameter("content");
            let contentId = parameter.getValue();

            let builder = new ContentBuilder();
            builder.onView = function (view) {

                let containerView = new ColumnFlexLayout();
                containerView.heightPercent = 100;

                let h1 = new H1Container(containerView);
                h1.text = builder.subject;

                (new DocumentContainer()).title = builder.subject;

                containerView.addContainer(view);

                parentContainer.addContainer(containerView);

            };

            builder.getContent(contentId);

        }

        return hasValue;

    }

}