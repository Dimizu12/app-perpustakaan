<?php

namespace App\Http\Controllers;

use App\Http\Requests\StroreMemberRequest;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    private array $members = [
        ['nim' => '001',
            'name' => 'Member 1',
            'email' => 'member1email@gmail.com',
            'phone_num' => '081001',
            'address' => 'member1address',
            'status' => 'member1status'],
        ['nim' => '002',
            'name' => 'Member 2',
            'email' => 'member2email@gmail.com',
            'phone_num' => '082002',
            'address' => 'member2address',
            'status' => 'member2status'],
        ['nim' => '003',
            'name' => 'Member 3',
            'email' => 'member3email@gmail.com',
            'phone_num' => '083003',
            'address' => 'member3address',
            'status' => 'member3status'],
        ['nim' => '004',
            'name' => 'Member 4',
            'email' => 'member4email@gmail.com',
            'phone_num' => '084004',
            'address' => 'member4address',
            'status' => 'member4status'],
        ['nim' => '005',
            'name' => 'Member 5',
            'email' => 'member5email@gmail.com',
            'phone_num' => '085005',
            'address' => 'member5address',
            'status' => 'member5status'],
        ['nim' => '006',
            'name' => 'Member 6',
            'email' => 'member6email@gmail.com',
            'phone_num' => '086006',
            'address' => 'member6address',
            'status' => 'member6status']
    ];

    public function index()
    {
        $members = $this->members;

        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(StroreMemberRequest $request)
    {
        $validated = $request->validated();

        return redirect()->route('members.index')
            ->with('success', "Member \"{$validated['name']}\" succesfully added (data dummy, belum tersimpan ke database).");
    }

    public function show(string $id)
    {
        $member = collect($this->members)->firstWhere('nim', $id);

        abort_if(! $member, 404);

        return view('members.show', compact('member'));
    }

    public function edit(string $id)
    {
        $member = collect($this->members)->firstWhere('nim', $id);

        abort_if(! $member, 404);

        return view('members.edit', compact('member'));
    }

    public function update(StroreMemberRequest $request, string $id)
    {
        $validated = $request->validated();
        
        return redirect()->route('members.index')
            ->with('success', "Member \"{$validated['name']}\" succesfully updated (data dummy, belum tersimpan ke database).");
    }

    public function destroy(string $id)
    {
        return redirect()->route('members.index')
            ->with('success', "Member with id {$id} deleted succesfully (data dummy, belum tersimpan ke database).");
    }
}