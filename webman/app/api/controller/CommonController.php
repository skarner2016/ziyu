<?php

namespace app\api\controller;

use app\enum\MessageCode;
use app\service\CommonService;
use support\Request;
use support\trait\ApiResponse;

class CommonController extends ApiController
{
    use ApiResponse;
    
    public function messageCode(Request $request)
    {
        // TODO: validate parameters
        $type = $request->input('type');
        $account = $request->input('account');
        
        $codeList = array_values(MessageCode::cases());
        $commonService = new CommonService();
        $code = $commonService->getCodeByType($account, $type);
        
        // TODO: send message
        
        return $this->success();
    }
}
