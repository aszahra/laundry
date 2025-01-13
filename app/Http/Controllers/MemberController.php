<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $member = Member::paginate(5);
        return view('page.member.index')->with([
            'member' => $member,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
        ]);

        Member::create($data);

        return back()->with('message_create', 'Data Member berhasil ditambahkan!');
    }
    // {
    //     $data = [
    //         'nama' => $request->input('nama'),
    //         'alamat' => $request->input('alamat'),
    //         'jenis_kelamin' => $request->input('jenis_kelamin'),
    //     ];

    //     Member::create($data);

    //     return back()->with('message_delete', 'Data Member Sudah dihapus');
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
        ]);

        $member = Member::findOrFail($id);
        $member->update($data);

        return back()->with('message_update', 'Data Member berhasil diperbarui!');
    }
    // {
    //     $data = [
    //         'nama' => $request->input('nama'),
    //         'alamat' => $request->input('alamat'),
    //         'jenis_kelamin' => $request->input('jenis_kelamin'),
    //     ];

    //     $datas = Member::findOrFail($id);
    //     $datas->update($data);

    //     return back()->with('message_delete', 'Data Member Sudah di hapus');
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return back()->with('message_delete', 'Data Member berhasil dihapus!');
    }
    // {
    //     $data = Member::findOrFail($id);
    //     $data->delete();
    //     return back()->with('message_delete','Data Member Sudah dihapus');
    // }
}
