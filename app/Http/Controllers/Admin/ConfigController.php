<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdminConfig;
use App\Validate\ConfigValidate;
use Illuminate\Http\Request;

// 配置
class ConfigController extends BaseController
{
    // 设置
    public function setting(Request $request)
    {
        $params = $request->input('value');
        if ($request->isMethod('put')) {
            (new AdminConfig())->setting($params);
            return response()->json(['code'=>200, 'data'=>[], 'msg'=>'修改成功']);
        }
        $result = AdminConfig::orderBy('sort', 'ASC')->get();
        return view('admin.config.setting', compact('result'));
    }

    // 列表
    public function index(Request $request)
    {
        $result = AdminConfig::orderBy('sort', 'ASC')->paginate();
        return view('admin.config.index', compact('result'));
    }

    // 添加
    public function create(Request $request)
    {
        $params = $request->all();
        if ($request->isMethod('post')) {
            // 数据过滤
            $validate = ConfigValidate::add($params);
            if ($validate['code'] != 200) {
                return response()->json($validate);
            }
            // 数据操作
            $model = (new AdminConfig())->add($params);
            return response()->json($model);
        }
        return view('admin.config.create');
    }

    // 修改
    public function update(Request $request)
    {
        $params = $request->all();
        if ($request->isMethod('put')) {
            // 数据过滤
            $validate = ConfigValidate::edit($params);
            if ($validate['code'] != 200) {
                return response()->json($validate);
            }
            // 数据操作
            $model = (new AdminConfig())->edit($params);
            return response()->json($model);
        }
        $info = AdminConfig::find($request->input('id'));
        if (!$info) {
            abort(422, '该信息未找到，建议刷新页面后重试！');
        }
        return view('admin.config.update', compact('info'));
    }

    // 删除
    public function delete(Request $request)
    {
        $info = AdminConfig::destroy($request->input('id'));
        return $info ? ['code'=>200, 'data'=>[], 'msg'=>'删除成功'] : ['code'=>400, 'data'=>[], 'msg'=>'删除失败'];
    }
}
