


export default class _ContentConfig {


    static contentTypeList=[];


    addContentType(contentType) {

        _ContentConfig.contentTypeList[contentType.id] = contentType;

    }




}