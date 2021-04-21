<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>desarrollo</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="css/app.css" rel="stylesheet">
</head>
<body>
<div id="app">
        <div class="app-body">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a @click="menu=0" class="navbar-brand" href="#">Escritorio</a>
                <div>
                  <ul class="navbar-nav mr-auto">
                    <li @click="menu=1">
                        <a class="nav-link" href="#">Disciplinas</a>
                    </li>
                    <li @click="menu=2">
                        <a class="nav-link" href="#">Cliente</a>
                    </li>
                  </ul>
                </div>
            </nav>
            <!-- Menu principal-->
            <template v-if="menu==0">
                <b>Desarrollo de aplicaciones Web</b>
            </template>
            <template v-if="menu==1">
                <frmDisciplina></frmDisciplina>
            </template>
            <template v-if="menu==2">
                <frmCliente></frmCliente>
            </template>
           
            <!--Fin menu principal-->
        </div>
    </div>
    <script src="js/app.js"></script>
</body>
</html>