@props(['status','message'])
@php
    $class = "";
    $status == "error" ? $class = "danger" : $class = "success"
@endphp
<div class="alert alert-{{ $class }}">
   <strong>{{ $class == "danger" ? "Warning !" : "Success !" }}</strong> {{ $message }}
</div>