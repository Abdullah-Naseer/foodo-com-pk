<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UrlRedirect;
use App\Traits\HasDataTables;
use App\Helpers\{
    LogActivity,
    Common
};
use Illuminate\Http\Request;

class UrlRedirectController extends Controller
{
    use HasDataTables;

    public function index(Request $request)
    {
        if (request()->ajax()) {
            $trash = $request->get("trash");
            $q = UrlRedirect::latest();
            $query = $trash == "true" ? $q->onlyTrashed() : $q;
            return $this->dataTable($query, 'url-redirects');
        }

        return view('admin.url_redirects.index');
    }

    public function create()
    {
        return view('admin.url_redirects.edit');
    }

    public function show(string $id)
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'from_url' => 'required|unique:url_redirects,from_url',
            'to_url' => 'required'
        ]);

        $data = $request->all();
        $UrlRedirect = UrlRedirect::create($data);

        if ($UrlRedirect) {
            LogActivity::addToLog('UrlRedirect', 'insert', $UrlRedirect, null);
        }
        return response()->json([
            'success' => true,
            'message' => 'UrlRedirect successfully created.',
            'redirect' => route('admin.url-redirects.index')
        ]);
    }


    public function edit(UrlRedirect $UrlRedirect)
    {
        return view('admin.url_redirects.edit', compact('UrlRedirect'));
    }


    public function update(Request $request, UrlRedirect $UrlRedirect)
    {
        $request->validate([
            'from_url' => 'required|unique:url_redirects,from_url,' . $UrlRedirect->id . ',id',
            'to_url' => 'required',
        ]);

        $data = $request->all();

        $changes_exist = Common::get_changes($UrlRedirect, $data);
        if ($changes_exist) {
            LogActivity::addToLog('UrlRedirect', 'update', null, $changes_exist);
            $UrlRedirect->update($data);
        }

        return response()->json([
            'success' => true,
            'message' => 'UrlRedirect successfully updated.',
            'redirect' => route('admin.url-redirects.index')
        ]);
    }

    public function destroy(UrlRedirect $UrlRedirect)
    {
        $UrlRedirect->delete();

        return response()->json([
            'success' => true,
            'message' => 'UrlRedirect successfully deleted.'
        ]);
    }
}
