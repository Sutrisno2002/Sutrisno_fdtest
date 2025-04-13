@extends('core::errors.master')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Kamu tidak memiliki hak akses untuk mengakses halaman ini.'))
