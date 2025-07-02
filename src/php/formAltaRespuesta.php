<form name="formAltaRespuesta" method="post" action="controller/respuesta.controller.php">
    <input type="hidden" name="operacion" value="guardar"/>
    <label>Respuesta:</label>
    <input type="text" name="respuesta" required><br>
    <label>Pregunta ID:</label>
    <input type="number" name="pregunta_id" required><br>
    <input type="submit" value="Aceptar">
</form>
