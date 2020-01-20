@component('mail::message')
# Prueba

Prueba del mail para los jefes de departamento.

@component('mail::button', ['url' => ''])
Boton Prueba
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
