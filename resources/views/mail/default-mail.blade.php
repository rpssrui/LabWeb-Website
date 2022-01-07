@component('mail::message')
{{ $data['body'] }}

Para mais informações contacte {{ $data['nomeEmpresa'] }} através do endereço {{ $data['emailContacto'] }}
@component('mail::button', ['url' => 'http://127.0.0.1:8000'])
Continuar para Jobs R'us
@endcomponent

Thanks,<br>
Jobs R'us
@endcomponent
