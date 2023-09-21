<h1>Detalhes do suporte {{$support->id}}</h1>

<ul>
    <li>Assunto: {{$support->subject}}</li>
    <li>Descrição: {{$support->body}}</li>
    <li>Status: {{$support->status}}</li>
</ul>

<form method="POST" action="{{route('supports.destroy', $support->id)}}">
    @csrf()
    @method('DELETE')
    <button type="submit">Delete</button>
</form>
