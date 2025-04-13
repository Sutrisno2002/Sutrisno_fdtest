@extends('core::errors.master')

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('message',
    __('Upss, sayang sekali. Permintaan kamu tidak dapat kami proses untuk sementara waktu. Silahkan
    coba beberapa saat lagi.'))
