@extends('core::errors.master')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('message',
    __('Upss, sayang sekali. Server menerima terlalu banyak permintaan. Silahkan coba beberapa saat
    lagi.'))
