
const debug=1;

async function getTemplate() {
    

    let path = "invoice_templates/"+$('#select_template').val();
    const response = await fetch(path);
    const text = await response.text()

    $("#invoice").empty();
    $("#invoice").append(text);
    $("#invoice").addClass("card");

    const editable_tags = ["li", "h1", "h2", "h3", "h4", "h5", "h6", "p", "th", "td", "span"];

    for(i in editable_tags){
        const tag = editable_tags[i];
        if(!$(tag).hasClass("uneditable")){
            $('#invoice').find(tag).attr('contenteditable', 'true');
        }
    }
}

window.onload = function () {

    $("#download").on("click", () => {
            const invoice = this.document.getElementById("invoice");
            console.log(invoice);
            console.log(window);
            var opt = {
                margin: 1,
                filename: $('#filename').val(),
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };

            html2pdf().from(invoice).set(opt).save();
    })
}

$('#select_template').on('change', function(){
    getTemplate();
});

// block inspect element
if(debug===0){
    document.addEventListener('contextmenu', event => event.preventDefault());
    document.onkeydown = function (e) {
        if (event.keyCode == 123) {
            alert("This action was recorded and will be reported.");
            return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
            alert("This action was recorded and will be reported.");
            return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
            alert("This action was recorded and will be reported.");
            return false;
        }
        if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
            alert("This action was recorded and will be reported.");
            return false;
        }
    }
}
