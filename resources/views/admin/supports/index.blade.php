<h1>Lista de Suportes</h1>
<a href="{{route('supports.create')}}">Criar suporte</a>
<table>
    <thead>
        <tr>
            <th>Assunto</th>
            <th>Status</th>
            <th>Descrição</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($supports->items() as $support)
            <tr>
                <td>{{ $support->subject }}</td>
                <td>{{ getStatusSupport( $support->status )}}</td>
                <td>{{ $support->body }}</td>
                <td>
                    <a href="{{route('supports.show', [$support->id])}}">ir</a>
                    <a href="{{route('supports.edit', [$support->id])}}">Editar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<x-pagination
    :paginator="$supports"
    :appends="$filters" />
