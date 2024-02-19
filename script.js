function showDetails(skinId) {
    // Aquí podrías hacer una solicitud AJAX a fetch_data.php para obtener los detalles de la skin
    // Por simplicidad, este es solo un ejemplo de cómo podrías mostrar el div de detalles
    var detailsDiv = document.getElementById('skin-details');
    detailsDiv.innerHTML = 'Detalles de la Skin...'; // Aquí iría el contenido dinámico
    detailsDiv.style.display = 'block';
}