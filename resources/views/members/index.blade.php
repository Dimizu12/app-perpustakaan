{{-- File: resources/views/members/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Daftar Anggota')

@section('content')
    <h1>Daftar Anggota</h1>

    <p><a href="{{ route('members.create') }}" class="btn">+ Add Member</a></p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Address</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($members as $member)
                <tr>
                    <td>{{ $member['id'] }}</td>
                    <td>{{ $member['name'] }}</td>
                    <td>{{ $member['nim'] }}</td>
                    <td>{{ $member['email'] }}</td>
                    <td>{{ $member['phone_num'] }}</td>
                    <td>{{ $member['address'] }}</td>
                    <td>{{ ucfirst($member['status']) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Belum ada data anggota.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <p><em>Catatan: data di atas masih data dummy (array statis di Controller). Form tambah/edit anggota dan CRUD lengkap anggota baru dibuat mulai Pertemuan 5.</em></p>
@endsection