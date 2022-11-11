@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Ačiū,<br>
{{ config('app.name') }}
@endcomponent
