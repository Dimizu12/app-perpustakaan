<?php

namespace App\Http\Controllers;

use App\Http\Requests\StroreMemberRequest;
use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::when(request('search'), fn ($query, $search) => $query->where('name', 'like', "%{$search}%"))->orderBy('id')->paginate(10);
        // Member::orderBy('id')->paginate(10);

        return view('members.index', compact('members'));
    }

    public function create()
    {
        $members = Member::all();

        return view('members.create', compact('members'));
    }

    public function store(StroreMemberRequest $request)
    {
        $validated = $request->validated();

        Member::create($validated);

        return redirect()->route('members.index')
            ->with('success', "Member \"{$validated['name']}\" succesfully added (data dummy, belum tersimpan ke database).");
    }

    public function show(string $id)
    {
        // $member = collect($this->members)->firstWhere('nim', $id);

        // abort_if(! $member, 404);

        $member = Member::findOrFail($id);

        return view('members.show', compact('member'));
    }

    public function edit(string $id)
    {
        // $member = collect($this->members)->firstWhere('nim', $id);

        // abort_if(! $member, 404);

        $member = Member::findOrFail($id);

        return view('members.edit', compact('member'));
    }

    public function update(StroreMemberRequest $request, string $id)
    {
        $validated = $request->validated();

        $member = Member::findOrFail($id);
        $member->update($validated);
        
        return redirect()->route('members.index')
            ->with('success', "Member \"{$validated['name']}\" succesfully updated (data dummy, belum tersimpan ke database).");
    }

    public function destroy(string $id) {

        $member = Member::findOrFail($id);
        $member->delete();

        return redirect()->route('members.index')
            ->with('success', "Member with id {$id} deleted succesfully (data dummy, belum tersimpan ke database).");
    }
}