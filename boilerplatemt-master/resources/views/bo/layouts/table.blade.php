@extends('bo.layouts.master')

@section('css')
<link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
<style>
    .dataTables_processing {
        z-index: 3000;
    }
</style>
@endsection

@section('bodycontent')
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">

        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">{{$title}}</h3>
                </div>
                @if(isset($addurl))
                <div class="card-toolbar">
                    <!--begin::Button-->
                    <a href="{{$addurl}}" class="btn btn-primary font-weight-bolder">
                    <i class="la la-plus"></i>Nouvelle entrée</a>
                    <!--end::Button-->
                </div>
                @endif
            </div>
            <div class="card-body">
                @yield('table')
            </div>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
@endsection

@section('datatablejs')
<!--begin::Page Vendors(used by this page)-->
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<!--end::Page Vendors-->

@endsection
