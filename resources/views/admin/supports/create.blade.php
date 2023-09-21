<h1>Nova Dúvida</h1>

<x-alert />

<form method="POST" action="{{route('supports.store')}}">
    @include('admin.supports.partials.form')
</form>
