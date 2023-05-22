<tr>
    <td>
        {{ $description }}
    </td>

    <td>
        {{ $action }}
    </td>

    <td>
        @if (strtolower($method) === 'post')
            <span class='patch-notes-method patch-notes-method-post'>
                {{ $method }}
            </span>
        @elseif (strtolower($method) === 'put')
            <span class='patch-notes-method patch-notes-method-put'>
                {{ $method }}
            </span>
        @elseif (strtolower($method) === 'get')
            <span class='patch-notes-method patch-notes-method-get'>
                {{ $method }}
            </span>
        @elseif (strtolower($method) === 'delete')
            <span class='patch-notes-method patch-notes-method-delete'>
                {{ $method }}
            </span>
        @else
            <span class='patch-notes-method patch-notes-method-default'>
                {{ $method }}
            </span>
        @endif
    </td>


    <td>
        @if (str_contains($endpoint, ':'))
            @php
                $explodePath = explode('/', $endpoint);
                $formatedEndpointText = '';
                
                foreach ($explodePath as $currentPath) {
                    if (str_contains($currentPath, ':')) {
                        $formatedEndpointText .= "<span class='patch-note-endpoint-param'>$currentPath</span>/";
                
                        continue;
                    }
                
                    $formatedEndpointText .= $currentPath . '/';
                }
                
                $lastSlashPosition = strripos($formatedEndpointText, '/');
                $endpointTextSlited = str_split($formatedEndpointText, $lastSlashPosition);
                
                echo $endpointTextSlited[0];
                
            @endphp
        @else
            {{ $endpoint }}
        @endif
    </td>
</tr>
