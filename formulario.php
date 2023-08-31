<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
        <meta http-equiv = "X-UA-Compatible" content = "ie=edge">
        <title>Practica HTML y CSS</title>
        <!--bootstrap link-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel = "stylesheet" href = "style.css">
    </head>
    <body>
        <div id = "page">
            <div id = "header">
                <div class = "logo">
                    <img src = "cat.png" class = "logo-img">
                </div>
                <div id = "nav">
                    <ul class = "nav-links">
                        <li>
                            <a href = "index.html">HOME</a>
                        </li>
                        <li>
                            <a href = "formulario.php">FORM</a>
                        </li>
                    </ul>
                </div> <!-- end nav -->
            </div> <!-- end header -->

            <div id = "content">
                <div class = "content-form">
                    <form action = "store.php" method = "post" id = "form1">
                        <div class = "form-group">
                            <label for="name">Nombre</label>
                            <input type="text" id="name" name="name" class = "form-control" placeholder = "Nombre completo">
                        </div>

                        <div class = "form-group">
                            <label for="email">Correo</label>
                            <input type="email" id="email" name="email" class = "form-control" placeholder = "correo@ejemplo.com" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">Nunca compartiremos el correo con alguien más.</small>
                        </div>

                        <label for="gender">Género</label><br>
                        <div class = "form-check form-check-inline">
                            <input type="radio" id="female" name="check" value="female" class = "form-check-input">
                            <label class = "form-check-label" for="female">Female</label>
                        </div>
                        
                        <div class = "form-check form-check-inline">
                            <input type="radio" id="male" name="check" value="male" class = "form-check-input">
                            <label class = "form-check-label" for="male">Male</label>
                        </div>
                        
                        <div class = "form-check form-check-inline">
                            <input type="radio" id="other" name="check" value="other" class = "form-check-input" checked>
                            <label class = "form-check-label" for="other">Other</label>
                        </div>
                        
                        <br><br>
                        <div class = "form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" id="password" name="password" class = "form-control" placeholder="Contraseña">
                        </div>

                        <label for="comment">Comentario</label>
                        <textarea id="comment" name="comment" rows = "4" class = "form-control"></textarea><br>
                        
                        <label for="city">Ciudad</label>
                        <select id="city" name="city" class = "form-control">
                            <option value = "Gudalajara">Guadalajara</option>
                            <option value = "Zapopan">Zapoopan</option>
                            <option value = "Tonala">Tonalá</option>
                            <option value = "Otra">Otra</option>
                        </select><br>
                        
                        <div class = "form-group form-check">
                            <input type="checkbox" id="hire" name="hire" value="1" class = "form-check-input">
                            <label for="hire" class = "form-check-label"> Me interesa contratarte </label>
                        </div> 
                        <input type="submit" value = "Submit" class = "btn btn-primary">
                    </form>
                </div><!-- end content-form -->
                
                <div class = "projects">
                    <h1> Contactos </h1>
                    <table class = "contacts-table" >
                        <thead>
                            <tr>
                                <td> Nombre </td>
                                <td> Correo </td>
                                <td> Genero </td>
                                <td> Password </td>
                                <td> Comment </td>
                                <td> City </td>
                                <td> Hire </td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                require('queries.php');
                                $contacts = retrieve_contacts();
                                foreach ($contacts as $row){
                                    $name = $row['name'];
                                    $email = $row['email'];
                                    $gender = $row['gender'];
                                    $password = $row['password'];
                                    $comment = $row['comment'];
                                    $city = $row['city'];
                                    $hire = $row['hire'];

                                    echo "  <tr>
                                                <td>$name</td>
                                                <td>$email</td>
                                                <td>$gender</td>
                                                <td>$password</td>
                                                <td>$comment</td>
                                                <td>$city</td>
                                                <td>$hire</td>
                                            </tr>
                                        ";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>

                
            </div> <!-- end content -->

            <div id = "footer">
                <img src = "email.png">
                <a href = "mailto:valeria.gonzalez4415@alumnos.udg.mx">
                    Envíame un correo!
                </a>
            </div><!-- end footer -->
        </div><!-- end page -->
        <!--script src = "index.js"></script-->
    </body>
</html>