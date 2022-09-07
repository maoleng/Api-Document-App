<?php

namespace App\Http\Controllers;

use App\Models\Api;
use App\Models\Body;
use App\Models\Group;
use App\Models\Header;
use App\Models\Image;
use App\Models\Method;
use App\Models\Response as ResponseModel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ApiController extends Controller
{
    public function __construct()
    {
        $group_names = (new GroupController())->index();
        \Illuminate\Support\Facades\View::share('group_names', $group_names);
    }

    public function index(): Factory|View|Application
    {
        $groups = Group::with('api', 'api.method', 'api.method.headers', 'api.method.bodies', 'api.method.responses')
            ->get();
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
        ]);
        $note_content = $this->handleImage($data['note'], $method_create);
        $method_create->update(['note' => $note_content]);

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


    public function update(Request $request, Api $api): RedirectResponse
    {
        $data = $request->all();
        $method_id = $api->method->id;
        if ($data['group_name'] !== $api->group->name) {
            $group = Group::query()->firstOrCreate(['name' => $data['group_name']], ['name' => $data['group_name']]);
        } else {
            $group = $api->group->id;
        }
        Api::query()->where('id', $api->id)->update([
            'group_id' => $group->id,
            'name' => $data['api_name'],
        ]);

        $method = Method::query()->find($method_id);
        $method->update([
            'name' => $data['type_name'],
            'url' => $data['url'],
            'sample_body' => $data['sample_body'],
            'sample_response' => $data['sample_response'],
        ]);
        $note_content = $this->handleImage($data['note'], $method);
        $method->update(['note' => $note_content]);

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

    public function destroy(Template $template): RedirectResponse
    {
        $template->schedule->delete();
        $template->update(['active' => false]);
        $image_ids = $template->images->pluck('id');
        Image::query()->whereIn('id', $image_ids)->update(['active' => false]);

        return redirect()->route('template.index');
    }

    public function handleImage($note, $method)
    {
        preg_match_all('/data:image\/[A-Za-z-]+;base64.[A-Za-z+\/0-9=]+/', $note, $matches, PREG_OFFSET_CAPTURE);
        $images = $matches[0];
        if (isset($images)) {
            foreach ($images as $image) {
                $content = base64_decode(explode(';base64,', $image[0])[1]);
                $mime = $this->getMimeType($image[0]);
                if (empty($mime)) {
                    Session::flash('message', 'Sai thể loại ảnh');
                    return redirect()->back();
                }
                $path = Str::random(15) . '.' . $mime;
                Storage::disk('google')->put($path, $content);
                $source = Storage::disk('google')->url($path);
                Image::query()->create([
                    'source' => $source,
                    'size' => strlen($image[0]),
                    'path' => $path,
                    'method_id' => $method->id,
                ]);
                $note = str_replace($image[0], $source, $note);
            }
        }

        return $note;
    }

    public function getMimeType($base64): ?string
    {
        if (str_starts_with($base64, 'data:image/bmp')) {
            return 'bmp';
        }
        if (str_starts_with($base64, 'data:image/jpeg')) {
            return 'jpg';
        }
        if (str_starts_with($base64, 'data:image/png')) {
            return 'png';
        }
        if (str_starts_with($base64, 'data:image/x-icon')) {
            return 'ico';
        }
        if (str_starts_with($base64, 'data:image/webp')) {
            return 'webp';
        }
        if (str_starts_with($base64, 'data:image/gif')) {
            return 'gif';
        }

        return null;
    }

}
