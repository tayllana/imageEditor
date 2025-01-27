var img = document.createElement('img');
img.src = 'img/x.png';

function callCanvaMerge(){  
      
    // Carrega a imagem principal
    fabric.Image.fromURL('img/image.png', (img) => {
        img.set({
            selectable: false,
            scaleX: 500 / img.width,
            scaleY: 500 / img.height
        });
        canvas.add(img);
    });
    

}

function useLogo(){
    fabric.Image.fromURL('img/logoimobiliaria.png', (logo) => {
        logo.set({
            evented: true,
            scaleX: 0.2,
            scaleY: 0.2,
            left: 130,
            top: 130
        });
    
        canvas.add(logo);
        canvas.setActiveObject(logo); // Para selecionar a imagem imediatamente após adicioná-la
        deleteControl(logo);
    });
}
function useImageUploaded(file){
    fabric.Image.fromURL(URL.createObjectURL(file), (img) => {
        img.set({
            evented: true,
            scaleX: 0.2,
            scaleY: 0.2,
            left: 130,
            top: 130
        });
        canvas.add(img);
        canvas.setActiveObject(img); // Para selecionar a imagem imediatamente após adicioná-la
        deleteControl(img);

    });
}
function deleteControl(img){
    img.controls.deleteControl = new fabric.Control({
        x: 0.5,
        y: -0.5,
        offsetY: -16, // Ajuste o offsetY conforme necessário para posicionar o controle de exclusão corretamente
        cursorStyle: 'pointer',
        mouseUpHandler: deleteObject,
        render: renderIcon,
        cornerSize: 24
    });

    canvas.renderAll(); 
}
function saveCanvaMerged(){

    const file = getPostFile();

    // Preparar os dados para enviar para o PHP
    const formData = new FormData();
    formData.append('imagem', file);

    // Enviar a imagem para o PHP usando AJAX com jQuery
    $.ajax({
        url: '../savePost.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            console.log(response);
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
}
function downloadPost(){
    debugger
    const file = getPostFile();

    // FAZER O DOWNLOAD DA IMAGEM NOVA
    const link = document.createElement('a');
    link.download = 'imagem_mesclada.png';
    link.href = URL.createObjectURL(file);
    link.click();
}

function getPostFile(){
    const dataURL = canvas.toDataURL('image/png');
    const blob = dataURItoBlob(dataURL);
    const file = new File([blob], 'imagem_mesclada.png', { type: 'image/png' });
    return file;
}

// Função para converter data URL para Blob
function dataURItoBlob(dataURI) {
    const byteString = atob(dataURI.split(',')[1]);
    const mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];
    const ab = new ArrayBuffer(byteString.length);
    const ia = new Uint8Array(ab);
    for (let i = 0; i < byteString.length; i++) {
        ia[i] = byteString.charCodeAt(i);
    }
    return new Blob([ab], { type: mimeString });
}
function deleteObject(eventData, transform) {
    var target = transform.target;
    var canvas = target.canvas;
    canvas.remove(target);
    canvas.requestRenderAll();
}
function renderIcon(ctx, left, top, styleOverride, fabricObject) {
    var size = this.cornerSize;
    ctx.save();
    ctx.translate(left, top);
    ctx.rotate(fabric.util.degreesToRadians(fabricObject.angle));
    ctx.drawImage(img, -size / 2, -size / 2, size, size);
    ctx.restore();
}