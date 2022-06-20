<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApiRequest;
use App\Http\Requests\UpdateApiRequest;
use App\Models\Api;
use App\Models\Body;
use App\Models\Group;
use App\Models\Header;
use App\Models\Method;
use App\Models\Response as ResponseModel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiController extends Controller
{
    public function index(): Factory|View|Application
    {
        $groups = Group::with('api', 'api.method', 'api.method.headers', 'api.method.bodies', 'api.method.responses')
//            ->join('apis', 'apis.group_id', '=', 'groups.id')
//            ->orderBy('order', 'DESC')
            ->get();
//dd($groups);
        return view('index', [
            'groups' => $groups
        ]);
    }

    public function create(): View|Factory|Application
    {
        return view('create');
    }

    public function store(Request $request): RedirectResponse
    {

        $data = $request->all();
        $group = Group::query()->where('name', $data['group_name'])->first();
        if (empty($group)) {
            $create = Group::query()->create(['name' => $data['group_name']]);
            $group_id = $create->id;
        } else {
            $group_id = $group->id;
        }

        $method_create = Method::query()->create([
            'name' => $data['type_name'],
            'url' => $data['url'],
            'sample_body' => $data['sample_body'] ?? null,
            'sample_response' => $data['sample_response'] ?? null,
            'note' => $data['note'] ?? null,
        ]);
        $last_order = Api::query()->where('group_id', $group_id)->max('order');
        Api::query()->create([
            'name' => $data['api_name'],
            'order' => ++$last_order,
            'group_id' => $group_id,
            'method_id' => $method_create->id
        ]);

        if (isset($data['header'])) {
            $headers = explode("|", str_replace("\r\n", "|", $data['header']));
            foreach ($headers as $header) {
                Header::query()->create([
                    'key' => explode(':', $header, 2)[0],
                    'value' => explode(':', $header, 2)[1],
                    'method_id' => $method_create->id
                ]);
            }
        }
        if (isset($data['body'])) {
            $bodies = explode("|", str_replace("\r\n", "|", $data['body']));
            foreach ($bodies as $body) {
                Body::query()->create([
                    'field' => explode(':', $body, 3)[0],
                    'data_type' => explode(':', $body, 3)[1],
                    'description' => explode(':', $body, 3)[2],
                    'method_id' => $method_create->id
                ]);
            }
        }
        if (isset($data['response'])) {
            $responses = explode("|", str_replace("\r\n", "|", $data['response']));
            foreach ($responses as $response) {
                ResponseModel::query()->create([
                    'field' => explode(':', $response, 3)[0],
                    'data_type' => explode(':', $response, 3)[1],
                    'description' => explode(':', $response, 3)[2],
                    'method_id' => $method_create->id
                ]);
            }
        }

        return redirect()->back();

    }

    public function edit(Api $api): Factory|View|Application
    {
        $data = Api::query()->where('id', $api->id)->with('group', 'method', 'method.headers', 'method.bodies', 'method.responses')->first();
        return view('edit', [
            'data' => $data
        ]);
    }


    public function update(Request $request, Api $api)
    {
        $data = $request->all();
        $method_id = $api->method->id;

        Api::query()->where('id', $api->id)->update([
            'name' => $data['api_name'],
        ]);

        Method::query()->where('id', $method_id)->update([
            'name' => $data['type_name'],
            'url' => $data['url'],
            'sample_body' => $data['sample_body'],
            'sample_response' => $data['sample_response'],
            'note' => $data['note'],
        ]);

        if (isset($data['header'])) {
            Header::query()->where('method_id', $api->method->id)->delete();
            $headers = explode("|", str_replace("\r\n", "|", $data['header']));
            foreach ($headers as $header) {
                Header::query()->create([
                    'key' => explode(':', $header, 2)[0],
                    'value' => explode(':', $header, 2)[1],
                    'method_id' => $method_id
                ]);
            }
        }
        if (isset($data['body'])) {
            Body::query()->where('method_id', $api->method->id)->delete();
            $bodies = explode("|", str_replace("\r\n", "|", $data['body']));
            foreach ($bodies as $body) {
                Body::query()->create([
                    'field' => explode(':', $body, 3)[0],
                    'data_type' => explode(':', $body, 3)[1],
                    'description' => explode(':', $body, 3)[2],
                    'method_id' => $method_id
                ]);
            }
        }
        if (isset($data['response'])) {
            ResponseModel::query()->where('method_id', $api->method->id)->delete();
            $responses = explode("|", str_replace("\r\n", "|", $data['response']));
            foreach ($responses as $response) {
                ResponseModel::query()->create([
                    'field' => explode(':', $response, 3)[0],
                    'data_type' => explode(':', $response, 3)[1],
                    'description' => explode(':', $response, 3)[2],
                    'method_id' => $method_id
                ]);
            }
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Api  $api
     * @return Response
     */
    public function destroy(Api $api)
    {
        //
    }
}
