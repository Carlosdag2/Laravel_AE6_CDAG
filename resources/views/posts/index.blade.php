<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicaciones CDAG</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 0;
            padding: 20px;
            background: #f5f5f5;
        }
        .container { 
            max-width: 1400px; 
            margin: 0 auto; 
            background: white; 
            padding: 30px;
        }
        h1 { 
            color: #333; 
            margin-bottom: 10px;
        }
        .nav { 
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid #ddd;
        }
        .nav a { 
            margin-right: 20px; 
            color: #0066cc;
            text-decoration: none;
        }
        .nav a:hover { 
            text-decoration: underline; 
        }
        .info {
            color: #666;
            margin-bottom: 20px;
        }
        table { 
            width: 100%; 
            border-collapse: collapse;
        }
        th { 
            background-color: #f0f0f0; 
            padding: 12px;
            text-align: left;
            border-bottom: 2px solid #ddd;
        }
        td { 
            padding: 10px 12px;
            border-bottom: 1px solid #eee;
        }
        tr:hover { 
            background-color: #fafafa; 
        }
        .excerpt {
            max-width: 300px;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="nav">
            <a href="{{ route('users.index') }}">Usuarios</a>
            <a href="{{ route('posts.index') }}">Publicaciones</a>
        </div>
        
        <h1>Publicaciones CDAG</h1>
        <p class="info">
            Total: {{ $posts->count() }} | 
            Publicadas: {{ $posts->where('is_published', true)->count() }} | 
            Borradores: {{ $posts->where('is_published', false)->count() }}
        </p>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Extracto</th>
                    <th>Autor</th>
                    <th>Categoría</th>
                    <th>Vistas</th>
                    <th>Estado</th>
                    <th>Publicado</th>
                    <th>Creado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td><strong>{{ $post->title }}</strong></td>
                    <td class="excerpt">{{ Str::limit($post->excerpt, 60) }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->category }}</td>
                    <td>{{ number_format($post->views) }}</td>
                    <td>{{ $post->is_published ? 'Publicado' : 'Borrador' }}</td>
                    <td>{{ $post->published_at ? $post->published_at->format('d/m/Y') : '-' }}</td>
                    <td>{{ $post->created_at->format('d/m/Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>