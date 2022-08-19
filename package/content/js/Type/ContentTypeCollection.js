export default class ContentTypeCollection {

    static _contentTypeList = [];

    addContentType(contentType) {

        ContentTypeCollection._contentTypeList[contentType.id] = contentType;
        return this;

    }

    getContentType(contentTypeId) {

        let value = null;

        if (typeof ContentTypeCollection._contentTypeList[contentTypeId] !== 'undefined') {
            value = ContentTypeCollection._contentTypeList[contentTypeId];
        }

        return value;

    }

    getContentTypeList() {

        //let tmp = ContentTypeCollection._contentTypeList.sort((a,b) => (a.label > b.label) ? 1 : ((b.label > a.label) ? -1 : 0))


//        let tmp = ContentTypeCollection._contentTypeList.sort((a,b) => (a.label > b.label) ? 1 : ((b.label > a.label) ? -1 : 0));

        //let tmp = ContentTypeCollection._contentTypeList.sort((a,b) => (a.label > b.label));

        ContentTypeCollection._contentTypeList.sort();

        /*(a, b) {
            return a.age - b.age;
        }*/

        //let tmp = ContentTypeCollection._contentTypeList.sort();
        //(new Debug()).write(tmp);

        return ContentTypeCollection._contentTypeList;

    }


}