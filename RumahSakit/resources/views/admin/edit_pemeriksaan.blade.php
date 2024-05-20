@extends('layouts.admin')

@section('container')
    <h1>Edit Jenis Pemeriksaan</h1>
    <form action="{{ route('dashboard.admin.update_pemeriksaan', ['id' => $pemeriksaan->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="jenis_pemeriksaan">Jenis Pemeriksaan</label>
        <input type="text" id="jenis_pemeriksaan" name="jenis_pemeriksaan" value="{{ $pemeriksaan->jenis_pemeriksaan }}">

        <button type="submit">Update</button>
    </form>
@endsection
