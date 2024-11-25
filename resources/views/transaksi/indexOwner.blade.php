@extends('layout.templateOwner')


@section('title', 'Transaction - Rent Car')
    
@section('content')
    @livewire('LihatTransaksi') 
    @livewire('TransaksiComponent') 
@endsection