<html>

<head>
    <link rel="shortcut icon" href="{{ asset('elegan/favicon.ico') }}" type="image/x-icon">
    <title>{{ config('app.name') }} | Api Docs</title>
    <link href="{{ asset('elegan/assets/style.css') }}" rel="stylesheet">
    <link href="{{ asset('elegan/assets/patch-note.css') }}" rel="stylesheet">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="#swagger-ui">Rotas</a></li>
                <li><a href="#patch-notes">Notas de atualização</a></li>
            </ul>
        </nav>
    </header>
    <div id="swagger-ui"></div>

    <script src="{{ asset('elegan/utils/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('elegan/utils/swagger-bundle.js') }}"></script>
    <script type="application/javascript">
        const ui = SwaggerUIBundle({
            url: <?php echo json_encode(asset('elegan/index.yaml')); ?>,
            dom_id: '#swagger-ui',
            deepLinking: true,
        });
    </script>

    @inject('eleganHelper', 'Labi9\Elegan\EleganHelper')

    <h2 id="patch-notes">Notas de atualização</h2>

    @forelse ($eleganHelper->patchNoteFiles() as $note)
        <x-patch-note.div-patch-note :info="$note['info']" />
    @empty
        <p>Sem notas de atualização</p>
    @endforelse
</body>

</html>
