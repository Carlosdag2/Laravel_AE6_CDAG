<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios CDAG</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 0;
            padding: 20px;
            background: #f5f5f5;
        }
        .container { 
            max-width: 1200px; 
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
    </style>
</head>
<body>
    <div class="container">
        <div class="nav">
            <a href="{{ route('users.index') }}">Usuarios</a>
            <a href="{{ route('posts.index') }}">Publicaciones</a>
        </div>
        
        <h1>Usuarios CDAG</h1>
        <p class="info">Total de usuarios: {{ $users->count() }}</p>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Estado</th>
                    <th>Posts</th>
                    <th>Email Verificado</th>
                    <th>Creado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ ucfirst($user->role) }}</td>
                    <td>{{ $user->active ? 'Activo' : 'Inactivo' }}</td>
                    <td>{{ $user->posts->count() }}</td>
                    <td>{{ $user->email_verified_at ? 'Sí' : 'No' }}</td>
                    <td>{{ $user->created_at->format('d/m/Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>