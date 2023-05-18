<?php

namespace app\api\controller;

use Illuminate\Support\Arr;
use app\service\CommonService;
use support\Request;

class CommonController
{
    public function code(Request $request)
    {
        // TODO: validate parameters
        $type         = $request->input('type');
        $codeTypeList = CommonService::CODE_CONFIG_MAP;
        
        $commonService = new CommonService();
        
        $code = $commonService->getCodeByType($type);
        
        
        return response(__CLASS__);
    }
}
