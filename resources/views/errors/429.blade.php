@extends('layouts.error')

@section('content')
<div class="px-5 text-center">
    <h2>HTTP ERROR: 429 Too Many Requests</h2>
    <h3>มีการ Flood Requests มากเกินไปในเวลานี้ กรุณาลองใหม่ภายหลัง</h3>
    <h5>หรือติดต่อขอความช่วยเหลือได้ที่ <a href="https://devkurov.in.th/" target="_blank">DevKurov</a></h5>
    <h3><a href="https://devkurov.in.th/" target="_blank" class="btn btn-lg btn-primary p-5"><i class="fas fa-headset fa-2x"></i> DevKurov</a></h3>
</div>
@endsection
