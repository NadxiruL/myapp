@component('mail::message')
# Introduction

You have successfully login into shoppeKilogram, Contact our support if it is not you. login from {{ $location }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
