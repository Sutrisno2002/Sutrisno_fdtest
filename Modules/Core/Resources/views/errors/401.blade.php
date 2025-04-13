@extends('core::errors.master')

@section('title', __('Unauthorized'))
@section('code', '401')
@section('message', __('Kamu tidak memiliki kredensial autentikasi yang valid.'))
