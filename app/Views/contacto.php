<section>
    <div class="container-contacto">
        <div class="row justify-content-md-center div-contacto">
            
            <div>
                <p class="h3">Contactanos a traves de nuestras redes sociales</p>
            </div>
            


        </div>
    </div>

</section>

<section >


<div class="container-formulario">


    <div class="row justify-content-md-center div-form">
        <form action="contact.php" method="post"> 
            <div class="elem-group"> 
                <label for="name">Nombre</label> 
                <input type="text" id="name" name="visitor_name" placeholder="Nombre de ejemplo" pattern=[A-Z\sa-z]{3,20} required> 
            </div> <div class="elem-group"> 
                <label for="email">Correo electrónico

                </label> 
                <input type="email" id="email" name="visitor_email" placeholder="ejemplo@email.com" required> 
            </div> 
            <div class="elem-group"> 
                <label for="department-selection">
                    Área a contactar
                </label> 
                <select id="department-selection" name="concerned_department" required> 
                    <option value="">Selecciona un área</option> 
                    <option value="billing">Facturación</option> 
                    <option value="marketing">Marketing</option> 
                    <option value="technical support">Servicio al cliente</option> 
                </select> 
            </div> 
            <div class="elem-group"> 
                <label for="title">
                    Motivo de contacto
                </label> 
                <input type="text" id="title" name="email_title" required placeholder="Problema/Consulta" pattern=[A-Za-z0-9\s]{8,60}> 
            </div> 
            <div class="elem-group"> 
                <label for="message">Solicitud</label> 
                <textarea id="message" name="visitor_message" placeholder="Escribe tu mensaje aquí." required></textarea> 
            </div> 
            <button type="submit">Enviar mensaje</button>
        </form>
    </div>
</div>
</section>